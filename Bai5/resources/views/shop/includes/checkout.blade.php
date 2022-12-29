<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
    .container.pt-4 {
        border: 1px solid black;
        width: 700px;
        height: 630px;
        margin: 117px 0px 0px 396px;
        border-bottom: solid;
    }

    h3 {
        margin: 114px 0px -104px 394px;
        color: blue;
    }
</style>

<body>

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
                                <a href="{{ route('shop.index') }}" class="bg-dark text-white ">
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

    <h3>Thông tin khách hàng</h3>

    <div class="container pt-4">
        <div class="container-fluid px-4">

            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Họ</label>
                        <input type="text" class="form-control" placeholder="Họ">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Tên</label>
                        <input type="text" class="form-control" placeholder="Tên của bạn">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Số Điện Thoại</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Email</label>
                        <input type="email" class="form-control">
                    </div> <br>
                    <div class="form-group col-md-4">
                        <label for="inputState">Mã Voucher</label>
                        <select id="inputState" class="form-control">
                            <option value="25%">Chọn Voucher</option>
                            <option>Đơn hàng từ 200k - Tối đa 25k ( Sắp hết hạn : Còn 12 giờ)</option>
                            <option>Giảm 50%</option>
                            <option>Giảm 10%</option>
                        </select> <br>
                    </div>

                    <select class="form-control">
                        <option>Giới tính</option>
                        <option>Nam</option>
                        <option>Nữ</option>
                    </select> 
                    <br><br><br>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Đồng ý với điều khoản Shop Thanh Trường
                            </label>
                        </div>

                    </div>

                </div>
                <a href="">
                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </a>
                <br><br>
                <td>
                    <a href="{{ route('shop.index') }}" class="btn btn-warning"><i></i> Quay lại giỏ hàng</a>
                </td>
            </form>

        </div>
    </div>

</body>

</html>






{{-- hoa 4 góc 
<img style="position:fixed;z-index:99999;top:0;left:0" src="https://lh3.googleusercontent.com/Nm43LAO21g0ua9Muu0BUELDCkQfCm4sOKIPlXTM3jScFEuuR2q89H4CBKx7bkbzyAvXA-MPb6bFlPXyRGnep6Y3IsBR171nGx3tkB2SD9zyw3qXlxj8iv7SHoP1t0YK-wSmIcg=w141-h143-no"/>
<img style="position:fixed;z-index:99999;top:0;right:0" src="https://lh3.googleusercontent.com/yfLzqRzZL5T5i20FJbhfXEjDjkUT3PshER0urEBiAq1Euy4NTMZBKnMsH8ni-R7ffM8a_mgua5IjbGnp4DWUXQDI_-mNaDfAkgcyFlNNa5u0kRqjaBtW077U47CWsJgNfhhk-g=w141-h143-no"/>
<img style="position:fixed;z-index:99999;bottom:0px;left:0px" src="https://lh3.googleusercontent.com/2U90SIgXGe2W0O2NPluq66u-98JcgCpKBmRvWDcniKdybBTjqIjB0Noq0UsRdG2oOTZlvVh26T1mU9e1nY8lTuOFrSru_saC4J6K6refpHTSJiCb_SykRe2i7MbHgj8q5ESMzg=w200-h159-no"/>
<img style="position:fixed;z-index:9999;bottom:0px;right:0px" src="https://lh3.googleusercontent.com/XH0FHlEyLBF5hzcgkDvSjKlInwSYZ5TUoBruIJoRNnXtezP4kCdi0S7_dwXhee-AbfoWL4g9osBMG32sG7u9Tc30NPOP61GpytphyxoFcZgknHoRm54BprHHO0Umd2q8PpV5Lw=w162-h167-no"/>
 --}}
