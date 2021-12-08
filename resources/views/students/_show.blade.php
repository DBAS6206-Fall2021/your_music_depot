<div class="row justify-content-center">
    <div class="col-sm">
        <div class="col-sm">
            <h1 class="h3 mt-3 mb-3 font-weight-normal text-center">
                Your Students
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <table class="table table-sm table-striped">
                <tbody>
                    <tr class="text-center">
                        <th class="col-sm-5">Name</th>
                        <th>Manage</th>
                    </tr>
                    
                    @foreach($students as $student)
                    <tr class="text-center">
                        <td>
                            {{$student->first_name . ' ' . $student->last_name}}
                        </td>
                        <td class="d-flex justify-content-between">
                            <div>
                                <a href="#" class="btn btn-primary btn-block">Edit</a>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary btn-block">Lessons</a>
                            </div>
                            <div>
                                <a href="/student/{{$student->id}}/lesson/create" class="btn btn-primary btn-block">Book</a>
                            </div>
                            <div>
                                <a href="/student/remove/{{$student->id}}" class="btn btn-primary btn-block">Remove</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <a href="/student/create" class="btn btn-primary btn-block col-sm-5">
                    Add New Student
                </a>
            </div>
        </div>
    </div>
</div>