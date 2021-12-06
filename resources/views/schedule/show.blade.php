
<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th width="14.2%">Sunday</th>
                <th width="14.2%">Monday</th>
                <th width="14.2%">Tuesday</th>
                <th width="14.2%">Wednesday</th>
                <th width="14.2%">Thursday</th>
                <th width="14.2%">Friday</th>
                <th width="14.2%">Saturday</th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 8; $i <= 20; $i++)
            <tr>
                <td>{{ $i . ':00'}}</td>

                @for ($f = 0; $f < 7; $f++) 
                    <td class="no-event" rowspan="1"></td>
                @endfor
            </tr>
        @endfor
        </tbody>
    </table>
</div>