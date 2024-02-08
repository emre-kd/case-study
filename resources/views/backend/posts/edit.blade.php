<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>
<body>

<div class="container">

@if ($errors->any())
     @foreach ($errors->all() as $error)

         <div class="alert alert-danger" role="alert">
         {{$error}}
</div>

     @endforeach
 @endif
<form method="POST" action="{{ route('posts.update', $post->id) }}">
@csrf
        @method('PUT')
  <div class="form-row"> 
  <div class="form-group mt-5 col">
    <label for="exampleInputEmail1">Post Title</label>
    <input name="title" value="{{$post->title}}" type="text" class="form-control" id="title" aria-describedby="title" placeholder="Post Title">
  
  
  </div>

  <div class="form-group mt-5 col">
  <label for="category">Category Name</label>
    <select class="form-control" id="category" name="category">
      
    @foreach ($categories as $category)
    <option value="{{$category->id}}"  @if($post->category == $category->id) selected @endif >{{$category->name}}</option>
    @endforeach

    </select>
  
  </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Post Text</label>
    <textarea class="form-control"  id="text" name="text" rows="3">{{$post->text}}</textarea>
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>


</form>
<a href="{{route('posts.index')}}"><button class="btn btn-primary mt-5">Go Back</button></a>

</div>
    
</body>
</html>