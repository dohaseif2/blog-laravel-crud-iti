<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
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
    }
    function create(){
        return view('posts.create');
    }
    function store($request){
        return redirect()->route('posts.index');
    }
    function show($post){
        return view('posts.show',['post'=>$post]);
    }
    function edit($post){
        $post=[
            'id'=>$post,
            'title'=>'clean code',
            'author'=>'doha',
            'content'=>'hello world',
        ];
        return view('posts.edit',['post'=>$post]);
    }
    function update(Request $request,$post){
        return redirect()->route('posts.show', ['post' => $post]);
    }
    function destroy($post){
        return 'deleted';
    }
}
