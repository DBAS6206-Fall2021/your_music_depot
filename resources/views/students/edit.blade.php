@extends('layouts.app')

@section('content')
<div class="d-block-flex justify-content-center bg-white m-0 p-0">
    <h1 class="display-4">Update your students information</h1>
    <form id="updateStudentForm" method="POST" action="/student/edit/{{ $student->id }}">
        @csrf
        <div class="form-group mb-2">
            <div class="d-flex justify-content-between">
                <div class="col-md-6">
                    <input class="form-control" type="text" name="firstName" id="firstName" value="{{ $student->first_name }}" required>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{ $student->last_name }}" required>
                </div>
            </div>
        </div>                    
                                          
        <div class="text-right">
            <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Update Student</button>
        </div>
    </form>
</div>
@endsection