@extends('layouts.app')
@php
$days = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        ];
@endphp

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
            <form id="bookLessonForm" method="POST" action="/student/{{$student->id}}/lesson/detailsC" novalidate>
                @csrf
                <table class="table align-center">
                    <tbody>
                        @csrf
                        <tr class="text-center">
                            <td>
                                {{ Session::get('data') }}        
                            </td>
                            <td>
                                <label for="lessonStart"> Start Time: </label> 
                                <select id="lessonStart" name="lessonStart">
                                    <option value="">N/A</option>
                                    @foreach ($availability as $ava)
                                        <option value="{{$ava->start_availability}}" >{{$ava->start_availability}}</option>
                                    @endforeach    
                                </select>    
                            </td>
                        </tr>
                    </tbody>
                </table>
              

                                                  
                <div class="text-right">
                    <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Next</button>
                </div>
            </form>
        </div>
</div>
@endsection