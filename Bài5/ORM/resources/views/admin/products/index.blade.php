@extends('admin.layouts.main')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <div class="container-fluid px-4">
@section('content')

    <table class="table">
        <a href="{{route('products.create')}}" class="btn btn-danger">Thêm sản phẩm</a>
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">category_id</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item['name']}}</td>
            <td>{{$item['price']}}</td>
            <td>{{$item['category_id']}}</td>
            <td>{{$item['created_at']}}</td>
            <td>{{$item['updated_at']}}</td>
            <td>
              <a href="{{route('products.edit',[$item->id])}}" class="btn btn-danger">Edit</a>
              <a href="" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>


@endsection
