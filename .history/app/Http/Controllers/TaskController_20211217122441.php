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
            $carModel=new Car_registration;
            $carModel->car_brand=$req->car_brand;
            $carModel->car_model=$req->car_model;
            $carModel->car_fuel_type=$req->car_fuel_type;
            $carModel->car_regis_date=date('Y-m-d',strtotime($req->car_regis_date));
            $carModel->car_owner_name=$req->car_owner_name;
            $carModel->car_owner_address=$req->car_owner_address;
            $carModel->car_owner_phone=$req->car_owner_phone;
            $carModel->car_owner_email=$req->car_owner_email;
            
            $carModel->car_owner_aadhar_no=$req->car_owner_aadhar_no;
            $carModel->car_owner_pan_no=$req->car_owner_pan_no;
            $carModel->car_owner_voter_card_no=$req->car_owner_voter_card_no;
            $carModel->car_insurance_company=$req->car_insurance_company;
            $carModel->car_insurance_expire_date=date('Y-m-d',strtotime($req->car_insurance_expire_date));
            $carModel->car_registration_no=$req->car_registration_no;
            $carModel->car_chasis_no=$req->car_chasis_no;
            $carModel->car_milage_in_km=$req->car_milage_in_km;


            $carModel->car_owner_image=$req->car_owner_image;
            $carModel->car_owner_aadhar_image=$req->car_owner_aadhar_image;
            $carModel->car_owner_pan_image=$req->car_owner_pan_image;
            $carModel->car_owner_voter_image=$req->car_owner_voter_image;
            $carModel->car_owner_insurance_image=$req->car_owner_insurance_image;
            $carModel->car_image=$req->car_image;
            $carModel->car_blue_book_image=$req->car_blue_book_image;


            
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
