<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\File;
use App\Http\Resources\PostResource;


class PostController extends Controller
{
    function index()
    {
        $posts = Post::with('user')->paginate(2);
        return PostResource::collection($posts);
    }
    function store(StorePostRequest $request)
    {
        $post = new Post();
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
        return  "added successfully";
    }
    function show($postId)
    {
        $post = Post::with('user')->find($postId);
        return new PostResource($post);
    }

    function update(StorePostRequest $request, $postId)
    {
        $post = Post::find($postId);
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $name = time() . "." . $extension;
            $file->move('uploads/posts', $name);

            $post->avatar = $name;
       

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->author;
        $post->save();
        return "updated successfully";
    }
    function destroy($id)
    {
        $post = Post::find($id);
        if ($post->avatar) {
            $oldAvatarPath = public_path('uploads/posts/') . $post->avatar;
            if (File::exists($oldAvatarPath)) {
                File::delete($oldAvatarPath);
            }
        }
        $post->delete();
        return "destory successfully";
    }
}
