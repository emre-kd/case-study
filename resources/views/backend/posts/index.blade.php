<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<div class="container"> 

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Post Title</th>
      <th scope="col">Post Category</th>
      <th scope="col">Post Text</th>

      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <a href=" {{route('posts.create')}} "><button class="btn btn-primary"> Create</button></a>
   

  @if(session('success'))
    
    <div class="alert alert-success mt-2" role="alert">
    {{session('success')}}
</div>
@endif
  
  @foreach ($posts as $post)

  <tr>

      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>
        
      @foreach ($categories as $category)
      @if ($category->id == $post->category) 


        {{$category->name}}

      @endif
      @endforeach
      </td>
      <td>

      {{ Str::limit($post->text, 200) }}

      </td>

      <td>{{$post->created_at}}</td>
      <td>


      <a href="{{ route('posts.edit', $post->id) }}"><i class="bi bi-pencil-square" ></i></a>
      <a href="{{ route('posts.show', $post->id) }}"><i class="bi bi-eye" style="color:gold;"></i></a>
 


      <a href="" data-toggle="modal" data-target="#exampleModal{{$post->id}}">  <i class="bi bi-trash3 " style="color:crimson;" ></i> </a>

   

   


      </td>
    </tr>




    <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you want to delete record {{$post->id}} ?
      </div>
      <div class="modal-footer">
      <form action="{{ route('posts.destroy', $post->id) }}" method="post">
      @csrf
                      @method('DELETE')
        <button type="submit" class="btn btn-danger" >Delete</button>
</form>
      </div>
    </div>
  </div>
</div>

    @endforeach

    </tr>
  </tbody>
</table>


<a href="/home"><button class="btn btn-primary">Go Back</button></a>

</div>
</body>
</html>