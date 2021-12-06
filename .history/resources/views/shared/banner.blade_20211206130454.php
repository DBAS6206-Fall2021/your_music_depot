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
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card-body">
                    <form method="POST" action="user/update/{{$user->id}}">
                        @include('shared._user_form')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>
</div>