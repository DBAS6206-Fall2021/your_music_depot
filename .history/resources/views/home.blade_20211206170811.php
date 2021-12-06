@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @include('shared.banner')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $type }} Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    You are logged in!

                </div>
            </div>
            <div class="bg-white m-0 p-0">
               <!-- @include('availability.show') -->
                 @include('availability.update')
            </div>
        </div>
    </div>
@endsection
