@extends('admin.layouts.main')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mã sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <div class="container-fluid px-4">
        @section('content')
            <form action="{{ route('product_codes.store') }}" method="post">
                @csrf
                <div>
                    <h1>Thêm mã sản phẩm</h1>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mã sản phẩm</label>
                    <input type="text" class="form-control" name="code" aria-describedby="emailHelp">
                    @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label class="form-label">Sản phẩm</label>
                    <select class="form-select" name="product_id">
                        <?php foreach ($items as $product) : ?>
                        <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                        <?php endforeach; ?>
                    </select> <br>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger btn-xs" href="{{ route('product_codes.index') }}">Back</a>
            </form>

        </div>
    </body>

    </html>
@endsection
