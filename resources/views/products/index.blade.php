<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaraCRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
         
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link text-light" href="#">Products</a>
            </div>
          </div>
        </div>
      </nav>


<div class="container mt-5">
  <h2>Bordered Table</h2>
        <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>            
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Name</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($products as $product)
            <tr>
              <td>{{$loop->index}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td><img src="products/{{$product->image}}" alt="" class="rounded-circle" width="50" height="50"></td>
              <td><a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a> | 
                <form action="products/{{$product->id}}/delete" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
</div>



      <div class="container mt-2">
        <div class="text-right">
            <a href="products/create" class="btn btn-dark ">New Product</a>
        </div>
      </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>