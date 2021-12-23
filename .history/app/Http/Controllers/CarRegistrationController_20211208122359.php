<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Car_registration; // import model

class CarRegistrationController extends Controller
{
    // 
    function newCarRegistration(Request $req)
    {
        $rules=array(
        'car_brand'=>"required",
        'car_model'=>"required",
        'car_fuel_type'=>"required",
        'car_regis_date'=>"required",
        'car_owner_name'=>"required",
        'car_owner_address'=>"required",
        'car_owner_phone'=>"required",
        'car_owner_email'=>"required",
        'car_owner_aadhar_no'=>"required",
        // 'car_owner_pan_no'=>"required",
        // 'car_owner_voter_card_no'=>"required",
        // 'car_insurance_company'=>"required",
        // 'car_insurance_expire_date'=>"required",
        // 'car_registration_no'=>"required",
        //'car_chasis_no'=>"required",
        //'car_milage_in_km'=>"required" 
    
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
            
            $carModel->car_owner_aadhar_no=$carModel->car_owner_aadhar_no;
            $carModel->car_owner_pan_no=$carModel->car_owner_pan_no;
            $carModel->car_owner_voter_card_no=$carModel->car_owner_voter_card_no;
            $carModel->car_insurance_company=$carModel->car_insurance_company;
            // $carModel->car_insurance_expire_date=date('Y-m-d',strtotime($req->car_insurance_expire_date));
            // $carModel->car_registration_no=$carModel->car_registration_no;
            //$carModel->car_chasis_no=$carModel->car_chasis_no;
            //$carModel->car_milage_in_km=$carModel->car_milage_in_km;

            //$carModel->car_owner_image=$req->car_owner_image;
            
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

    //get All allCarRegistration
    function allCarRegistration()
    {
        // get all carRegistration
        $carRegistration=Car_registration::all();
        return response()->json([
              "success"=>true,
              "data"=>$carRegistration
          ],200);    
       
    }

    public function carModelDelete($id)
    {
        $delete_confirm=Carmodel::find($id)->delete();
        if($delete_confirm)
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

    // post API to update data
     function updateCarModel(Request $req)
     {
        $data=Carmodel::find($req->id); 
        $data->car_brand=$req->car_brand;
        $data->car_model=$req->car_model;
        $data->car_fuel_type=$req->car_fuel_type;
        $data->save();
        
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