<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\User_form_master; // import model
use App\Models\User_form_detail; // import model

class UserFormController extends Controller
{
    //

    function createform(Request $req)
    {
        // insert User_form_master data
        $count=0;
        $User_form_master=new User_form_master;
        // get the last record id
        $count=User_form_master::orderBy('id', 'desc')->first();

         if($count)
         {
            $count=$count->id+1;
            
         }

         else
         {
            $count=1;
         }

        $formname='Userform-'.$count;
        $todolist = $req->todolist;

         $data = [];
         foreach($todolist as $todolist) 
         {
             $data[] = [
             'formname'=>$formname,
             'label'=>$todolist['label'],
             'type'=>$todolist['type'],
             'name'=>$todolist['name']

            ];
         }

          $master=User_form_master::insert($data);
 
            if($master)
            {
                $master_success='true';
            }
            else
            {
                $master_success='false';
            }
            // end of insert master data



        // insert User_form_detail data

         $User_form_detail=new User_form_detail;
         $selectlist = $req->selectlist;

         $data = [];
         foreach($selectlist as $selectlist) 
         {
             $data[] = [
             'formname'=>$formname,
             'item'=>$selectlist['item'],
             'type'=>$selectlist['type'],
            ];
         }

          $detail=User_form_detail::insert($data);
 
            if($detail)
            {
            return response()->json(
                [
                    'detail_success'=>true,
                    'data'=>$data,
                    'master_success'=>$master_success
                    ]
                );
            }
            else
            {
                return response()->json(
                    [
                        'success'=>false,
                        'detail_success'=>false,
                        'master_success'=>$master_success
                    ]
                    );
            }

            // end of insert master data


    }
    

    function getallform()
    {
        // order by desc
        $allform=User_form_master::select('formname')->distinct()->get();
        return response()->json([
              "success"=>true,
              "data"=>$allform
          ],200);    
       
    }


    function getFormData(Request $req)
    {
     
      $formmaster=new User_form_master;
      $formdetail=new User_form_detail;

 
     $searchmaster=User_form_master::where([
      
          ['formname', '=',$req->formname]])->get();
         $reccount = $searchmaster->count();
 
    $searchdetail=User_form_detail::where([
      
            ['formname', '=',$req->formname]])->get();
           
     if($searchmaster)
     {
     return response()->json(
         [
             'success'=>true,
             'master_data'=>$searchmaster,
             'detail_data'=>$searchdetail

         ]
         );
     }
 
    }


    public function deleteForm($formname)
    {
        $delete_confirm=User_form_master::where([
        ['formname', '=',$formname]])->delete();
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
