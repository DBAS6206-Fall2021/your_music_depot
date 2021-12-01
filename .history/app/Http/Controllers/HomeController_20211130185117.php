<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         $userType = Auth::user()->user_type_id;

            switch ($userType)
            {
                case 1:
                    return view('management.dashboard');
                    break;
                case 2:
                    return view('instructor.dashboard');
                    break;   
                default:
                    return view('home');
                    break; 
            }
    }
}
