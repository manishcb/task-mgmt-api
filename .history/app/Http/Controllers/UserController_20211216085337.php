<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Userdtl; // import model


class UserController extends Controller
{
    //


    function newUser(Request $req)
    {

        $rules=array(
            'name' => 'required|string|between:6,10|unique:userdtls',
            'email' => 'required|string|email|max:100|unique:userdtls',
            'designation' => 'required',
            'password' => 'required|string|min:6',
          );

          $validator=Validator::make($req->all(),$rules);

          if ($validator->fails()) {
              return response()->json(array(
                  "status" => false,
                  "errors" => $validator->errors()
              ), 200);
          }


        //echo $req;
        $user=new Userdtl;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->designation=$req->designation;
        $user->password=$req->password;
        $data=$user->save();
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


    //get All Users
    function allUsers()
    {
        // get all data from carmodels table with model
        $allUsers=Userdtl::all();
        return response()->json([
              "success"=>true,
              "data"=>$allUsers
          ],200);    
       
    }


    // post API to update  data for an existing user
    function update_newuser(Request $req)
    {
       $data=Userdtl::find($req->id); 
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
