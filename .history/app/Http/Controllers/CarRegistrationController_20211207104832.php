<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Car_registration; // import model

class CarRegistrationController extends Controller
{
    // 
    function addnewCarModel(Request $req)
    {
        //echo $req;
        $carModel=new Carmodel;
        $carModel->car_brand=$req->car_brand;
        $carModel->car_model=$req->car_model;
        $carModel->car_fuel_type=$req->car_fuel_type;
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

    //get All Carmodels
    function allCarModel()
    {
        // get all data from carmodels table with model
        $carModel=Carmodel::all();
        return response()->json([
              "success"=>true,
              "data"=>$carModel
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