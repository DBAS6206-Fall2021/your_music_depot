<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //dd($request);

        // foreach($request->all() as $key => $param)
        // {
        //     if($param['start'] != null && $param['end'] != null)
        //     {
        //         InstructorAvailability::updateOrCreate(
        //             ['user_id' => $user->id, 'weekday' => $key],
        //             ['start_availability' => $param['start'], 'end_availability' => $param['end']]
        //         );
        //     }
        // }
        //dump($request);

        foreach($request->all() as $key => $param)
        {
            dump($key);
            dump($param->start);
        }

        // if (($a = $request->Sunday)['start'] === null)
        //     dump(true);
        // else 
        //     dump(false);    
        
        
        //return view('availability.show', compact('availability', 'user'));
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
