<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailVerifications;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmail(User $user)
    {
        $verification = EmailVerifications::updateOrCreate(
            ['user_id' => $user->id],
            ['token' => Str::random(60)]
        );

        Mail::to($user->email)->send(new VerificationEmail($verification->token));


    }

    public function verify($token)
    {
        $verification = EmailVerifications::where('token', $token)->first();


        if (!$verification) {
            return view('auth.error_2');
        }

        $user = User::where('id', $verification->user_id)->first();

        if ($user->email_verified_at) {
            return view('auth.error');
        }

        $user->email_verified_at = now();
        $user->save();

        return view('auth.success');
    }

    public function resendVerificationEmail(User $user)
    {
        $verification = EmailVerifications::updateOrCreate(
            ['user_id' => $user->id],
            ['token' => Str::random(60)]
        );

        Mail::to($user->email)->send(new VerificationEmail($verification->token));

        return redirect()->back()->with('message', 'Verification email resent!');
    }
}
