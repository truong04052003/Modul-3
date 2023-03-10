<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh mục sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .d-flex.justify-content-around {
    margin: 0px 0px 0px 1300px;
}
</style>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <div class="container-fluid px-4">
        <h1>Danh Mục Sách</h1><br>
        {{-- Tìm kiếm --}}
        <div class="col-6">
            <form class="form-inline" action="">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <input name="key" class="form-control"placeholder="Chưa tìm được">
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-default bg-info">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div> <br>
        <hr>
        <table class="table">

            <a href="{{ route('books.create') }}" class="btn btn-primary">Thêm sách</a>
            <a href="{{ route('books.excel') }}" class="btn btn-danger">Xuất file</a><br><br>
            <thead>

                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Mã sách</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Số trang</th>
                    <th scope="col">Năm sản xuất</th>
                    <th scope="col" class="text-right">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item['tensach'] }}</td>
                        <td>{{ $item['code'] }}</td>
                        <td>{{ $item['tacgia'] }}</td>  
                        <td>{{ $item['theloai'] }}</td>
                        <td>{{ $item['sotrang'] }}</td>
                        <td>{{ $item['namsanxuat'] }}</td>

                        <td class="text-right">
                            <form action="{{ route('books.destroy', [$item->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('books.edit', [$item->id]) }}" class="btn btn-success">Edit</a>
                                <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                    class="btn btn-danger">Delete</button>               
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
