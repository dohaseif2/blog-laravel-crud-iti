
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Posts</title>
</head>
<body>

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
        <td>{{$post['content']}}</td>
        <td>{{$post['author']}}</td>
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
</div>
</body>
</html>