<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class createTask extends Controller
{
    public function createTask(Request $request){
        $task = new task();

        $task->orderNumber = $request->orderNumber;
        $task->driverId = $request->driverId;
        $task->dispatcherId = $request->dispatcherId;
        $task->clientName = $request->clientName;
        $task->clientPhone = $request->clientPhone;
        $task->itemCount = $request->itemCount;
        $task->price = $request->price;
        $task->vendorId = $request->vendorId;
        $task->branchId = $request->branchId;
        $task->lon = $request->lon;
        $task->lat = $request->lat;
        $task->address = $request->address;
        $task->start = $request->start;
        $task->end = $request->end;
        $task->comment = $request->comment;
        $task->status = $request->status;

        $result = DB::select("select * from tasks where orderNumber = '$task->orderNumber'");
        
        if($result){
            return [
                "status"=>408,
                "message"=>'Task Already Exist',
            ];
        }else{
            if($task->orderNumber == ''){
                return [
                    "status"=>405,
                    "message"=>'orderNumber is Required',
                ];
            }else if($task->driverId ==''){
                return [
                    "status"=>405,
                    "message"=>'driverId is Required',
                ];
            }else if($task->dispatcherId ==''){
                return [
                    "status"=>405,
                    "message"=>'dispatcherId is Required',
                ];
            }else if($task->clientName ==''){
                return [
                    "status"=>405,
                    "message"=>'clientName is Required',
                ];
            }else if($task->clientPhone ==''){
                return [
                    "status"=>405,
                    "message"=>'clientPhone is Required',
                ];
            }else if($task->itemCount ==''){
                return [
                    "status"=>405,
                    "message"=>'itemCount is Required',
                ];
            }else if($task->price ==''){
                return [
                    "status"=>405,
                    "message"=>'price is Required',
                ];
            }else if($task->vendorId ==''){
                return [
                    "status"=>405,
                    "message"=>'vendorId is Required',
                ];
            }else if($task->branchId ==''){
                return [
                    "status"=>405,
                    "message"=>'branchId is Required',
                ];
            }else if($task->lon ==''){
                return [
                    "status"=>405,
                    "message"=>'lon is Required ( Longitude )',
                ];
            }else if($task->lat ==''){
                return [
                    "status"=>405,
                    "message"=>'lat is Required ( Latitude )',
                ];
            }else if($task->address ==''){
                return [
                    "status"=>405,
                    "message"=>'address is Required',
                ];
            }else if($task->start ==''){
                return [
                    "status"=>405,
                    "message"=>'start is Required',
                ];
            }else if($task->end ==''){
                return [
                    "status"=>405,
                    "message"=>'end is Required',
                ];
            }else if($task->comment ==''){
                return [
                    "status"=>405,
                    "message"=>'comment is Required',
                ];
            }else if($task->status ==''){
                return [
                    "status"=>405,
                    "message"=>'status is Required',
                ];
            }else{
                $result = $task->save();
                if($result){
                    return [
                        "status"=>200,
                        "message"=>'Task Created Successfully',
                    ];
                }else{
                    return [
                        "status"=>500,
                        "message"=>'Failed to Create Task',
                    ];
                }
            }
        }
    }
}