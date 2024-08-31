<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlateNumberController;
use App\Http\Controllers\ServoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//http://localhost:8000/api/servo/1
Route::get('/servo/{status}', [ServoController::class, 'update']);

//http://localhost:8000/api/servo
Route::get('/servo', [ServoController::class, 'read']);




//http://localhost:8000/api/notification/1/hi
Route::get('/notification/{receiver_id}/{message}', [NotificationController::class, 'index']);


Route::get('/plate/{plate_number}', [PlateNumberController::class, 'index']);