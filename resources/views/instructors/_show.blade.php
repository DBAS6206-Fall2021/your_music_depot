<div class="row justify-content-center">
    <div class="col-sm">
        <h1 class="h3 mt-3 mb-3 font-weight-normal text-center">
            All Instructors
        </h1>
        <table class="table table-sm table-striped">
            <tbody>
                <tr class="text-center">
                    <th class="col-sm-3">Name</th>
                    <th>Manage</th>
                </tr>
                
                @foreach($users as $user)
                <tr class="text-center">
                    <td>
                        {{$user->first_name . ' ' . $user->last_name}}
                    </td>
                    <td class="d-flex justify-content-around">
                        <div>
                            <a href="/users/{{$user->id}}" class="btn btn-primary btn-block">View</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>