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
            <datalist id="times">
                <option value="08:00:00">
                <option value="09:00:00">
                <option value="10:00:00">
                <option value="11:00:00">
                <option value="12:00:00">
                <option value="13:00:00">
                <option value="14:00:00">
                <option value="15:00:00">
                <option value="16:00:00">
                <option value="17:00:00">
                <option value="18:00:00">
                <option value="19:00:00">
                <option value="20:00:00">
            </datalist>
            @foreach ($days as $day) 
            <tr class="text-center">
                <td>
                    {{$day}}
                </td>
                <td>
                    <label for="{{$day}}-start"> Start Time: </label> 
                    <input list="times" id="{{$day}}-start" name="{{$day}}-start" value="times[5]">
                </td>
                
                <td>
                    <label for="{{$day}}-end"> End Time: </label> 
                    <input list="times" id="{{$day}}-end" name="{{$day}}-end">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <button id="updateButton" type="button" class="btn btn-primary">Update Availability</button>
    </div>
</div>