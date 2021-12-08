<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'firstName' => 'required|min:1|max:100',
            'lastName' => 'required|min:2|max:100'
        ]);

        Student::create([
            'user_id' => auth()->id(),
            'first_name' => request('firstName'),
            'last_name' => request('lastName'),
        ]);

        return redirect("/users/" . auth()->id());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate(request(), [
            'firstName' => 'required|min:1|max:100',
            'lastName' => 'required|min:2|max:100'
        ]);

        Student::where('id', $student->id)
        ->update([
            'first_name' => request('firstName'),
            'last_name' => request('lastName'),
        ]);

        return redirect("/users/" . auth()->id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // check this student belongs to this user
        if (auth()->id() == $student->user->id)
        {
            $student->delete();

            return redirect("/users/" . auth()->id());
        } else {
            return redirect('/');
        }
    }
}
