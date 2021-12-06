@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="user/update/{{$user->id}}">
                        @include('shared._user_form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
