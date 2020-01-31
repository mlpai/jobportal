<?php

namespace App\Http\Controllers\Authorization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class VerificationController extends Controller
{
    public function index()
    {
        $msg = '';
        if(session()->has('msg'))
        {
            $msg = session()->get('msg');
        }
        return "<div style='text-align:center;border-radius:30px; border:4px double #015e84; margin:50px auto; width:60%;'>
            <div style='padding:50px;'>
            <h2>".$msg."</h2>
            <h1>Please Verify Your Email First.</h1>
            <p>Check your email, and click on the link which is in the mail to verify your Email</p>
            <hr/>
            OR
            <hr/>
            <p style='color:red'>Click here to Resend Verification Code again</p><br/>
            <a href=".route('resendEmail')."><button>Resend Email</button></a>
            </div>
            </div>";
    }

    public function verify($token)
    {
        $user = User::where('user_token',$token)->firstorfail();
        $user->user_token = null;
        $user->verified = User::VERIFIED_USER;
        $user->save();
        return redirect()->route('dashboard');
    }

    public function resendEmail()
    {
        $user = Auth::user();
        if($user->verified)
        {
            return redirect()->route('dashboard')->with(['info'=>'Email has been verified!!']);
        }
        retry(5,function() use($user) {
            Mail::to($user)->send(new VerifyEmail($user));
       },100);

       return redirect()->route('verificationPage')->with(["msg"=>"Email has been resent"]);

    }
}
