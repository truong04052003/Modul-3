{{-- @extends('admin.layouts.main') --}}
{{-- @section('content') --}}
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

</body>

</html>
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Giỏ hàng</h1>
                    <ol class="breadcrumb">
                        <li class="active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="page-wrapper">
    <div class="cart shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="product-list">

                            <form method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col" class="text-right">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                            $totalAll = 0;
                                        @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $id => $details)
                                                <tr class="">
                                                    {{-- stt --}}
                                                    <td>{{ ++$id }} </td>
                                                    {{-- name --}}
                                                    <td>{{ $details['name'] }}</a> </td>
                                                    {{-- giá --}}
                                                    @php
                                                        $total = $details['price'] * $details['quantity'];
                                                        $totalAll += $total;
                                                    @endphp
                                                    <td>{{ number_format($details['price']) }}.vnd</td>
                                                   
                                                    <td> {{$details['quantity']}}
                                                        <div class="choosenumber"fragment="136ae0d40e4"></div>
                                                        <div class="minus" style="pointer-events: none;">
                                                        <i style="background-color: rgb(204, 204, 204);"></i></div>
                                                        <input type="text" maxlength="3"class="number"style="border: none; pointer-events: all;">
                                                        <div class="plus"style="pointer-events: all;">
                                                        <i style="background-color: rgb(40, 138, 214);"></i>
                                                        <i style="background-color: rgb(40, 138, 214);"></i>    
                                                    </td>
                                                    {{-- ảnh --}}
                                                    <td class="">
                                                        <div class="product-info">
                                                            <img src="{{ asset('admin/uploads/' . $details['image']) }}"
                                                                alt="" style="width:90px; height:90px">
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <a data-href="{{ route('remove.from.cart', $id) }}"
                                                            class="btn btn-danger btn-sm fa fa-window-close"
                                                            id="{{ $id }}">Xóa</a>
                                                    </td>
                                                  
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>
                                                    Giỏ hàng của bạn chưa có sản phẩm nào?
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                @if (session('cart'))
                                    <a href="{{ route('checkOuts') }}" class="btn btn-main pull-right text-danger">Mua hàng</a>
                                @endif 
                              <br>  <a href="{{route('shop.index')}}">Quay lại trang chủ</a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @endsection --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".changeQuantity").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var quantity = $(this).parents("tr").find("input.quantity").val();
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity,
                },
                success: function(response) {
                    // window.location.reload();
                    $('.total_cart-' + id).html(response.totalCart);
                    $('.TotalAllAjaxCall').html(response.TotalAllRefreshAjax);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });
        $(document).on('click', '.fa-window-close', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            window.location.reload();
            $.ajax({
                url: href,
                method: 'delete',
                data: {
                    _token: csrf
                },
                success: function(response) {
                    $('.item-' + id).remove();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });
    });
    $('.btn-plus, .btn-minus').on('click', function(e) {
        const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
        const input = $(e.target).closest('.input-group').find('input');
        if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
        }
    })
</script>
