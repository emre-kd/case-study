<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
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

<form method="POST" action="{{route('categories.store')}}">
  @csrf
  <div class="form-group mt-5">
    <label for="exampleInputEmail1">Category Name</label>
    <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Category Name">
  
  
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="{{route('categories.index')}}" ><button class="btn btn-primary mt-5">Go Back</button></a>

</div>
    
</body>
</html>