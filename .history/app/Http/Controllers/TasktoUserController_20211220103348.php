<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Tasktouser; // import model

class TasktoUserController extends Controller
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
           $taskModel=new Taskmaster;
           $taskModel->task_admin_name=$req->task_admin_name;
           $taskModel->task=$req->task;
           $taskModel->task_create_date=date('Y-m-d',strtotime($req->task_create_date));
           $taskModel->task_start_date=date('Y-m-d',strtotime($req->task_start_date));
           $taskModel->task_start_time=($req->task_start_time);
           $taskModel->task_end_date=date('Y-m-d',strtotime($req->task_end_date));
           $taskModel->task_end_time=$req->task_end_time;
           $taskModel->task_duration_mnts=$req->task_duration_mnts;
           $taskModel->task_priority=$req->task_priority;
           $taskModel->task_remarks=$req->task_remarks;
           
           $data=$taskModel->save();
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


   //get All alltask
   function alltask()
   {
       // get all carRegistration
       $alltask=Taskmaster::all();
       return response()->json([
             "success"=>true,
             "data"=>$alltask
         ],200);    
      
   }

}