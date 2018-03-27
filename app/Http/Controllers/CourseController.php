<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CourseCollection
     */
    public function index()
    {
        return new CourseCollection(Course::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {

        $name = $request->name;
        Course::create(['name' => $name]);

        return response()->json(['success' => true, 'data' => ['message' => 'Course ' . $name . ' successfully created']]);
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return CourseResource
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Course $course
     * @return void
     */
    public function update(Request $request, Course $course)
    {
        $course->name = request('name');
        $course->update();
        return response()->json(['data' => $course, 'status' => ['success' => true, 'message' => 'Course updated']], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();
        } catch (\Exception $e) {
            $e->getCode();
        }
        return response()->json(['status' => ['success' => true, 'message' => 'Course deleted']], 200);
    }
}
