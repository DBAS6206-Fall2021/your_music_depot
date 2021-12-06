<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

         $user = Auth::user();
         $userType = $user->type();

            switch ($userType)
            {
                case 'M':
                    return view('management.dashboard');
                    break;
                case 'I':
                    return view('instructor.dashboard');
                    break;   
                default:
                    return view('home');
                    break; 
            }
    }
}
