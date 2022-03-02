<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class requestPickup extends Controller
{
    //
    public function requestPickup(Request $request)
    {
        $PickUp = new order();
    
        $PickUp->clientName = $request->input('clientName');
        $PickUp->clientPhone = $request->input('clientPhone');
        $PickUp->itemCount = $request->input('itemCount');
        $PickUp->price = $request->input('total');
        $PickUp->branchId = $request->input('branchId');
        $PickUp->vendorId = $request->input('vendorId');
        $PickUp->clientLocation = $request->input('clientLocation');

        if($PickUp->clientName == ''){
            return [
                "status"=>405,
                "message"=>'Client Name is Required'
            ];
        }else if($PickUp->clientPhone ==''){
            return [
                "status"=>405,
                "message"=>'Client phone is Required'
            ];
        }else if($PickUp->itemCount ==''){
            return [
                "status"=>405,
                "message"=>'Item count is Required'
            ];
        }else if($PickUp->price ==''){
            return [
                "status"=>405,
                "message"=>'price is Required'
            ];
        }else if($PickUp->branchId ==''){
            return [
                "status"=>405,
                "message"=>'branchId is Required'
            ];
        }else if($PickUp->vendorId ==''){
            return [
                "status"=>405,
                "message"=>'vendorId is Required'
            ];
        }else if($PickUp->clientLocation ==''){
            return [
                "status"=>405,
                "message"=>'clientLocation is Required'
            ];
        }else{
            $result = $PickUp->save();
            if($result)
            {
                return [
                    "status"=>200,
                    "message"=>'Pick Up Request Created Successfully'
                ];
            }
            else{
                return [
                    "status"=>500,
                    "message"=>'Failed to Create'
                ];
            }
        }
    }
}
