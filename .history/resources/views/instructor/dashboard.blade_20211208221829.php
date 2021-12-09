
<div>
   
    <div class="card">
        <div class="card-header text-center">Instructor Dashboard</div>
    </div>

    <div class="bg-white m-0 p-0">
        <div class="d-flex justify-content-center">
            <div class="m-2">
                @include('lessons._show')
            </div>
            <div class="m-2">
                <a class="btn btn-primary btn-block" href="/users/{{$user->id}}/availability">View Schudele</a>
            </div>
        </div>
    </div>
</div>