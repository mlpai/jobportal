<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Company;
class CheckIfProfileCreated
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
        if(Auth::user()->is_Verfied())
        {
            if(Auth::user()->userType == 'JOBSEEKER_USER')
            {
                return redirect(Route('jobseeker'));
            }

            $company = Company::findorfail(Auth::user()->id);
            if($company->CompanyProfile==null)
            {
                return redirect(Route('EditProfile'))->with(['warning'=>"Please Fill Profile Details First"]);
            }
        } else {
            return redirect(Route('verificationPage'));
        }

        return $next($request);
    }
}
