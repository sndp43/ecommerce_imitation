<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionVerification;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function newsLetterRequset(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $existSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if(!empty($existSubscriber)){
            if($existSubscriber->is_verified == 0){
                $existSubscriber->verified_token = \Str::random(25);
                $existSubscriber->save();
                // set mail config
                MailHelper::setMailConfig();
                // send mail
                Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));

                return response(['status' => 'success', 'message' => 'A link to verify your account has been sent. Check your email!']);

            }elseif($existSubscriber->is_verified == 1){
                return response(['status' => 'error', 'message' => 'You’ve already joined—no need to subscribe again!']);
            }
        }else {
            $subscriber = new NewsletterSubscriber();
            $subscriber->email = $request->email;
            $subscriber->verified_token = \Str::random(25);
            $subscriber->is_verified = 0;
            $subscriber->save();

            // set mail config
            MailHelper::setMailConfig();

            // send mail
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));

            return response(['status' => 'success', 'message' => 'A link to verify your account has been sent. Check your email!']);
        }



    }

    public function newsLetterEmailVarify($token)
    {
       $verify = NewsletterSubscriber::where('verified_token', $token)->first();
       if($verify){
            $verify->verified_token = 'verified';
            $verify->is_verified = 1;
            $verify->save();
            toastr('Your email has been successfully verified!', 'success', 'success');
            return redirect()->route('home');
       }else {
            toastr('Oops! The token is invalid.', 'error', 'Error');
            return redirect()->route('home');
       }
    }
}
