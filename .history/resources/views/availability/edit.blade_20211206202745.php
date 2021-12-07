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
                    <select id="{{$day}}-start" name="{{$day}}-start">
                        <option value="08:00:00">08:00:00</option>
                        <option value="09:00:00">09:00:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="11:00:00">11:00:00</option>
                        <option value="12:00:00">12:00:00</option>
                        <option value="13:00:00">13:00:00</option>
                        <option value="14:00:00">14:00:00</option>
                        <option value="15:00:00">15:00:00</option>
                        <option value="16:00:00">16:00:00</option>
                        <option value="17:00:00">17:00:00</option>
                        <option value="18:00:00">18:00:00</option>
                        <option value="19:00:00">19:00:00</option>
                        <option value="20:00:00">20:00:00</option>
                    </select>    
                </td>
                
                <td>
                    <label for="{{$day}}-end"> End Time: </label> 
                    <select id="{{$day}}-end" name="{{$day}}-end">
                    <select id="{{$day}}-start" name="{{$day}}-start">
                        <option value="08:00:00">08:00:00</option>
                        <option value="09:00:00">09:00:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="11:00:00">11:00:00</option>
                        <option value="12:00:00">12:00:00</option>
                        <option value="13:00:00">13:00:00</option>
                        <option value="14:00:00">14:00:00</option>
                        <option value="15:00:00">15:00:00</option>
                        <option value="16:00:00">16:00:00</option>
                        <option value="17:00:00">17:00:00</option>
                        <option value="18:00:00">18:00:00</option>
                        <option value="19:00:00">19:00:00</option>
                        <option value="20:00:00">20:00:00</option>
                    </select>   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <button id="updateButton" type="button" class="btn btn-primary">Update Availability</button>
    </div>
</div>