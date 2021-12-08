@extends('layouts.app')

@section('content')
<div class="justify-content-center">

<div class="d-block-flex justify-content-center bg-white m-0 p-0">
        <div class="login" id="contentArea">
            <h1 class="display-4">Book a Lesson</h1>
            <div class="form-group mb-2 border-bottom">
                <div>
                    <div class="col-md-6">
                        <h2>Student Name</h2>
                    </div>
                    <div>
                        <div class="col-md-6">
                            <h5>{{$student->first_name . ' ' . $student->last_name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <form id="bookLessonForm" novalidate>
                <p class="hint-text">Select </p>
              

                                                  
                <div class="text-right">
                    <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Next</button>
                </div>
            </form>
        </div>
</div>
@endsection