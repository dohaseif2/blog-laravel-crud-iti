@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>edit post number {{$comment['id']}}</h1>
    <form method="POST" action="{{ route('comments.update', ['comment' => $comment['id']]) }}" enctype='multipart/form-data'>
        @method('PATCH')
        @csrf
        
        <div class="form-group">
            <label for="body">Content:</label>
            <textarea id="body" name="body" class="form-control" >{{$comment['body']}}</textarea>
            @error('body')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div><br>
        
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>

@endsection