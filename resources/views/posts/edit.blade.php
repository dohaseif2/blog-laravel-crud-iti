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
    <h1>edit post number {{$post['id']}}</h1>
    <form method="POST" action="{{ route('posts.update', ['post' => $post['id']]) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" class="form-control" value="{{$post['id']}}" disable>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{$post['title']}}">
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" class="form-control" >{{$post['content']}}</textarea>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" class="form-control" value="{{$post['author']}}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>

</body>
</html>