@extends('layouts.app')

@section('content')
<div class="justify-content-center">

<div class="d-block-flex justify-content-center bg-white m-0 p-0">
        <div class="login" id="contentArea">
            <h1 class="display-4">Book a Lesson</h1>
            <form id="bookLessonForm" method="POST"action="/student/{{$student->id}}/lesson/detailsB"  novalidate>
                <div id="messageArea"></div>
                <p class="hint-text">Select the Date for your Student's Lesson</p>
            <div class="form-group mb-2 border-bottom">
                <div>
                    <div class="col-md-6">
                        <h2>Student Name</h2>
                    </div>
                    <div>
                        <div class="col-md-6">
                            <h5>__________</h5>
                        </div>
                    </div>
                </div>
            </div>
              
            <div class="form-group mb-2">
                <label for="lessonTime">Choose a Time for the Lesson:</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="date" id="lessonDay" name="lessonDay" min={{date("Y-m-d")}}>
                    </div>
                </div>
            </div> 
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lessonGroup" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Is this a group lesson?:
                </label>
            </div>
                                                  
            <div class="text-right">
                <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Next</button>
            </div>
            </form>
        </div>
</div>
@endsection