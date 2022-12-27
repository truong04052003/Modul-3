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
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('shop/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/styles/responsive.css') }}">
</head>
<style>
    .container.page {
        margin: 105px 0px 0px 174px;
    }

    .container.page {
        width: 1500px;
        height: 1000px;
        margin: 108px 0px 0px 199px;
    }
</style>

<body>



    {{-- header --}}
    <header class="header trans_300">
        {{-- tiêu đề thanh trường  --}}
        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="">Thanh Trường<span> Shop</span></a>
                        </div>
                        <nav class="navbar">

                            <ul class="navbar_menu">
                                <li><a href="http://localhost/Modul-3/Laravel/Bai5/public/shop/index">Shop</a></li>
                                <li><a href="#">Khuyến mãi</a></li>
                                <li><a href="https://www.facebook.com/tranvntruong">Trang</a></li>
                                <li><a href="https://zalo.me/0343689757">Liên hệ</a></li>
                            </ul>
                            <ul class="navbar_user">
                                <a href="{{ route('cart-index') }}" class="bg-dark text-white ">
                                    <div class="box-cart">
                                        <i class="iconnewglobal-cart"></i>
                                        <span class="cart-number"></span>
                                    </div>
                                    <span>Giỏ hàng</span>
                                </a>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container page">



        <table id="cart" class="table table-hover table-condensed">
            <h3 class="text-center">Giỏ Hàng </h3>
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
                            <td>{{ $details['name'] ?? '' }}</td>
                            {{-- giá --}}
                            @php
                                $total = $details['price'] * $details['quantity'];
                                $totalAll += $total;
                            @endphp
                            @php
                            $totalphi = $details['price']/100
                        @endphp
                           @php
                           $totalAllship = $totalAll + $totalphi;
                       @endphp
                            <td>{{ number_format($details['price']) }} VNĐ</td>

                            <td>
                                {{ $details['quantity'] }}
                            </td>
                            
                            {{-- ảnh --}}
                            <td class="">
                                <div class="product-info">
                                    <img src="{{ asset('admin/uploads/' . $details['image']) }}" alt=""
                                        style="width:120px; height:120px">
                                </div>
                            </td>
                            <td class="actions" data-th="">
                                <button class="update-cart"
                                    data-id="{{ $id }}"style="width:50px; height:50px"><i
                                        class="fa fa-refresh"></i></button>
                                <button class="remove-from-cart"
                                    data-id="{{ $id }}"style="width:50px; height:50px"><i
                                        class="fa fa-trash-o"></i></button>
                            </td>

                        </tr>
                    @endforeach
                @endif
                <td colspan="2" class="hidden-xs">Tổng tiền hàng :</td>
                <td class="hidden-xs text-center"><strong> {{ number_format($totalAll) }} VNĐ</strong></td>
                
            </tbody>
            <td colspan="2" class="hidden-xs">Tổng tiền phí vận chuyển :</td>
            <td class="hidden-xs text-center"><strong> {{ number_format($totalphi) }} VNĐ</strong></td>
          
            <tfoot>
                <td colspan="2" class="hidden-xs">Tổng :</td>
                <td class="hidden-xs text-center"><strong> {{ number_format($totalAllship) }} VNĐ</strong></td>
                <tr>
                    <td><a href="{{ route('shop.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                            Continue Shopping</a> <br><br>
                        <a href="{{ route('shop.checkOuts') }}" class="btn btn-primary"><i
                                class="fa fa-angle-right"></i>
                            Thanh Toán</a>
                    </td>

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





{{-- hoa 4 góc 
<img style="position:fixed;z-index:99999;top:0;left:0" src="https://lh3.googleusercontent.com/Nm43LAO21g0ua9Muu0BUELDCkQfCm4sOKIPlXTM3jScFEuuR2q89H4CBKx7bkbzyAvXA-MPb6bFlPXyRGnep6Y3IsBR171nGx3tkB2SD9zyw3qXlxj8iv7SHoP1t0YK-wSmIcg=w141-h143-no"/>
<img style="position:fixed;z-index:99999;top:0;right:0" src="https://lh3.googleusercontent.com/yfLzqRzZL5T5i20FJbhfXEjDjkUT3PshER0urEBiAq1Euy4NTMZBKnMsH8ni-R7ffM8a_mgua5IjbGnp4DWUXQDI_-mNaDfAkgcyFlNNa5u0kRqjaBtW077U47CWsJgNfhhk-g=w141-h143-no"/>
<img style="position:fixed;z-index:99999;bottom:0px;left:0px" src="https://lh3.googleusercontent.com/2U90SIgXGe2W0O2NPluq66u-98JcgCpKBmRvWDcniKdybBTjqIjB0Noq0UsRdG2oOTZlvVh26T1mU9e1nY8lTuOFrSru_saC4J6K6refpHTSJiCb_SykRe2i7MbHgj8q5ESMzg=w200-h159-no"/>
<img style="position:fixed;z-index:9999;bottom:0px;right:0px" src="https://lh3.googleusercontent.com/XH0FHlEyLBF5hzcgkDvSjKlInwSYZ5TUoBruIJoRNnXtezP4kCdi0S7_dwXhee-AbfoWL4g9osBMG32sG7u9Tc30NPOP61GpytphyxoFcZgknHoRm54BprHHO0Umd2q8PpV5Lw=w162-h167-no"/>
 --}}
