<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSubject;
use App\Http\Resources\Student_SubjectCollection;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Http\Resources\Subject_ProfessorCollection;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SubjectCollection
     */
    public function index()
    {
        return new SubjectCollection(Subject::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdateSubject $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUpdateSubject $request)
    {
        $name = $request->name;
        $credits = $request->credits;
        $description = $request->description;
        $semester = $request->semester;

        Subject::create([
            'name' => $name, 'credits' => $credits, 'description' => $description, 'semester_id' => $semester]);

        return response()->json(['success' => true, 'data' => ['message' => 'Subject ' . $name . ' successfully created']]);
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return SubjectResource
     */
    public function show(Subject $subject)
    {
        return new SubjectResource($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUpdateSubject $request
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreUpdateSubject $request, Subject $subject)
    {
        $subject->name = request('name');
        $subject->credits = request('credits');
        $subject->description = request('description');
        $subject->semester_id = request('semester');

        $subject->update();
        return response()->json(['status' => ['success' => true, 'message' => 'Subject updated']], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
        } catch (\Exception $exception) {
            $exception->getCode();
        }

        return response()->json(['status' => ['success' => true, 'message' => 'Subject deleted']], 200);
    }

    public function showStudents(Subject $subject){
        return new Student_SubjectCollection($subject->student_subject);
    }

    public function showProfessors(Subject $subject){
        return new Subject_ProfessorCollection($subject->subject_professor);

    }

}
