<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use DB, Hash, Mail, Illuminate\Support\Facades\Password;
class AuthController extends Controller
{
    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $name = $request->name;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

        User::create(['name' => $name, 'username' => $username, 'email' => $email, 'password' => Hash::make($password)]);
        return response()->json(['success' => true, 'data'=> [ 'message' => 'registered successfully ']]);

        //Automatic login after register
        //return $this->login($request);
    }

    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with these credentials.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to re-login to get a new token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {

        try
        {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        }
        catch (JWTException $e)
        {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }

    }
}