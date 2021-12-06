@php
$days = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        ];
@endphp

<div class="row p-0 m-0">
    <table class="table align-center col-10">
        <tbody>
            @foreach ($days as $day) 
            <tr class="text-center">
                <td>{{$day}}</td>
                <td><label for="{{$day}}-start"> Start Time: </label> <input type="time" step="3600000" id="{{$day}}-start" name="{{$day}}-start" min="08:00" max="20:00"></td>
                <td><label for="{{$day}}-end"> End Time: </label> <input type="time" step="3600" id="{{$day}}-end" name="{{$day}}-end" min="08:00" max="20:00"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <button id="updateButton" type="button" class="btn btn-primary">Update Availability</button>
    </div>
</div>