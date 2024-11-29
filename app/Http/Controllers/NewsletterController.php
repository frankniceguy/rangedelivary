<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){
        $data = $request->validate([
            'email' => 'email|required'
        ]);

        $sub = subscriber::where('email', $data['email'])->first();
        if($sub){
            $notification = array(
                'message' => 'Already subscribed to our newsletter',
                'alert-type' => 'success'
            );
        }else{
            Subscriber::create($request->only('email'));
            $notification = array(
                'message' => 'Successfully subscribed to our newsletter',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);

    }
}
