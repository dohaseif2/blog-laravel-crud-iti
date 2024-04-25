@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('posts.create')}}" type="submit" class="btn btn-primary" >Create new post</a>
<div class="row">
        <div class="col">
           <p class="fs-4">
           Number of posts: {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}

           </p>
           
        </div>
    </div>
    <table class="table">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>content</th>
        <th>author</th>
        <th>avatar</th>
        <th>slug</th>
        <th colspan="3">Action</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['body']}}</td>
        <td>{{$post->user->name}}</td>
        <td><img width="50px"  src="{{ asset('uploads/posts/'. $post->avatar) }}"></img></td>
        <td>{{$post['slug']}}</td>
        <td>
             <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="btn btn-success">Update</a>
        </td> 
        <td>
             <form method="POST" action="{{ route('posts.destroy', ['post' => $post['id']]) }}" style="display: inline-block;">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger">Delete</button>
             </form>
        </td>
        <td>
             <a href="{{ route('posts.show', ['post' => $post['id']]) }}" class="btn btn-primary">Show</a>
        </td>
        <td>
             <a href="{{route('comments.create',['post'=>$post['id']])}}" type="submit" class="btn btn-dark" >Comment</a>

        </td>
    </tr>
    @endforeach

</table>
{{$posts->links()}}

</div>


@endsection