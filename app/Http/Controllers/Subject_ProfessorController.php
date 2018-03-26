<?php

namespace App\Http\Controllers;

use App\Subject_Professor;
use Illuminate\Http\Request;

class Subject_ProfessorController extends Controller
{


    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = $request->professor; $subject = $request->subject; $position = $request->position;
        Subject_Professor::create([
            'professor_id' => $professor, 'subject_id' => $subject, 'position' => $position]);

        return response()->json(['success' => true, 'data'=> [ 'message' => 'Professor successfully added to subject.']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
