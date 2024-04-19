<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($post)
    {
        return view('comments.create',['post'=>$post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->body=$request->body;
        $comment->user_id=$request->user_id;
        $comment->post_id=$request->post_id;
        $comment->save();
        return redirect()->route('posts.show',['post'=> $comment->post_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment=Comment::find($id);
        return view('comments.show',['comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment=Comment::find($id);
        return view('comments.edit',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment=Comment::find($id);
        $comment->body=$request->body;
        $comment->save();
        return redirect()->route('posts.show',['post'=> $comment->post_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        return redirect()->route('posts.show',['post'=> $comment->post_id]);

    }
}
