<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchTasks extends Controller
{
    public function searchTasks(Request $request){

        $dispatcherId = $request->input('dispatcherId');
        $taskId = $request->input('taskId');

        if($dispatcherId == ''){
            return [
                "status"=>405,
                "message"=>'dispatcherId is Required',
            ];
        }else{
            if($taskId == ''){
                $result = DB::select("select * from tasks where dispatcherId  = $dispatcherId");
                if ($result){
                    return [
                        "status"=>200,
                        "tasks"=>$result,
                    ];
                }else {
                    return [
                        "status"=>404,
                        "message"=>'No Task Found',
                    ];
                }
            }else{
                $result = DB::select("select * from tasks where dispatcherId  = $dispatcherId and id = $taskId");
                if ($result){
                    return [
                        "status"=>200,
                        "tasks"=>$result,
                    ];
                }else {
                    return [
                        "status"=>404,
                        "message"=>'No Task Found',
                    ];
                }
            }
        }
    }
}