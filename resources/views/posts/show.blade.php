<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Posts</title>
</head>
<body>
    <ul>
        <li>{{$post->id}}</li>
        <li>{{$post->title}}</li>
        <li>{{$post->body}}</li>
    </ul>
    <a href="{{route('posts.index')}}" class="btn btn-dark">Redirect to home page</a>

</body>
</html>