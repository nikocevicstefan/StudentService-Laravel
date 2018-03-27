<?php

namespace App\Http\Controllers;

use App\Student_Subject;
use Illuminate\Http\Request;

class Student_SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $student = $request->student;
        $subject = $request->subject;
        $points = $request->points;
        $grade = $request->grade;
        Student_Subject::create([
            'student_id' => $student, 'subject_id' => $subject, 'points' => $points, 'grade' => $grade]);

        return response()->json(['success' => true, 'data' => ['message' => 'Student successfully added to subject.']]);
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return
     */
    public function show()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
