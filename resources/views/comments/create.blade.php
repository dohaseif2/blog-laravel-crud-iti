@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Comment</h1>
    <form method="POST" action="{{route('comments.store')}}" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="content">Comment:</label>
            <textarea id="content" name="body" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group">
            <input type="hidden" name="post_id" value="{{$post}}">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    </div>
@endsection