
<table class="table align-center">
    <thead>
        <tr class="text-center">
            <th class="align-middle" width="14.3%">Sunday</th>
            <th width="14.3%">Monday</th>
            <th width="14.3%">Tuesday</th>
            <th width="14.3%">Wednesday</th>
            <th width="14.3%">Thursday</th>
            <th width="14.3%">Friday</th>
            <th width="14.3%">Saturday</th>
        </tr>
    </thead>
    <tbody>
    @for ($i = 8; $i <= 20; $i++)
        <tr class="text-center">
            <td rowspan="1"><input type="checkbox" class="btn-check" id="su{{ $i }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="su{{ $i }}">{{ $i . ':00' }}</label>
            </td>
            <td rowspan="1"><input type="checkbox" class="btn-check" id="m{{ $i }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="m{{ $i }}">{{ $i . ':00' }}</label>
            </td>
            <td rowspan="1"><input type="checkbox" class="btn-check" id="tu{{ $i }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="tu{{ $i }}">{{ $i . ':00' }}</label>
            </td>
            <td rowspan="1"><input type="checkbox" class="btn-check" id="w{{ $i }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="w{{ $i }}">{{ $i . ':00' }}</label>
            </td>
            <td rowspan="1"><input type="checkbox" class="btn-check" id="th{{ $i }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="th{{ $i }}">{{ $i . ':00' }}</label>
            </td>
            <td rowspan="1"><input type="checkbox" class="btn-check" id="f{{ $i }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="f{{ $i }}">{{ $i . ':00' }}</label>
            </td>
            <td rowspan="1"><input type="checkbox" class="btn-check" id="sa{{ $i }}" autocomplete="off">
                <label class="btn btn-outline-primary" for="sa{{ $i }}">{{ $i . ':00' }}</label>
            </td>
        </tr>
    @endfor
    </tbody>
</table>
<div class="text-center">
    <button id="updateButton" type="button" class="btn btn-primary">Update Availability</button>
</div>