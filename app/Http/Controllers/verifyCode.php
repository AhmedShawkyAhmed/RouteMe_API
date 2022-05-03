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
            $result = DB::select("select name from companies where email = '$email'");
            if($result){
                $this->send($email, $result, $code);
            }else{
                $result = DB::select("select name from dispatchers where email = '$email'");
                if($result){
                    $this->send($email, $result, $code);
                }else{
                    $result = DB::select("select name from drivers where email = '$email'");
                    if($result){
                        $this->send($email, $result, $code);
                    }else{
                        $result = DB::select("select name from vendors where email = '$email'");
                        if($result){
                            $this->send($email, $result, $code);
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
        return [
            "status"=>200,
            "message"=>'Email Sended Successfully',
        ];
    }
}