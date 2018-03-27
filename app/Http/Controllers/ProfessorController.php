<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfessorCollection;
use App\Http\Resources\ProfessorResource;
use App\Professor;
use App\User;
use Illuminate\Http\Request;
use DB, Hash, Mail, Illuminate\Support\Facades\Password;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProfessorCollection
     */
    public function index()
    {
        return new ProfessorCollection(Professor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;

        $user = User::create([
            'username' => $username, 'email' => $email, 'password' => Hash::make($password), 'role_id' => $role]);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $birthdate = $request->birthdate;
        $office = $request->office;

        Professor::create([
            'first_name' => $firstname, 'last_name' => $lastname, 'birth_date' => $birthdate, 'office' => $office, 'user_id' => $user->id]);

        return response()->json(['success' => true, 'data' => ['message' => 'Professor successfully created']]);
    }

    /**
     * Display the specified resource.
     *
     * @param Professor $professor
     * @return ProfessorResource
     */
    public function show(Professor $professor)
    {
        return new ProfessorResource($professor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {

        $professor->first_name = request('firstname');
        $professor->last_name = request('lastname');
        $professor->birth_date = request('birthdate');
        $professor->office = request('office');

        $professor->update();

        return response()->json(['success' => true, 'data' => ['message' => 'Professor successfully updated']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Professor $professor
     * @return void
     * @throws \Exception
     */
    public function destroy(Professor $professor)
    {
        try {
            $professor->delete();
        } catch (\Exception $e) {
            $e->getCode();
        }
        return response()->json(['status' => ['success' => true, 'message' => 'object deleted']], 200);
    }
}
