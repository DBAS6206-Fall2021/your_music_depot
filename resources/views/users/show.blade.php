@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @include('shared.banner')
        <div class="col-md-12">
            
            
                @include('users.dashboard')
            
        </div>
    </div>
@endsection
