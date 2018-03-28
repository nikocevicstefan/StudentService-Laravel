<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Http\Requests\UpdateStudent;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return StudentCollection
     */
    public function index()
    {
        return new StudentCollection(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudent $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudent $request)
    {

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $role = 3;

        $user = User::create([
            'username' => $username, 'email' => $email, 'password' => Hash::make($password), 'role_id' => $role]);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $birthdate = $request->birthdate;
        $index = $request->index;
        $course = $request->course;

        Student::create([
            'first_name' => $firstname, 'last_name' => $lastname, 'birth_date' => $birthdate, 'index' => $index, 'course_id' => $course, 'user_id' => $user->id]);

        return response()->json(['success' => true, 'data' => ['message' => 'Student successfully created']]);
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return StudentResource
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudent $request
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudent $request, Student $student)
    {


        $student->first_name = request('firstname');
        $student->last_name = request('lastname');
        $student->birth_date = request('birthdate');
        $student->index = request('index');
        $student->course_id = request('course');

        $student->update();
        return response()->json(['success' => true, 'data' => ['message' => 'Student successfully updated']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return void
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
        } catch (\Exception $e) {
            $e->getCode();
        }
        return response()->json(['success' => true, 'data' => ['message' => 'Student deleted']], 200);
    }
}
