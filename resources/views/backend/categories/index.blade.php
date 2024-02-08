<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
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
      <th scope="col">Kategori Adı</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <a href=" {{route('categories.create')}} "><button class="btn btn-primary"> Create</button></a>
   

  @if(session('success'))
    
    <div class="alert alert-success mt-2" role="alert">
    {{session('success')}}
</div>
@endif
  
  @foreach ($categories as $category)

  <tr>

      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->created_at}}</td>
      <td>


      <a href="{{ route('categories.edit', $category->id) }}"><i class="bi bi-pencil-square" ></i></a>
      <a href="{{ route('categories.show', $category->id) }}"><i class="bi bi-eye" style="color:gold;"></i></a>
 


      <a href="" data-toggle="modal" data-target="#exampleModal{{$category->id}}">  <i class="bi bi-trash3 " style="color:crimson;" ></i> </a>

   


      </td>
    </tr>




    <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you want to delete record {{$category->id}} ?
      </div>
      <div class="modal-footer">
      <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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