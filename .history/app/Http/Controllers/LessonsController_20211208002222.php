<?php

namespace App\Http\Controllers;

use App\Instrument;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Student;
use App\InstructorAvailability;
use Carbon\Carbon;

class LessonsController extends Controller
{
    private $data;
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
        $this->validate(request(), [
            'lessonDay' => ['required', 'date_format:Y-m-d'],
            'lessonGroup' =>['required'],
        ]);

        $date = Carbon::parse($request->input('lessonDay'));
        $day = $date->englishDayOfWeek;

        $this->data = [
            'date' => $date,
            'type' => $request->input('lessonGroup')
        ];

        //dd($this->data);

        $availabilities = InstructorAvailability::where('weekday', $day)->get();

        $instructors = collect([]);
        // $availabilities->each(function ($item, $key) {
        //     dd(($item->user()->get()));
        // });

        foreach($availabilities as $value){
            $instructors->push($value->user);
        };
        
        // dd($instructors);
        
        $instruments = Instrument::all();

        // Return Next View
        return view('lessons.detailsA', compact('student', 'instructors', 'instruments'));
    }

    public function detailsB(Request $request, Student $student)
    {
        // Validate Instrument & Instructor
        // Validate Date and Type
        // $this->validate(request(), [
        //     'lessonInstructor' => ['required'],
        //     'lessonInstrument' => ['required'],
        // ]);

        dd($this->validate);

        // $availability = User::find($request->input('instructor'))
        //                                    ->instructorAvailability()->get();

        // $this->data->concat(['instrument' => $request->input('instrument')]);

        //dd($this->data);
        // Return Next View
        //return view('lessons.detailsB', compact('availability'));
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
