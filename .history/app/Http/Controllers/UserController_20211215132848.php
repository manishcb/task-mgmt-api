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
        $user->designation=$user->designation;
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

}
