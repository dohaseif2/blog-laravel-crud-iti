@extends('layouts.app')
@section('content')
<body>
    <ul>
        <li>{{$post->id}}</li>
        <li>{{$post->title}}</li>
        <li>{{$post->body}}</li>
        <li>{{$post->user->name}}</li>
        <li><img width="50" src="{{asset('uploads/posts/'.$post->avatar)}}"></li>
    </ul>
    @if($comments->isNotEmpty())
    <h3> Comments ( {{ $comments->count() }} {{ Str::plural('comment', $comments->count()) }} ) </h3>
    <div class="w-50">
    <table class="table">
    <tr>
        <th></th>
        <th></th>
    </tr>
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment->user->name}} : {{$comment->body}}</td>
            <td><form method="POST" action="{{ route('comments.destroy', ['comment' => $comment['id']]) }}" style="display: inline-block;">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger">Delete</button>
             </form>
             
             <a href="{{ route('comments.edit', ['comment' => $comment['id']]) }}" class="btn btn-success">Update</a>
             <a href="{{ route('comments.show', ['comment' => $comment['id']]) }}" class="btn btn-primary">Show</a>
             </td>
             </tr>
        @endforeach
        </table>
        </div>
    @endif
    <a href="{{route('posts.index')}}" class="btn btn-dark">Redirect to home page</a>
@endsection