<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $userType = Auth::user()->user_type_id;

            switch ($userType)
            {
                case 1;
                    return redirect('management.dashboard');
                    break;
                case 2;
                    return redirect('instructor.dashboard');
                    break;   
                case 3;
                    return redirect('/home');
                    break; 
            }
        }

        return $next($request);
    }
}
