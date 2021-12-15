<?php

namespace App\Http\Controllers;

use App\Instrument;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Student;
use App\InstructorAvailability;
use Carbon\Carbon;
use App\Room;
use App\Attendee;
use App\LessonInstructor;

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

        $students = Student::all();
        $lessons = Lesson::all()->where('date', ">=", Carbon::Today()->toDateString());     

            
        return view('lessons.index', compact('students', 'lessons'));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select(User $user)
    {
        if (Auth::user()->cant('view', $user))
            return redirect('/home');

            if(Auth::user()->type() === "C")
                $students = $user->students()->get(); 
            elseif(Auth::user()->type() === "M") 
                $students = Student::all();  

        return view('lessons.selectStudent', compact('user', 'students'));
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

        $availabilities = InstructorAvailability::where('weekday', $day)->get();

        $instructors = collect([]);

        foreach($availabilities as $value){
            $instructors->push($value->user);
        };

        
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
        
        
        
        $data = session('data');
        $date = $data->get('date');

        $dayAvailability = User::find($request->input('lessonInstructor'))
        ->instructorAvailability->where('weekday', $date->englishDayOfWeek);

        $start = Carbon::parse($dayAvailability->first()->start_availability);
        $end = Carbon::parse($dayAvailability->first()->end_availability);
        $availability = collect([]);
        $lessons = Lesson::where('date', $date->toDateString())->get();

        do{
            if(!$lessons->contains('start_time',$start->toTimeString()))
                $availability->push($start->toTimeString());
            $start->addHour();
        }while($start < $end);

        //dd($availability);

        $data->put('instrument', $request->input('lessonInstrument'));
        $data->put('instructor', $request->input('lessonInstructor'));
        session(['data' => $data]);

        // Return Next View
        return view('lessons.detailsB', compact('availability', 'student'));
    }

    public function detailsC(Request $request, Student $student)
    {
        //Validate Start/End Times
        $this->validate(request(), [
            'lessonStart' => ['required', 'date_format:H:i:s'],
        ]);

        $lessonStart = $request->input('lessonStart');

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
                //dd($data->get('date')->toDateString());
                $lessonInRoom = $item->lessons()->where('date',Carbon::parse($data->get('date'))->toDateString())->get();

                //dd(Carbon::parse($data->get('date')));


                //dd($lessonInRoom);

                if($lessonInRoom->isEmpty())
                {
                    //dump($item);
                    $room = $item;
                    
                    return false;
                }

                foreach($lessonInRoom as $lesson)
                {
                    //dump($lesson->start_time, $data->get('lessonStart'));
                    //dump($room);
                    if ($lesson->start_time != $data->get('lessonStart'))
                    {
                        if ($lesson->students()->count() < $item->capacity) { 
                            //dump($lesson->students()->count());

                            $room = $item;
                        }
                    }
                    else
                    {
                        $room = null;
                        return false;
                    }
                }
                
            });

        if ($room != null) 
        {
        // Make the lesson
            $lesson = Lesson::create([
                'room_number' => $room->id,
                'instrument_id' => $data->get('instrument'),
                'lesson_type_id' => $data->get('type') + 1,
                'date' => Carbon::parse($data->get('date'))->toDateString(),
                'start_time' => $data->get('lessonStart'),
                'end_time' => Carbon::parse($data->get('lessonStart'))->addHour()->toTimeString(),
            ]);

        // Make the attendees
            $attendee = Attendee::create([
                'lesson_id' => $lesson->id,
                'student_id' => $student->id,
                'is_withdrawn' => 0,
            ]);

        // Make Lesson Instructor
            $instructor = LessonInstructor::create([
                'user_id' => $data->get('instructor'),
                'lesson_id' => $lesson->id,
            ]);

        }

        $request->session()->forget('data');

        return redirect("/users/" . auth()->id());
    }

    /**
     * Show all group lessons in the future
     */
    public function indexGroupLessons(Student $student)
    {
        $lessons = Lesson::all()->where('date', ">=", Carbon::Today()->toDateString());

        $groupLessons = collect([]);

        foreach ($lessons as $lesson) {
            //dd($lesson->lessonType->type);
            if ($lesson->lessonType->type == "Group") {
                $groupLessons->push($lesson);
            }
        }


        //dd($groupLessons);
        //dd($lessons->first()->room()->room);
        return view('lessons.indexGroupLessons', compact('student', 'lessons'));
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
        // Remove Attendants
        $lesson->students()->detach();
        // Remove Instructors
        $lesson->users()->detach();
        // Remove Lesson
        $lesson->delete();

        return redirect("/users/" . auth()->id());
    }
}
