<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post}',[PostController::class,'show'])->where('post','[0-9]+')->name('posts.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->where('post','[0-9]+')->name('posts.edit');
Route::patch('posts/{post}',[PostController::class,'update'])->where('post','[0-9]+')->name('posts.update');
Route::delete('posts/{post}',[PostController::class,'destroy'])->where('post','[0-9]+')->name('posts.destroy');
