<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/posts',[PostController::class , 'index']);
Route::post('/posts',[PostController::class , 'store']);
Route::get('/posts/{id}',[PostController::class , 'show']);
Route::put('/posts/{id}',[PostController::class , 'update']);
Route::delete('/posts/{id}',[PostController::class , 'destroy']);

Route::get('/users',[UserController::class , 'index']);
Route::post('/users',[UserController::class , 'store']);
Route::get('/users/{id}',[UserController::class , 'show']);
Route::put('/users/{id}',[UserController::class , 'update']);
Route::delete('/users/{id}',[UserController::class , 'destroy']);