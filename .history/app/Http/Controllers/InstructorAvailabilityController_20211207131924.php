<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\InstructorAvailability;

class InstructorAvailabilityController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $availability = $user->instructorAvailability()->orderBy('start_availability', 'asc');

        return view('availability.show', compact('availability', 'user'));
    }

    /**
     * Show the form for storing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {

        $availability = $user->instructorAvailability;

        return view('availability.show', compact('availability', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->cant('view', $user))
            return redirect('/home');

        $availability = $user->instructorAvailability()->get();

        //dd($availability);

        return view('availability.edit', compact('availability', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->cant('view', $user))
            return redirect('/home');

            $this->validate(request(), [
                'Sunday.start' => ['sometimes', 'nullable','required_with:Sunday.end','date_format:H:i:s', 'before:Sunday.end'],
                'Sunday.end' => ['sometimes','nullable','required_with:Sunday.start','date_format:H:i:s', 'after:Sunday.start'],      
                'Monday.start' => ['sometimes', 'nullable','required_with:Monday.end','date_format:H:i:s', 'before:Monday.end'],
                'Monday.end' => ['sometimes','nullable','required_with:Monday.start','date_format:H:i:s', 'after:Monday.start'],
                'Tuesday.start' => ['sometimes', 'nullable','required_with:Tuesday.end','date_format:H:i:s', 'before:Tuesday.end'],
                'Tuesday.end' => ['sometimes','nullable','required_with:Tuesday.start','date_format:H:i:s', 'after:Tuesday.start'],
                'Wednesday.start' => ['sometimes', 'nullable','required_with:Wednesday.end','date_format:H:i:s', 'before:Wednesday.end'],
                'Wednesday.end' => ['sometimes','nullable','required_with:Wednesday.start','date_format:H:i:s', 'after:Wednesday.start'],
                'Thursday.start' => ['sometimes', 'nullable','required_with:Thursday.end','date_format:H:i:s', 'before:Thursday.end'],
                'Thursday.end' => ['sometimes','nullable','required_with:Thursday.start','date_format:H:i:s', 'after:Thursday.start'],
                'Friday.start' => ['sometimes', 'nullable','required_with:Friday.end','date_format:H:i:s', 'before:Friday.end'],
                'Friday.end' => ['sometimes','nullable','required_with:Friday.start','date_format:H:i:s', 'after:Friday.start'],
                'Saturday.start' => ['sometimes', 'nullable','required_with:Saturday.end','date_format:H:i:s', 'before:Saturday.end'],
                'Saturday.end' => ['sometimes','nullable','required_with:Saturday.start','date_format:H:i:s', 'after:Saturday.start' ],
                
            ]);

        foreach($request->all() as $key => $param)
        {
            if($request->input($key.'.start') != null && $request->input($key.'.end') != null)
            {
                InstructorAvailability::updateOrCreate(
                    ['user_id' => $user->id, 'weekday' => $key],
                    ['start_availability' => $request->input($key.'.start'), 'end_availability' => $request->input($key.'.end')]
                );
            }
            else
            {
                $availability = $user->instructorAvailability()->get();
                //$availability = InstructorAvailability::where([['user_id', '=', $user->id], ['weekday', '=', $key]]);

                if (($a = $availability->firstWhere('weekday', $key)) != null){
                    //dd($a->id);
                    InstructorAvailability::destroy($a->id);
                }
            }
        }
        
        return view('availability.show', compact('availability', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
