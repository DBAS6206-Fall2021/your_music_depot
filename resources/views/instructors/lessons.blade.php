@extends('layouts.app')

@section('content')
    @include('shared.banner')
    @include('instructors.dashboard')
    <div class="d-flex justify-content-center bg-white m-0 p-0">
        @include('lessons._show')
    </div>
@endsection