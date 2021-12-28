<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Admin; // import model

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register','getpassword']]);
    }


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
        $data=Admin::where('name','=',$req->uname)->firstOrFail();    
        if($data)
        {
        return response()->json(
            [
                'success'=>true,
                'data'=>$req->uname,
                'adminpassword'=>$data->password,
                'mytoken'=> $this->createNewToken($token)

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


    protected function createNewToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


}
