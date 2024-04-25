<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

use App\Http\Requests\StorePostRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index(){
        $posts=Post::paginate(2);
        return view('posts.index',["posts"=>$posts]);
    }
    public function create()
{
    return view('posts.create');
}
    function store(StorePostRequest $request){
       

        $post= new Post();
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $name = time().".".$extension;
            $file->move('uploads/posts',$name);
            $post->avatar=$name;
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->author;
        
        $post->save();
        return redirect()->route('posts.index');
    }
    function show($postId){
        $post=Post::find($postId);
        return view('posts.show',['post'=>$post]);
    }
    function edit($post){
        $post=Post::find($post);
        return view('posts.edit',['post'=>$post]);
    }
    function update(StorePostRequest $request,$postId){
        $post=Post::find($postId);
        if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $extension = $file->getClientOriginalExtension();
        $name = time() . "." . $extension;
        $file->move('uploads/posts', $name);

        $post->avatar = $name;
    }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->author;
        $post->save();
        return redirect()->route('posts.show', ['post' => $post]);
    }
    function destroy($id){
        $post=Post::find($id);
        if ($post->avatar) {
            $oldAvatarPath = public_path('uploads/posts/') . $post->avatar;
            if (File::exists($oldAvatarPath)) {
                File::delete($oldAvatarPath);
            }
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
