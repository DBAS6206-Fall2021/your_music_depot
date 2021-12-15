@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center bg-white m-0 p-0">
        <h1>Select the group lesson for <b>{{ $student->first_name . ' ' . $student->last_name}}</b> to join.</h1>
        
    </div>

    <div class="row justify-content-center">
        <div class="col-sm">
            <h1 class="h3 mt-3 mb-3 font-weight-normal text-center">
                Upcoming Group Lessons
            </h1>
            <table class="table table-sm table-striped">
                <tbody>
                    <tr  class="text-center">
                        <th width="8%">Capacity</th>
                        <th>Instrument</th>
                        <th>Instructor</th>
                        <th width="8%">Room Number</th>
                        <th>Date</th>
                        <th>Starts</th>
                        <th>Ends</th>
                        <th>Join</th>
                    </tr>
                    @foreach($lessons as $lesson)
                        <tr class="text-center">
                            <td>{{ $lesson->room }}</td>
                            <td>{{ $lesson->instrument->name }}</td>
                            <td>{{ $lesson->users->first()->first_name . ' ' . $lesson->users->first()->last_name }}</td>
                            <td>{{ $lesson->room_number }}</td>
                            <td>{{ $lesson->date }}</td>
                            <td>{{ $lesson->start_time }}</td>
                            <td>{{ $lesson->end_time }}</td>
                            <td>
                                <a href="/lesson/{{$lesson->id}}/destroy" class="btn btn-primary btn-block">Join</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection