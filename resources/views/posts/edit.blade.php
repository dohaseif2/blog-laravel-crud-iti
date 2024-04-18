@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>edit post number {{$post['id']}}</h1>
    <form method="POST" action="{{ route('posts.update', ['post' => $post['id']]) }}" enctype='multipart/form-data'>
        @method('PATCH')
        @csrf
        
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{$post['title']}}">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Content:</label>
            <textarea id="body" name="body" class="form-control" >{{$post['body']}}</textarea>
            @error('body')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" class="form-control" value="{{$post->user->id}}">
            @error('author')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control" value="">
            @error('avatar')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>

@endsection