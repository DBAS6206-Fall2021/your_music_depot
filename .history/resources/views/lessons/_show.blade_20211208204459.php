<div class="row justify-content-center">
    <div class="col-sm">
        <h1 class="h3 mt-3 mb-3 font-weight-normal text-center">
            Upcoming Lessons
        </h1>
        <table class="table table-sm table-striped">
            <tbody>
                <tr  class="text-center">
                    <th>Student</th>
                    <th>Lesson Type</th>
                    <th>Instructor</th>
                    <th width="10%">Room Number</th>
                    <th>Date</th>
                    <th>Starts</th>
                    <th>Ends</th>
                    <th>Cancel Lessons</th>
                </tr>
                @foreach($lessons as $lesson)
                    @foreach($lesson->students as $s)
                    <form method="POST" action="/lesson/{{$lesson->id}}/destroy/">
                        @csrf
                        <tr class="text-center">
                            <td>{{ $s->first_name . ' ' . $s->last_name }}</td>
                            <td>{{ $lesson->instrument->name }}</td>
                            <td>{{ $lesson->users->first()->first_name . ' ' . $lesson->users->first()->last_name }}</td>
                            <td>{{ $lesson->room_number }}</td>
                            <td>{{ $lesson->date }}</td>
                            <td>{{ $lesson->start_time }}</td>
                            <td>{{ $lesson->end_time }}</td>
                            <td></tdclass>
                            <button id="submitButton" type="submit" class="btn btn-primary btn-lg">Cancel</button>
                            </td>
                        </tr>
                    </form>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>