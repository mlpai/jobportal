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
        return "<div style='text-align:center; margin:0px auto; width:60%;'>
            <h2>".$msg."</h2>
            <h3>Please Verify Your Email First.</h3>
            Click here to Resend Verification Code again
            <a href=".route('resendEmail').">Resend Email</a>
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
