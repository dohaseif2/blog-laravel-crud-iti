<?php

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
Route::get('/posts',function(){
    $posts=[
        ["id"=>1,
        "title"=>"clean code",
        "content"=>"body....",
        "author"=>"doha"],
        ["id"=>2,
        "title"=>"laravel",
        "content"=>"body2....",
        "author"=>"noha"],
        ["id"=>3,
        "title"=>"database",
        "content"=>"body3....",
        "author"=>"soha"]
    ];
    return view('posts.index',["posts"=>$posts]);
})->name('posts.index');

Route::get('/posts/create',function(){
    return view('posts.create');
})->name('posts.create');

Route::post('/posts',function(){
    return redirect()->route('posts.index');
})->name('posts.store');

Route::get('/posts/{post}',function($post){
    return view('posts.show',['post'=>$post]);
})->where('post','[0-9]+')->name('posts.show');

Route::get('/posts/{post}/edit',function($post){
    return view('posts.edit',['post'=>$post]);
})->where('post','[0-9]+')->name('posts.edit');

Route::patch('posts/{post}', function($post) {
    return redirect()->route('posts.show', ['post' => $post]);
})->where('post','[0-9]+')->name('posts.update');

Route::delete('posts/{post}',function($post){
    return redirect()->route("posts.index");
})->where('post','[0-9]+')->name('posts.destroy');
