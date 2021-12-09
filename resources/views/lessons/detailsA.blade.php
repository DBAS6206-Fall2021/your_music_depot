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
    <form method="POST" action="/student/{{$student->id}}/lesson/detailsB">
      @csrf
      <p class="hint-text">Select the Instrument and Instructor</p>
      <div class="form-group mb-2">
        <label for="lessonInstrument">Choose Type of Instrument:</label>
        <select name="lessonInstrument" id="lessonInstrument" required>
            <option value="0">-</option>
            @foreach($instruments as $instrument)
              <option value="{{$instrument->id}}">{{$instrument->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group mb-2">
        <label for="lessonInstructor">Choose an Instructor:</label>
        <select name="lessonInstructor" id="lessonInstructor" required>
            <option value="0">-</option>
            @foreach($instructors as $instructor)
              <option value="{{$instructor->id}}">{{$instructor->first_name . ' ' . $instructor->last_name}}</option>
            @endforeach
        </select>
      </div>     
                                        
      <div class="text-right">
          <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Next</button>
      </div>
    </form>
  </div>
</div>
@endsection