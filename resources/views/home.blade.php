@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @include('shared.banner')
        <div class="col-md-12">

            <div class="bg-white m-0 p-0">
                @if($user->type() == 'M')
                    @include('management.dashboard')
                @elseif($user->type() == 'I')
                    @include('instructors.dashboard')
                @elseif($user->type() == 'C')
                    @include('clients.dashboard')
                @endif
            </div>
        </div>
    </div>
@endsection
