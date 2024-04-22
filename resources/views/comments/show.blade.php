@extends('layouts.app')
@section('content')
<body>
    <ul>
        <li>{{$comment->id}}</li>
        <li>{{$comment->body}}</li>
        <li>{{$comment->user->name}}</li>
    </ul>

       
    <a href="{{route('posts.show',['post'=>$comment->post_id])}}" class="btn btn-dark">Redirect to post</a>
@endsection