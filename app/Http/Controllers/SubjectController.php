<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;
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
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $name = $request->name; $credits = $request->credits; $description = $request->description;  $semester = $request->semester;

        Subject::create([
            'name' => $name, 'credits' => $credits, 'description' => $description, 'semester_id' => $semester]);

        return response()->json(['success' => true, 'data'=> [ 'message' => 'Subject '.$name.' successfully created']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return new SubjectResource($subject);
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
