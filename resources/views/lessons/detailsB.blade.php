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
        <form method="POST" action="/student/{{$student->id}}/lesson/detailsC" novalidate>
            @csrf
            <p class="hint-text">Select an available time for your lesson</p>
            <table class="table align-center">
                <tbody>
                    <tr class="text-center">
                        <td>
                            <label for="lessonStart"> Start Time: </label> 
                            <select id="lessonStart" name="lessonStart">
                                <option value="">N/A</option>
                                @foreach ($availability as $ava)
                                    <option value="{{$ava}}" >{{$ava}}</option>
                                @endforeach    
                            </select>    
                        </td>
                    </tr>
                </tbody>
            </table>
                                              
            <div class="text-right">
                <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Book this lesson</button>
            </div>
        </form>
    </div>
</div>
@endsection