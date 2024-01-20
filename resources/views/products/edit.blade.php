<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<body>

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{"Data inserted successfully!!"}}</strong>
</div>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-5">
                <h3>Product Edit: {{$product->name}}</h3>
            <form action="update" files=true method="POST" class="m-3" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"
                    value="{{old('name', $product->name)}}"
                    >
                    @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" class="form-control" cols="30" rows="10" value="{{old('decription', $product->description)}}"></textarea>
                    @if($errors->has('description'))
                        <span class="text-danger">{{$errors->first('description')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image</label>
                   <input type="file" name="image" class="form-control" value="{{old('image')}}">
                   @if($errors->has('image'))
                        <span class="text-danger">{{$errors->first('image')}}</span>
                   @endif
                </div>
                <button type="submit" class="btn btn-dark m-2">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>