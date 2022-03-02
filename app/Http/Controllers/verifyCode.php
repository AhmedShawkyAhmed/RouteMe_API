<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class verifyCode extends Controller
{
    //
    public function send(Request $request)
    {
        $email = $request->input('email');
        $code = $request->input('code');
        $name = $request->input('name');

        $details =[
            'recipient' => $email,
            'subject' => 'Verification Code',
            'name' => $name,
            'code' => $code,
        ];
        
        Mail::send('email-templet',$details, function($code) use ($details){
            $code->to($details['recipient'])
                    ->subject($details['subject']);
        });
        return [
            "status"=>200,
            "message"=>'Email Sended Successfully'
        ];
    }
}