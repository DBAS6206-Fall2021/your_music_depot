<div class="row justify-content-center">
    <div class="col-sm">
        <h1 class="h3 mt-3 mb-3 font-weight-normal text-center">
            Upcoming Lessons
        </h1>
        <table class="table table-sm table-striped">
            <tbody>
                <tr  class="text-center">
                    <th>Student</th>
                    <th width="8%">Lesson Type</th>
                    <th>Instrument</th>
                    <th>Instructor</th>
                    <th width="8%">Room Number</th>
                    <th>Date</th>
                    <th>Starts</th>
                    <th>Ends</th>
                    <th>Cancel Lessons</th>
                </tr>
                @foreach($students as $s)
                    @foreach($s->lessons as $lesson)
                        <tr class="text-center">
                            <td>{{ $s->first_name . ' ' . $s->last_name }}</td>
                            <td>{{ $lesson->lessonType->type }}</td>
                            <td>{{ $lesson->instrument->name }}</td>
                            <td>{{ $lesson->users->first()->first_name . ' ' . $lesson->users->first()->last_name }}</td>
                            <td>{{ $lesson->room_number }}</td>
                            <td>{{ $lesson->date }}</td>
                            <td>{{ $lesson->start_time }}</td>
                            <td>{{ $lesson->end_time }}</td>
                            <td>
                                <a href="/lesson/{{$lesson->id}}/destroy" class="btn btn-primary btn-block">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>