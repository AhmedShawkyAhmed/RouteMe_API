<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class TaskStatus_Driver extends Controller
{
    public function TaskStatus_Driver(Request $request)
    {
        $TaskId = $request->input('TaskId');
        $TaskStatus = $request->input('TaskStatus');

        if($TaskId == ''){
            return [
                "status"=>405,
                "message"=>'Task Id is Required',
            ];
        }else if($TaskStatus == ''){
            return [
                "status"=>405,
                "message"=>'Task status is Required',
            ];
            }else{
                
                
                if(!is_null(Task::find($TaskId))){
                    $TaskStatus = Task::find($TaskId);
                    $result = $TaskStatus->update($request->all());
                    if($result){
                        return [
                            "status"=>200,
                            "message"=>'Task Status Updated Successfully',
                        ];
                    }
            }else{
                return [
                    "status"=>404,
                    "message"=>'Task not Found',
                ];
            }
        }
    }
}
