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
<div>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>&nbsp;</th>
            @foreach ($days as $day) 
                <th width="14.2%">{{$day}}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
        @for ($i = 8; $i <= 20; $i++)
            <tr>
                <td>{{ $i . ':00'}}</td>

                @foreach ($days as $day)
                    <td class="no-event" rowspan="1"></td>
                @endforeach
            </tr>
        @endfor
        </tbody>
    </table>
</div>