<?php

namespace App\Http\Controllers;

use App\Instrument;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Student;
use Carbon\Carbon;

class LessonsController extends Controller
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
    public function create(Student $student)
    {
        return view('lessons.create', compact('student'));
    }

    public function detailsA(Request $request, Student $student)
    {
        // Validate Date and Type
        // $this->validate(request(), [
        //     'lessonDay' => ['required'],
        //     'lessonGroup' =>['required'],
        // ]);

        $day = Carbon::parse($request->input('lessonDay'))->dayOfWeek();

        //$instructors = User::where('weekday', $day);

        //$instruments = Instrument::all();

        dd($request);


        // Return Next View
        //return view('lessons.detailsB', 'instructors', 'instrument');
    }

    public function detailsB(Request $request, Student $student)
    {
        // Validate Instrument & Instructor


        // Return Next View
        return view('lessons.detailsB');
    }

    public function detailsC(Request $request, Student $student)
    {
        // Validate Start/End Times


        // Return Next View
        return view('lessons.detailsC');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
