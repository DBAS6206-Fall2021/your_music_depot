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
            <form method="POST" action="/users/{{$user->id}}/availability">
            @csrf
            @foreach ($days as $day) 
            <tr class="text-center">
                <td>
                    {{$day}}        
                </td>
                <td>
                    <label for="{{$day}}[start]"> Start Time: </label> 
                    <select id="{{$day}}[start]" name="{{$day}}[start]">
                    @error('{{$day}}[start]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <option value="">N/A</option>
                        @for ($i = 8; $i <= 20; $i++)
                             $i = sprintf("%02d", $i )
                            @if (($a = $availability->firstWhere('weekday', $day)) != null)
                                @if($a->start_availability == $i.':00:00')
                                <option value="{{$i}}:00:00" selected>{{$i}}:00:00</option>
                                @else
                                <option value="{{$i}}:00:00">{{$i}}:00:00</option>
                                @endif    
                            @else
                            <option value="{{$i}}:00:00">{{$i}}:00:00</option>
                            @endif
                        @endfor    
                    </select>    
                </td>
                
                <td>
                    <label for="{{$day}}[end]"> End Time: </label> 
                    <select id="{{$day}}[end]" name="{{$day}}[end]">
                        @error('{{$day}}[end]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <option value="">N/A</option>
                        @for ($i = 8; $i <= 20; $i++)
                        {{$i = sprintf("%02d", $i)}}
                            @if (($a = $availability->firstWhere('weekday', $day)) != null)
                                @if($a->end_availability == $i.':00:00')
                                <option value="{{$i}}:00:00" selected>{{$i}}:00:00</option>
                                @else
                                <option value="{{$i}}:00:00">{{$i}}:00:00</option>
                                @endif    
                            @else
                            <option value="{{$i}}:00:00">{{$i}}:00:00</option>
                            @endif
                        @endfor    
                    </select>  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <button id="updateButton" type="submit" class="btn btn-primary">Update Availability</button>
    </div>
    </form>
</div>