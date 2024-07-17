<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserTypeController;


Route::middleware('auth:sanctum')->get("/user", function(Request $request){
    return $request->user();
});

#Route::apiResource('posts', UserController::class);
Route::apiResource('posts', UserController::class)->middleware('auth:sanctum');

Route::delete('/auth/delete', [UserController::class, 'delete']);
Route::put('/auth/edit/{id}', [UserController::class, 'edit']);


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/logout', [AuthController::class, 'logoutUser'])->middleware('auth:sanctum');

Route::post('/createUserType', [UserTypeController::class, 'createUserType']);
