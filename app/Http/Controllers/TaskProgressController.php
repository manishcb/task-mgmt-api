<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\User_task_progress_master; // import model
use App\Models\Taskmaster; // import model
use App\Models\User_task_progress_detail; // import model

class TaskProgressController extends Controller
{
   //
   function addtasktime(Request $req)
   {

       $rules=array(
       'task_id'=>"required",        
       );
       
       $validator=Validator::make($req->all(),$rules);

       if($validator->fails())
       {
           return response()->json(
            [
                'success'=>false
            ]
            );
       }

       else
       { //else

          
        $taskmaster = new Taskmaster;
        $progress_master = new User_task_progress_master;
        $progress_detail = new User_task_progress_detail;
        $status = $req->status;
        

        if($status == 'start'){

            $progress_detail->task_id = $req->task_id;
            $progress_detail->task_start_date = date('Y-m-d',strtotime($req->date));
            $progress_detail->task_start_time = $req->time;
            $progress_detail->save();

            $data=Taskmaster::find($req->task_id); 
            $data->task_start_date = date('Y-m-d',strtotime($req->date));
            $data->task_start_time = $req->time;
            $data->save();
        
        }
        if($status == 'pause'){

            // $previous_data = User_task_progress_detail::where([
     
            //     ['task_id', '=', $req->task_id]])->orderBy('id', 'desc')->take(1)->get()->toArray();

            // if($previous_data['task_start_date'] != ""){

            //     $date1 = new DateTime($previous_data['task_start_date']." ".$previous_data['task_start_time']);
            //     $date2 = new DateTime($req->date." ".$req->time);
            //     $diff_time = abs($date1->getTimestamp() - $date2->getTimestamp()) / 60;
            //     // $hours = floor($sum / 60);
            //     // $min = floor($sum - ($hours * 60));
            //     // $total_time = $hours."H:".$min."M";


            // } 
            
            // if($previous_data['task_resume_date'] != ""){

            //     $date1 = new DateTime($previous_data['task_resume_date']." ".$previous_data['task_resume_time']);
            //     $date2 = new DateTime($req->date." ".$req->time);
            //     $diff_time = abs($date1->getTimestamp() - $date2->getTimestamp()) / 60;
            //     // $hours = floor($sum / 60);
            //     // $min = floor($sum - ($hours * 60));
            //     // $total_time = $hours."H:".$min."M";

                
            // }

            $progress_detail->task_id = $req->task_id;
            $progress_detail->task_pause_date = date('Y-m-d',strtotime($req->date));
            $progress_detail->task_pause_time = $req->time;
            $progress_detail->task_break_mnts = $req->break_minute;
            $progress_detail->save();

            $data = User_task_progress_master::find($req->task_id); 
            $data->total_work_mnts = $req->total_work_mnts;
            $data->total_break_mnts = $req->total_break_mnts;
            $data->gross_work_mnts = $req->gross_work_mnts;
            $data->save();

            $data_new = Taskmaster::find($req->task_id); 
            $data_new->task_duration_mnts = $req->gross_work_mnts;
            $data_new->save();




            
        }
        if($status == 'resume'){

            $progress_detail->task_id = $req->task_id;
            $progress_detail->task_resume_date = date('Y-m-d',strtotime($req->date));
            $progress_detail->task_resume_time = $req->time;
            $progress_detail->save();
            
        }
        if($status == 'commit'){

            $progress_detail->task_id = $req->task_id;
            $progress_detail->task_stop_date = date('Y-m-d',strtotime($req->date));
            $progress_detail->task_stop_time = $req->time;
            $progress_detail->task_break_mnts = $req->break_minute;
            $progress_detail->save();


            $data=Taskmaster::find($req->task_id); 
            $data->task_end_date = date('Y-m-d',strtotime($req->date));
            $data->task_end_time = $req->time;
            $data->task_duration_mnts = $req->gross_work_mnts;
            $data->task_remarks = $req->remark;
            $data->save();

            $data_new = User_task_progress_master::find($req->task_id); 
            $data_new->total_work_mnts = $req->total_work_mnts;
            $data_new->total_break_mnts = $req->total_break_mnts;
            $data_new->gross_work_mnts = $req->gross_work_mnts;
            $data_new->remark = $req->remark;
            $data_new->save();
            
        }

         



       
           if($progress_detail)
           {
           return response()->json(
               [
                   'success'=>true,
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


   // checktasktouser() to check the task already assigned to the user
   // check through name and task_id



}