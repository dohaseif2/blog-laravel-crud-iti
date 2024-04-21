@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Create Post</h1>
    <form method="POST" action="{{route('posts.store')}}" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" >
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="body" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" id="author" name="author" hidden class="form-control" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group">
            <label for="author">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
            @error('avatar')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    </div>
    
@endsection