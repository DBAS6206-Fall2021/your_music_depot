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
@extends('layouts.app')

@section('content')
<div class="justify-content-center">
    @include('shared.banner')
    @include('instructors.dashboard')
    <div class="bg-white d-flex">
        <div class="m-6 ml-auto">
            <a class="btn btn-primary btn-block" href="/users/{{$user->id}}/availability/edit">Edit Availability</a>
        </div>
    </div>
    <div class="bg-white m-0 p-0">
        <table class="table table-sm table-bordered table-hover">
            <thead>
                <tr>
                <th>&nbsp;</th>
                @foreach ($days as $day) 
                    <th width="14.2%">{{$day}}</th>
                @endforeach
                </tr>
            </thead>
            <tbody>
            @for ($i = 8; $i <= 20; $i++) 
            <div class="d-none">
                {{$i = sprintf("%02d", $i)}}
            </div>
                <tr>
                    <td>{{ $i . ':00'}}</td>

                    @foreach ($days as $day)
                        @if (($a = $availability->firstWhere('weekday', $day)) != null)
                            @if($a->start_availability <= $i.':00:00' and $a->end_availability > $i.':00:00')
                                <td class="bg-secondary" rowspan="1"></td>
                            @else
                                <td class="no-event" rowspan="1"></td>
                            @endif    
                        @else
                            <td class="no-event" rowspan="1"></td>
                        @endif
                    @endforeach
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection