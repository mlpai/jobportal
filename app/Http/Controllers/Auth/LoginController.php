<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Route;

use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "company/dashboard";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->user();
        // dd($user);
        $dbUser = User::where('email',$user->email)->first();
        if($dbUser)
        {
            Auth::login($dbUser);
            return redirect()->route('dashboard');
        } else {
            $dbUser = new User;
            $dbUser->name = $user->name;
            $dbUser->email = $user->email;
            $dbUser->password = bcrypt('password');
            $dbUser->verified = 1;
            $dbUser->save();
            Auth::login($dbUser);
            return redirect()->route('dashboard');
        }

    }


}
