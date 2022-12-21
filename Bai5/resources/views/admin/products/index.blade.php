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

    {{-- Tìm kiếm --}}
    <div class="col-6">
      <form class="navbar-form navbar-left" action="{{route('products.search')}}">
        @csrf
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-default">Tìm kiếm</button>
          </div>
        </div>
      </form>
    </div> <br>

    <table class="table">
      <a href="{{route('products.create')}}" class="btn btn-primary">Thêm sản phẩm</a>
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Giá</th>
          <th scope="col">Thể loại</th>
          <th scope="col">Ảnh</th>
          <th scope="col" class="text-right">Hành động</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $key => $item)
        <tr>
          <th scope="row">{{++$key}}</th>
          <td>{{$item['name']}}</td>
          <td>{{$item['price']}}</td>
          <td>{{$item->category->name}}</td>
          <td>
            <img src="{{ asset('admin/uploads/'. $item->image) }}" alt="" style="width: 180px">
          </td>

          <td class="text-right">
            <form action="{{route('products.destroy',[$item->id])}}" method="post">
              @method('DELETE')
              @csrf
              <a href="{{route('products.edit',[$item->id])}}" class="btn btn-success">Edit</a>
              <button onclick="return confirm('Bạn có chắc chắn xóa không?');" class="btn btn-danger">Delete</button>
              <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-6">
      <div class=" d-flex justify-content-around">
        {{ $items->appends(request()->input())->links() }}
      </div>
    </div>
  </div>
</body>

</html>


@endsection