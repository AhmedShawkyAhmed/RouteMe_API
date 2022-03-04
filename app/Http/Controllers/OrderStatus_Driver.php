<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class OrderStatus_Driver extends Controller
{
    public function OrderStatus_Driver(Request $request)
    {
        $OrderId = $request->input('OrderId');
        $OrderStatus = $request->input('OrderStatus');

        if($OrderId == ''){
            return [
                "status"=>405,
                "message"=>'Order Id is Required',
            ];
        }else if($OrderStatus == ''){
            return [
                "status"=>405,
                "message"=>'Order status is Required',
            ];
            }else{
                
                
                if(!is_null(Order::find($OrderId))){
                    $OrderStatus = Order::find($OrderId);
                    $result = $OrderStatus->update($request->all());
                    if($result){
                        return [
                            "status"=>200,
                            "message"=>'Order Status Updated Successfully',
                        ];
                    }
            }else{
                return [
                    "status"=>404,
                    "message"=>'Order not Found',
                ];
            }
        }
    }
}
