@extends('layouts.app')

@section('content')
<div class="bg-white m-0 p-0">
    <div class="row d-flex justify-content-center m-3">
        <div class="col-6">
            @include('instructors._show')
        </div>
    </div>
</div>
@endsection