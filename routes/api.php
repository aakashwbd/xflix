<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\UploaderController;
use Illuminate\Support\Facades\Route;

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

    Route::prefix('auth')->group(function () {
        Route::post('signup',[AuthController::class,"userRegister"]);
        Route::post('register',[AuthController::class,"register"]);
        Route::post('login',[AuthController::class,"login"]);

        Route::middleware('auth:sanctum')->group(function (){
            Route::post('profile',[AuthController::class,"profileInfo"]);
        });
    });

    Route::post('search-user', [AuthController::class, 'searchUser']);

    Route::prefix('admin')->group(function(){
        Route::get('user/get-all',[AuthController::class,'index']);
        Route::post('setting/store',[\App\Http\Controllers\SettingController::class,'store']);
        Route::get('setting/get-all',[\App\Http\Controllers\SettingController::class,'index']);
        Route::post('category/store',[\App\Http\Controllers\CategoryController::class,'store']);
        Route::get('category/all',[\App\Http\Controllers\CategoryController::class,'getAll']);
        Route::post('invite-code/store',[\App\Http\Controllers\InviteCodeController::class,'store']);
        Route::post('invite-code/get-all',[\App\Http\Controllers\InviteCodeController::class,'index']);
        Route::post('notification/store',[\App\Http\Controllers\NotificationController::class,'store']);
    });

Route::post('video/store',[\App\Http\Controllers\VideoController::class,'store']);
Route::get('video/get-all',[\App\Http\Controllers\VideoController::class,'index']);
Route::get('video/id',[\App\Http\Controllers\VideoController::class,'update']);

    Route::post('image-uploader',[UploaderController::class, 'imgUploader']);

    //Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //    return $request->user();
    //});
