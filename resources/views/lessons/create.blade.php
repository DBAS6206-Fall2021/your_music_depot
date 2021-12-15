@extends('layouts.app')

@section('content')
<div class="justify-content-center">

<div class="d-flex justify-content-center bg-white m-0 p-0">
    <div class="m-3">
        <h1 class="display-4">Book a Lesson</h1>
        <div class="form-group mb-2 border-bottom">
            <div>
                <div class="col-md-8">
                    <h2>Student Name</h2>
                </div>
                <div>
                    <div class="col-md-6">
                        <h5>{{$student->first_name . ' ' . $student->last_name}}</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <form method="POST"action="/student/{{$student->id}}/lesson/detailsA"  novalidate>
            @csrf
            <p class="hint-text">Select the Date for your Student's Lesson</p>
            <div class="form-group mb-2">
                <label for="lessonTime">Choose a Time for the Lesson:</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="date" id="lessonDay" name="lessonDay" min={{ date("Y-m-d") }}>
                    </div>
                </div>
            </div> 
            
            <div class="form-check">
                <input type="hidden" name="lessonGroup" value="0">
                <input class="form-check-input" type="checkbox" name="lessonGroup" value="1" id="lessonGroup">
                <label class="form-check-label" for="flexCheckDefault">
                    Is this a group lesson?:
                </label>
            </div>
                                                  
            <div class="text-right">
                <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Next</button>
            </div>
            <br>
        </form>

        <p>
            You can add {{ $student->first_name . ' ' . $student->last_name }} to an existing group lesson instead.
        </p>
        <div class="text-right">
            <a href="/student/{{ $student->id }}/group/join" id="btnJoinGroupLessons" class="btn btn-primary btn-lg">Join Group Lesson</a>
        </div>
    </div>
</div>
@endsection