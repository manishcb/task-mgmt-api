<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Admin; // import model

class AdminController extends Controller
{
    //
    function newAdmin(Request $req)
    {

        $adminModel=new Admin;
        $adminModel->name=$req->name;
        $adminModel->password=$req->password;
        
        $data=$adminModel->save();
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


    function getPassword(Request $req)
    {
        
        $data=Admin::firstOrFail()->where('name',$req->uname);
        return response()->json(
            [
                'success'=>false,
                'data'=>$req->uname,
                

            ]
            );


    }

}
