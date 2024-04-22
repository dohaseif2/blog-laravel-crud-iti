<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index()
    {
        $posts=Comment::all();
        return CommentResource::collection($posts);
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->body=$request->body;
        $comment->user_id=$request->user_id;
        $comment->post_id=$request->post_id;
        $comment->save();
        return "added successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment=Comment::find($id);
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment=Comment::find($id);
        $comment->body=$request->body;
        $comment->save();
        return "updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        return "destory successfully";

    }
}
