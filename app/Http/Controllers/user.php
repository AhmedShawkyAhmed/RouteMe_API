<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user extends Controller
{
    //
    public function getData(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');
        $result = DB::select("select * from students where email != '$email' and pass != '$pass'");
        if(!$result){
            return response(array(
                'message' => 'Not Found',
             ), 404);
            }
        else{
            return response(json_encode($result,JSON_PRETTY_PRINT),200,['Content-Type' => 'application/json;charset=UTF-8']);
        }
    }
}
