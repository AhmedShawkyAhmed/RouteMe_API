<?php

namespace App\Http\Controllers;

use App\Models\studentsModel;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function create(Request $request)
    {
        $student = new studentsModel();

        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->email = $request->input('email');
        $student->pass = $request->input('pass');

        $result = $student->save();
        if($result)
        {
            return ["Result"=>'Data has been saved'];
        }
        else{
            return ["Result"=>'Failed'];
        }
    }
}
