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
    <a href="{{route('posts.index')}}" class="btn btn-dark">Redirect to home page</a>
@endsection