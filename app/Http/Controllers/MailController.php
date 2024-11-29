<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class MailController extends Controller
{
    //

    public function sendContactMail (Request $request){
        $request->validate([
            'email' => 'email|required',
            'subject' => 'string|required',
            'message' => 'string|required'
        ]);

        $email = $request->get('email');
        $subject = $request->get('subject');
        $message = $request->get('message');

        Mail::to('contact'.config('site.email_domain'))->send(new ContactMail($email,$subject,$message));
        $notification = array(
            'message' => 'Your message has been received',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
