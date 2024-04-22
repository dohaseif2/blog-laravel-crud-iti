<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->body=$request->body;
        $user->user_id=$request->user_id;
        $user->post_id=$request->post_id;
        $user->save();
        return "added successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment=User::find($id);
        return new UserResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        $user->body=$request->body;
        $user->save();
        return "updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->delete();
        return "destory successfully";

    }
}
