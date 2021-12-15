<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users= User::orderBy('last_name', 'desc')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        if (Auth::user()->cant('view', $user))
            return redirect('/home');
        
        // If Client    
        if (Auth::user()->type() == "C")
        {
            $students = $user->students()->get();   

            $lessons = collect([]);
            foreach($students as $s){
                foreach($s->lessons as $l) {
                    if($l != null){
                        if($l->date > Carbon::Today()->shiftTimezone('America/Toronto')){
                            $lessons->push($l);
                        }
                        elseif (Carbon::parse($l->date) == Carbon::Today()) {
                            if(Carbon::parse($l->start_time)->shiftTimezone('America/Toronto') > Carbon::Now()->setTimezone('America/Toronto')) {
                                $lessons->push($l);
                            }
                        }
                    }     
                }
            }

            $lessons = $lessons->sortBy('date')->values()->all();
                
            return view('users.show', compact('user', 'students', 'lessons'));
        }
        elseif(Auth::user()->type() == "I")
        {
            $lessons = $user->lessons->sortBy('date')->values()->all();

            foreach($lessons as $lesson)
            {
                $students->push($lesson->students()->get());
            }
            
            return view('users.show', compact('user', 'lessons'));
        }
        else
        {
            return view('users.show', compact('user'));
        }

        // If Instructor
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

        return view('users.edit', compact('user'));
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
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'min:10', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        User::where('id', $user->id)
              ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('/home');
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