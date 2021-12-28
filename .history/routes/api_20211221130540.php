<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarmodelController;
use App\Models\User;
use App\Http\Controllers\CarRegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TasktoUserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get admin password
Route::get('getpassword', [AdminController::class, 'getPassword']);
//Route::post('login', [AuthController::class, 'login']);

// create a new admin
Route::post('newadmin', [AdminController::class, 'newAdmin']);

// all API for user
Route::post('newuser', [UserController::class, 'newUser']);
Route::get('allusers',[UserController::class,'allusers']);
Route::get('user-task-assigned',[UserController::class,'usertaskassigned']);



Route::post("update_newuser",[UserController::class,"update_newuser"]);
Route::get('delete-user/{id}',[UserController::class,'deleteUser']); 

// All API for Add, Edit, Update and Delete Task
Route::post('newtask', [TaskController::class, 'newtask']);
Route::get('all-task',[TaskController::class,'alltask']);
Route::get('remove_assign_task/{task_id}/{name}',[TaskController::class,'removeassigntask']); 



// All API for Add task to user
Route::post('addtasktouser', [TasktoUserController::class, 'addtasktouser']);
Route::get('checktasktouser', [TasktoUserController::class, 'checktasktouser']);



Route::group([
    'middleware' => ["api"]],
    // 'prefix' => 'auth'

 function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);

    // api for Car Model Add, Edit, delete and Update
    Route::post('add-carmodel',[CarmodelController::class,'addnewCarModel']);
    Route::get('all-carmodel',[CarmodelController::class,'allCarModel']);
    Route::get('delete-carmodel/{id}',[CarmodelController::class,'carModelDelete']); 
    Route::post("update_carmodel",[CarmodelController::class,"updateCarModel"]);


    // api for Car Registration Add, Edit, delete and Update
    Route::post('new-car-registration',[CarRegistrationController::class,'newCarRegistration']);
    Route::get('all-car-registration',[CarRegistrationController::class,'allCarRegistration']);
    Route::get('delete-carmodel/{id}',[CarmodelController::class,'carModelDelete']); 
    Route::post("update_carmodel",[CarmodelController::class,"updateCarModel"]);

});


