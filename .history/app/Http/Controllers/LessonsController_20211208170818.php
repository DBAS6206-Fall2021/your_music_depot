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
use App\Room;

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

        $data = collect([
            'date' => $date,
            'type' => $request->input('lessonGroup')
        ]);
        session(['data' =>$data]);

        //dd(session('data'));
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
        $this->validate(request(), [
            'lessonInstrument' => 'required',
            'lessonInstructor' => 'required',
        ]);
        
        
        $availability = User::find($request->input('lessonInstructor'))
        ->instructorAvailability()->get();
        
        $data = session('data');
        $data->put('instrument', $request->input('lessonInstrument'));
        session(['data' => $data]);
        //dd($availability);

        // $this->data->concat(['instrument' => $request->input('instrument')]);

        //dd($this->data);
        // Return Next View
        return view('lessons.detailsB', compact('availability', 'student'));
    }

    public function detailsC(Request $request, Student $student)
    {
        // Validate Start/End Times
        // $this->validate(request(), [
        //     'lessonStart' => ['required', 'date_format:H:i:s'],
        // ]);

        $lessonStart = "11:00:00";

        // Gather the data
        $data = session('data');
        $data->put('lessonStart', $lessonStart);



        //Find an available room
           
        // Individual Lesson
        if ($data->get('instrument') == 1)
            $rooms = Room::all()->where('room_type_id', 3);      
        else // Group Lesson
        {
            if ($data->get('type') === "0")
                $rooms = Room::all()->where('room_type_id', 1);
            else
                $rooms = Room::all()->where('room_type_id', 2);
        }    

            //dd($rooms);
            $room = null;

            $rooms->each(function ($item, $key) use (&$room, &$data){
                
                $lessonInRoom = $item->lessons()->get();

                //dd($lessonInRoom);

                if($lessonInRoom === null)
                {
                    $room = $item;
                    return false;
                }

                foreach($lessonInRoom as $lesson)
                {

                    //dump($lesson->start_time, $data->get('lessonStart'));
                    if($lesson->start_time == $data->get('lessonStart'))
                    {
                        if($lesson->students()->count() < $item->capacity)
                        {
                            $room = $item;
                            return false;
                        }
                    }
                    else
                    {
                        $room = $item;
                        return false;
                    }
                }        
            });

            //dd($room);

        // Make the lesson
            $newLesson = Lesson::make([
                'room_number' => $room->room_number,
                'instrument_id' => $data->get('instrument'),
                'lesson_type_id' => $data->get('type'),
                'date' => $data->get('date'),
                'start_time' => $data->get('lessonStart'),
                'end_time' => $data->get('instrument')->addHour(),
            ]);
                
            dd($newLesson);

        // Make the attendees


        // Make Lesson Instructor
        
        //dd($data->get('type'));

        // Return Next View
        //return view('lessons.detailsC', compact('student'));
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
