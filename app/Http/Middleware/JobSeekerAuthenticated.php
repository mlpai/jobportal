<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class JobSeekerAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->userType != 'JOBSEEKER_USER' )
        {
            return redirect()->back()->with(['type'=>'Error','msg'=>"Your are not Authorized User"]);
        }
        return $next($request);
    }
}
