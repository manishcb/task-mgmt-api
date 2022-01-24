<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Taskmaster; // import model
use Illuminate\Support\Facades\Storage;


class TaskController extends Controller
{
    //
    function newtask(Request $req)
    {

        

        $rules=array(
        'task_admin_name'=>"required",
        'task'=>"required",
        'task_create_date'=>"required",
        //'task_start_date'=>"required",
        //'task_start_time'=>"required",
        'task_duration_mnts'=>"required",
        'task_end_date'=>"required",
        //'task_end_time'=>"required",
        'task_priority'=>"required",
        //'task_remarks'=>"required",
        
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
            $taskModel->task_create_date=date('Y-m-d',strtotime($req->task_create_date));
            $taskModel->task=$req->task;

            //$taskModel->task_start_date=date('Y-m-d',strtotime($req->task_start_date));
            //$taskModel->task_start_time=($req->task_start_time);
            $taskModel->task_duration_mnts=$req->task_duration_mnts;
            $taskModel->task_end_date=date('Y-m-d',strtotime($req->task_end_date));
            //$taskModel->task_end_time=$req->task_end_time;
            $taskModel->task_priority=$req->task_priority;
            $taskModel->task_remarks=$req->task_remarks;

            $taskModel->work_location=$req->work_location;
            $taskModel->lati=$req->lati;
            $taskModel->longi=$req->longi;



            
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
        //$alltask=Taskmaster::all();
        // order by desc
        $alltask=Taskmaster::orderBy('task_create_date', 'desc')->get();

        return response()->json([
              "success"=>true,
              "data"=>$alltask
          ],200);    
       
    }


        // post API to update  data for an existing task according id
        function update_task(Request $req)
        {

            // $data[] = [
            //     'task_id' => $req->id,
            //     'task_admin_name'=>$req->task_admin_name,
            //     'task'=>$req->task,
            //     'task_create_date'=>date('Y-m-d',strtotime($req->task_create_date)),
            //     'task_duration_mnts'=>$req->task_duration_mnts,
            //     'task_end_date'=>date('Y-m-d',strtotime($req->task_end_date)),
            //     'task_priority'=>$req->task_priority,
            //     'task_remarks'=>$req->task_remarks,
    
            //     ];

            // return response()->json(
            //     [
            //         'success'=>false,
            //         'data'=>$data
            //     ]
            //     );

           $data=Taskmaster::find($req->id); 
           $data->task_admin_name=$req->task_admin_name;
           $data->task_create_date=date('Y-m-d',strtotime($req->task_create_date));
           $data->task=$req->task;
           $data->task_duration_mnts=$req->task_duration_mnts;
           $data->task_end_date=date('Y-m-d',strtotime($req->task_end_date));
           $data->task_priority=$req->task_priority;
           $data->task_remarks=$req->task_remarks;

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
    

    // createform
    function createform(Request $req)
    {
        Storage::put('form.json', $req);
        
        return response()->json(
            [
                'success'=>true,
                'data'=>$req->formitems
            ]
            );

    }

    
    public function deleteTask($id)
    {
        $delete_confirm=Taskmaster::find($id)->delete();
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