<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StudentCollection(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $username = $request->username; $email = $request->email; $password = $request->password; $role = $request->role;

        $user =  User::create([
            'username' => $username, 'email' => $email, 'password' => Hash::make($password), 'role_id' => $role]);

        $firstname = $request->firstname; $lastname = $request->lastname; $birthdate = $request->birthdate; $index = $request->index; $course = $request->course;

        Student::create([
            'first_name' => $firstname, 'last_name' => $lastname, 'birth_date' => $birthdate , 'index' => $index, 'course_id' => $course, 'user_id' => $user->id]);

        return response()->json(['success' => true, 'data'=> [ 'message' => 'Professor successfully created']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
