<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchOrders extends Controller
{
    public function searchOrders(Request $request){

        $orderId = $request->orderId;

        if($orderId == ''){
            $result = DB::select("select * from orders where state != 'assigned'");

            if ($result){
                return response(
                    json_encode($result),
                    200,
                    [
                        'Content-Type' => 'application/json;charset=UTF-8',
                    ],
                );
            }else {
                return [
                    "status"=>404,
                    "message"=>'No Orders Found',
                ];
            }
        }else{
            $result = DB::select("select * from orders where id = $orderId and state != 'assigned'");

            if ($result){
                return response(
                    json_encode($result),
                    200,
                    [
                        'Content-Type' => 'application/json;charset=UTF-8',
                    ],
                );
            }else {
                return [
                    "status"=>404,
                    "message"=>'No Orders Found',
                ];
            }
        }
    }
}