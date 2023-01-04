@extends('admin.layouts.main')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    @section('content')
        <div class="container-fluid px-4">
            <main class="page-content">
                <h1>Chi tiết sản phẩm</h1>
                <div class="container">
                    <section class="wrapper">
                    </section>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">
                                </p>
                                <div class="table-responsive pt-3">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>STT : {{ $productshow->id }} </th>
                                            </tr>
                                            <tr>
                                                <th>Tên sản phẩm : {{ $productshow->name }} </th>
                                            </tr>
                                            <tr>
                                                <th>Giá : {{ number_format($productshow->price) }} VNĐ</th>
                                            </tr>
                                            <tr>
                                                <th>Thể loại : {{ $productshow->category->name }} </th>
                                            </tr>
                                            <tr>
                                                <th>Ảnh sản phẩm : <br><br> <img src="{{ asset('admin/uploads/' . $productshow->image) }}"
                                                        alt="" style="width: 550px"> </th>
                                            </tr>
                                            <tr>
                                                <th>Mô tả :{{ $productshow->description }} </th>
                                            </tr>

                                        </thead>
                                    </table>
                                    <a class="btn btn-primary px-4" href="{{ route('products.index') }}"
                                        class="w3-button w3-red">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
@endsection
</html>
