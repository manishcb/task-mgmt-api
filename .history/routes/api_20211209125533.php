<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarmodelController;
use App\Models\User;
use App\Http\Controllers\CarRegistrationController;
use App\Http\Controllers\AuthController;

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


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

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


