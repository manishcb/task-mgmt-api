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

        $user->dashboard=$req->dashboard;
        $user->createuser=$req->createuser;
        $user->task=$req->task;
        $user->forms=$req->forms;

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

   function allusers()
    {
        // get all data from Userdtl table with model
        
        //$allusers=Userdtl::all();
        $allusers=Userdtl::orderBy('id', 'desc')->get();
        return response()->json([
              "success"=>true,
              "data"=>$allusers
          ],200);   
    }


    //get All Users already task assigned or not
    function usertaskassigned(Request $req)
    {
        // get all data from carmodels table with model
        $allUsers=Userdtl::all();
        $matchedUsers = array();
        
        foreach($allUsers as $result)
        {
        $name=$result->name;
        $search=Tasktouser::where([
     
            ['name', '=',$name],
            ['task_id', '=', $req->task_id]])->get();
            $reccount = $search->count();
            if($reccount>0)
            {
                $data[] =[
                    'name' => $result->name,
                    'task_id' => $req->task_id,
                    'assigned'=>true
                ];
            }

            else
            {
                $data[] =[
                    'name' => $result->name,
                    'assigned'=>false
                ];
            }

       }
        

        return response()->json([
              "success"=>true,
              "data"=>$data
          ],200);    
       
    }


    // post API to update  data for an existing user
    function update_newuser(Request $req)
    {
        $data[] = [
            'name'=>$req->name,
            'email'=>$req->email,
            'designation'=>$req->designation,
            'dashboard'=>$req->dashboard,
            'createuser'=>$req->createuser,
            'task'=>$req->task,
            'forms'=>$req->forms,

           ];

       $data=Userdtl::find($req->id); 
       $data->name=$req->name;
       $data->email=$req->email;
       $data->designation=$req->designation;
       $data->password=$req->password;
       
       if($req->dashboard==0)
       $data->dashboard=0;
       else
       $data->dashboard=1;

       if($req->createuser==0)
       $data->createuser=0;
       else
       $data->createuser=1;

       if($req->task==0)
       $data->task=0;
       else
       $data->task=1;
       

       if($req->forms==0)
       $data->forms=0;
       else
       $data->forms=1;
       
       $data->save();
       
       if($data)
       {
        return response()->json(
           [
               'success'=>true,
               'data'=>$data
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
