<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    function index(){
        $posts=Post::paginate(2);
        return view('posts.index',["posts"=>$posts]);
    }
    function create(){
        return view('posts.create');
    }
    function store(Request $request){
        $post= new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->author;
        $post->save();
        return redirect()->route('posts.index');
    }
    function show($post){
        $post=Post::find($post);
        return view('posts.show',['post'=>$post]);
    }
    function edit($post){
        $post=Post::find($post);
        return view('posts.edit',['post'=>$post]);
    }
    function update(Request $request,$post){
        $post=Post::find($post);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->author;
        $post->save();
        return redirect()->route('posts.show', ['post' => $post]);
    }
    function destroy($post){
        $post=Post::find($post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
