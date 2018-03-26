<?php

namespace App\Http\Controllers;

use App\Http\Resources\SemesterCollection;
use App\Http\Resources\SemesterResource;
use App\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SemesterCollection
     */
    public function index()
    {
        return new SemesterCollection(Semester::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name; $course = $request->course;

        Semester::create([
           'name' => $name, 'course_id' => $course]);

        return response()->json(['success' => true, 'data'=> [ 'message' => 'Semester successfully created']]);
    }

    /**
     * Display the specified resource.
     *
     * @param Semester $semester
     * @return SemesterResource
     */
    public function show(Semester $semester)
    {
        return new SemesterResource($semester);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        $semester->name = request('name');
        $semester->course_id = request('course');
        $semester->update();
        return response()->json(['data'=> $semester, 'status'=>['success' => true, 'message' => 'Object updated']], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Semester $semester
     * @return void
     */
    public function destroy(Semester $semester)
    {
        try
        {
            $semester->delete();
        }catch(\Exception $exception)
        {
            $exception->getCode();
        }
        return response()->json(['status' => ['success' => 'true', 'message' => 'Object deleted'] ], 200);
    }
}
