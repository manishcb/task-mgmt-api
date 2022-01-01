<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\User_task_progress_master; // import model
use App\Models\Taskmaster; // import model
use App\Models\User_task_progress_detail; // import model

class TaskFetchController extends Controller
{
   //
   function fetchtask()
   {

       

          
        $taskmaster = new Taskmaster;
        $progress_master = new User_task_progress_master;
        $progress_detail = new User_task_progress_detail;

        $alltask = Taskmaster::all()->toArray();

        $individual_array = array();

        foreach($alltask as $value){

            $task_id = $value['id'];
            
            $individual_array[$value['id']] = User_task_progress_master::where('task_id',$task_id)->get()->toArray();

        }

        $data = array(
              'alltask' => $alltask,
              'individual_array' => $individual_array

        );
        


           if($data)
           {

            return response()->json([
                "success"=>true,
                "data"=> $data
            ],200);   
  
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


   // checktasktouser() to check the task already assigned to the user
   // check through name and task_id



}