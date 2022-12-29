<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh mục sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <div class="container-fluid px-4">
        <form action="{{ route('books.store') }}" method="post">
            @csrf
            <div>
                <h1>Thêm sách </h1>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên sách</label>
                <input type="text" class="form-control" name="tensach">
                @error('tensach')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mã sách</label>
                <input type="text" class="form-control" name="code">
                @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><br>

            <div class="mb-3">
                <select name="tacgia" class="form-control">
                    <option name="tacgia">Chọn tác giả</option>
                    <option name="tacgia">Lâm Hoàng Trúc</option>
                    <option name="tacgia">Lê Vũ Kiến Duy</option>
                    <option name="tacgia">Comicola Studio</option>
                    <option name="tacgia">Nguyễn Huỳnh Bảo Châu</option>
                </select>
                @error('tacgia')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><br>


            <div class="mb-3">
                <label class="form-label">Thể loại</label>
                <input type="text" class="form-control" name="theloai">
                @error('theloai')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Số trang</label>
                <input type="text" class="form-control" name="sotrang">
                @error('sotrang')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Năm sản xuất</label>
                <input type="text" class="form-control" name="namsanxuat">
                @error('namsanxuat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger btn-xs" href="{{ route('books.index') }}">Back</a>
        </form>


    </div>
</body>

</html>
