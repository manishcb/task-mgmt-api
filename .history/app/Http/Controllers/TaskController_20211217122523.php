<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Taskmaster; // import model


class TaskController extends Controller
{
    //
    function newtask(Request $req)
    {
        $rules=array(
        'task_admin_name'=>"required",
        'task'=>"required",
        'task_create_date'=>"required",
        'task_start_date'=>"required",
        'task_start_time'=>"required",
        'task_end_date'=>"required",
        'task_end_time'=>"required",
        'task_duration_mnts'=>"required",
        'task_priority'=>"required",
        'task_remarks'=>"required",
        
    );
        //'car_owner_image'=>"required");
        $validator=Validator::make($req->all(),$rules);

        if($validator->fails())
        {
            return response()->json($validator->errors(),401); 
        }

        else
        { //else

            //echo $req;
            $carModel=new Usertask;
            $carModel->car_brand=$req->car_brand;
            $carModel->car_model=$req->car_model;
            $carModel->car_fuel_type=$req->car_fuel_type;
            $carModel->car_regis_date=date('Y-m-d',strtotime($req->car_regis_date));
            $carModel->car_owner_name=$req->car_owner_name;
            $carModel->car_owner_address=$req->car_owner_address;
            $carModel->car_owner_phone=$req->car_owner_phone;
            $carModel->car_owner_email=$req->car_owner_email;
            
            $data=$carModel->save();
            if($data)
            {
            return response()->json(
                [
                    'success'=>true
                ]
                );
            }
            else
            {
                return response()->json(
                    [
                        'success'=>false
                    ]
                    );
            }
        }
}
