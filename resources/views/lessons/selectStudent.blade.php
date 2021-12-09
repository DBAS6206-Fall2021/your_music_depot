@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center bg-white m-0 p-0">
    <div class="m-3">
        <h1 class="display-4">Book a Lesson</h1>
        <h2 class="display-4">Select a student</h2>
        @include('students._show')
    </div>
</div>
@endsection