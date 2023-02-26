<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();
        return view('marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $terms = Term::all();
        return view('marks.create', compact('students','terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //
            'student_id' => 'required|exists:students,id',
            'term_id' => 'required|exists:terms,id',
            'maths'         => 'required|numeric|gt:0',
            'science'         => 'required|numeric|gt:0',
            'computer'         => 'required|numeric|gt:0',
        ]);
    
        $validated['total'] = $request->maths + $request->science + $request->computer; 

        $student = new Mark($validated);
        $student->save();

        return redirect()->route('marks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('marks.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        $students = Student::all();
        $terms = Term::all();
        return view('marks.edit', compact('mark','students','terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Mark $mark)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'term_id' => 'required|exists:terms,id',
            'maths'         => 'required|numeric|gt:0',
            'science'         => 'required|numeric|gt:0',
            'computer'         => 'required|numeric|gt:0',
        ]);

        $validated['total'] = $request->maths + $request->science + $request->computer; 

        $mark->fill($validated);
        $mark->save();

        return redirect()->route('marks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->route('marks.index');
    }
}
