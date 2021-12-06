<div class="row">
    <div class="p-5 mb-4 bg-white rounded-3">
        <h1>{{ $user->first_name . ' ' . $user->last_name }}</h1>
        <div class="d-flex">
            <div class="m-auto p-0">
                <img class="rounded-circle headshot-portrait bg-primary" src="{{ URL('/images/ProfileIcon.png') }}" alt="Profile pic">
            </div>
            <div class="col-9">
                <div class="col-12">
                    <h2 for="inputAddress" class="form-label">Name</label>
                    <h5>{{ $user->first_name . ' ' . $user->last_name }}</h5>
                </div>
                <div class="col-md-6">
                    <h2 for="inputEmail4" class="form-label">Email</h2>
                    <h5>{{ $user->email }}</h5>
                </div>
                <div class="col-12">
                    <h2 for="inputAddress" class="form-label">Phone Number</h2>
                    <h5>(905) 123-4567</h5>
                </div>
                <div class="col-12">
                    <h2 for="inputAddress" class="form-label">Address</h2>
                    <h5>{{ $user->address }}</h5>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-lg text-light"
            href="/{{ $type }}/edit/{{ $user->id }}">Edit</a>
    </div>
</div>