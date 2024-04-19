@extends('layouts.app')
@section('content')
<body>
    <ul>
        <li>{{$comment->id}}</li>
        <li>{{$comment->body}}</li>
        <li>{{$comment->user->name}}</li>
    </ul>

       
    <a href="{{route('posts.index')}}" class="btn btn-dark">Redirect to home page</a>
@endsection