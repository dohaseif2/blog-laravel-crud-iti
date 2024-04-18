@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('posts.create')}}" type="submit" class="btn btn-primary" >Create new post</a>
<table class="table">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>content</th>
        <th>author</th>
        <th>Action</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['body']}}</td>
        <td>{{$post->user->name}}</td>
        <td>
             <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="btn btn-success">Update</a>
             <form method="POST" action="{{ route('posts.destroy', ['post' => $post['id']]) }}" style="display: inline-block;">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger">Delete</button>
             </form>
             <a href="{{ route('posts.show', ['post' => $post['id']]) }}" class="btn btn-primary">Show</a>

        </td>
    </tr>
    @endforeach
</ul>
</table>
{{$posts->links()}}
</div>
@endsection