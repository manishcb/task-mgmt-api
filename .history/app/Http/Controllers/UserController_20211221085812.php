<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Userdtl; // import model
use App\Models\Tasktouser; // import model



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
    function allUsers(Request $req)
    {
        // get all data from carmodels table with model
        $allUsers=Userdtl::all();

        $matchedUsers = array();
        $search=[];
    foreach($allUsers as $result){
        $name=$result->name;
        
        $search[]=Tasktouser::where([
     
            ['name', '=',$name],
            ['task_id', '=', $req->task_id]])->get();
            //$reccount = $search->count();
       }
        

        return response()->json([
              "success"=>true,
              "data"=>$search
          ],200);    
       
    }


    // post API to update  data for an existing user
    function update_newuser(Request $req)
    {
       $data=Userdtl::find($req->id); 
       $data->name=$req->name;
       $data->email=$req->email;
       $data->designation=$req->designation;
       $data->password=$req->password;
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


    public function deleteUser($id)
    {
        $delete_confirm=Userdtl::find($id)->delete();
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


}
