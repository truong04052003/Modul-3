
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
<div class="container-fluid px-4">
    <form action="{{route('admin.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
    
        <div class="mb-3">
            <label  class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{old('price')}}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
