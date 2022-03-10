<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class verifyCode extends Controller
{
    public function verifyCode(Request $request){
        
        $email = $request->input('email');
        $code = $request->input('code');
        $name = $request->input('name');
        
        if($email == ''){
            return [
                "status"=>405,
                "message"=>'email is Required',
            ];
        }else if($code == ''){
            return [
                "status"=>405,
                "message"=>'code is Required',
            ];
        }else if($name == ''){
            return [
                "status"=>405,
                "message"=>'name is Required',
            ];
        }else{
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
                "message"=>'Email Sended Successfully',
            ];
        }
    }
}