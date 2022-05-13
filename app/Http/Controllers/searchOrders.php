<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchOrders extends Controller
{
    public function searchOrders(Request $request){

        $orderId = $request->input('orderId');
        $server = $request->input('server');

        if($server == ''){
            return [
                "status"=>405,
                "message"=>'Server Name is Required',
            ];
        }else{
            if($orderId == ''){
                $result = DB::select("select * from orders where server = $server");
    
                if ($result){
                    return [
                        "status"=>200,
                        "orders"=>$result,
                    ];
                }else {
                    return [
                        "status"=>404,
                        "message"=>'No Orders Found',
                    ];
                }
            }else{
                $result = DB::select("select * from orders where id = $orderId and server = $server");
    
                if ($result){
                    return [
                        "status"=>200,
                        "orders"=>$result,
                    ];
                }else {
                    return [
                        "status"=>404,
                        "message"=>'No Orders Found',
                    ];
                }
            }
        }
    }
}