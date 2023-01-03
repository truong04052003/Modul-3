<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container page">
        <table id="cart" class="table table-hover table-condensed">
            <h1 class="text-center" >Giỏ Hàng </h1>
            <thead>
                <tr>
                    <th style="width:50%">Ảnh</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Tổng tiền</th>
                    <th style="width:10%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <?php $total += $details['price'] * $details['quantity'];
                            session()->put('totalprice', $total);
                         ?>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img
                                            src="{{ asset('admin/uploads/'. $details['image']) }}" width="100"
                                            height="100" class="img-responsive" /></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ number_format($details['price']) }} VNĐ</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}"
                                    class="form-control quantity" />
                            </td>
                            <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity']) }} VNĐ
                            </td>
                            <td class="actions" data-th="">
                                <button class="update-cart" data-id="{{ $id }}"><i
                                        class="fa fa-refresh"></i></button>
                                <button class="remove-from-cart" data-id="{{ $id }}"><i
                                        class="fa fa-trash-o"></i></button>
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="{{ route('shop.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                            Quay lại shop</a>
                            <a href="{{ route('shop.checkOuts') }}" class="btn btn-primary"><i
                                class="fa fa-angle-right"></i>
                            Thanh Toán</a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Tổng : {{ number_format($total) }} VNĐ</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script type="text/javascript">
        $(".update-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
</body>

</html>