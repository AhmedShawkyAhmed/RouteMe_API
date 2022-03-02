<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class search extends Controller
{
    //
    public function search(Request $request){ 

        $orderId  = $request->input('orderId');
        $vendorId   = $request->input('vendorId');

        if($vendorId == ''){
            return [
                "status"=>405,
                "message"=>'VendorId is Required'
            ];
        }else{
            if($orderId == ''){
                $result = DB::select("select * from orders where vendorId  = $vendorId");
                return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
            }else{
                $result = DB::select("select * from orders where vendorId  = $vendorId and orderId  = $orderId");
                return response(json_encode($result),200,['Content-Type' => 'application/json;charset=UTF-8']);
            }
        }
    }
}