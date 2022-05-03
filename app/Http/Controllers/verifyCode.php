<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class verifyCode extends Controller
{
    public function verifyCode(Request $request){
        
        $email = $request->input('email');
        $code = $request->input('code');
        
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
        }else{
            $result = DB::select("select * from companies where email = '$email'");
            if($result){
                foreach($result as $user)
                $this->send($email, $user->name, $code);
                return [
                    "status"=>200,
                    "id"=>$user->id,
                    "type"=>$user->type,
                    "message"=>'Email Sent Successfully',
                ];
            }else{
                $result = DB::select("select * from dispatchers where email = '$email'");
                if($result){
                    foreach($result as $user)
                    $this->send($email, $user->name, $code);
                    return [
                        "status"=>200,
                        "id"=>$user->id,
                        "type"=>$user->type,
                        "message"=>'Email Sent Successfully',
                    ];
                }else{
                    $result = DB::select("select * from drivers where email = '$email'");
                    if($result){
                        foreach($result as $user)
                        $this->send($email, $user->name, $code);
                        return [
                            "status"=>200,
                            "id"=>$user->id,
                            "type"=>$user->type,
                            "message"=>'Email Sent Successfully',
                        ];
                    }else{
                        $result = DB::select("select * from vendors where email = '$email'");
                        if($result){
                            foreach($result as $user)
                            $this->send($email, $user->name, $code);
                            return [
                                "status"=>200,
                                "id"=>$user->id,
                                "type"=>$user->type,
                                "message"=>'Email Sent Successfully',
                            ];
                        }else{
                            return [
                                "status"=>404,
                                "message"=>'User Not Found',
                            ];
                        }
                    }
                }
            }
            
        }
    }

    function send($email, $name, $code)
    {
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
    }
}