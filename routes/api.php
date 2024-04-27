<?php

use App\Http\Controllers\api\authenticationController;
use App\Http\Controllers\api\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\GithubAuthController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts',PostController::class)->middleware('auth:sanctum');
Route::post('posts/{post}',[PostController::class,'update'])->where('post','[0-9]+')->name('posts.update');
Route::resource('comments',CommentController::class)->middleware('auth:sanctum');
Route::resource('users',UserController::class)->middleware('auth:sanctum');
Route::post('login',[authenticationController::class,'login']);
Route::post('logout',[authenticationController::class,'logout'])->middleware('auth:sanctum');
