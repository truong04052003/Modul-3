<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chi tiết </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/styles/bootstrap4/bootstrap.min.css') }}">

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
    img {
        margin: 12px 15px 50px 171px;
    }

    a {
        margin: 0px 5px 0px 0px;
    }

    .super_container {
        margin: 190px 0px 0px -37px;
    }

    .product_image img {
        width: 80%;
    }
    img {
    border: 3px outset #ff0000;
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
                                <a href="" class="bg-dark text-white ">
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




    {{-- show  --}}
    <div class="super_container">

        <header class="header trans_300">

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="#">Thanh Trường<span> Shop</span></a>
                            </div>
                            <nav class="navbar">


                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div class="fs_menu_overlay"></div>
        <div class="container single_product_container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <div class="product_image">
                                    <img src="{{ asset('admin/uploads/' . $product->image) }}" alt=""
                                        width="300px" height="300px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>{{ $product->name }}</h2><br>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                        </div>
                        <div class="product_price"> Giá : {{ number_format($product->price) }} VNĐ</div> <br>

                        <div>
                            <a href="{{ route('shop.index') }}" class="btn btn-primary">Quay lại </a>
                            <a href="{{ route('add-to-cart', $product->id) }}"class="btn btn-danger">Thêm vào giỏ
                                hàng</a>
                        </div><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- @endsection --}}







	
    <script src="{{ asset('shop/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('shop/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('shop/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('shop/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('shop/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('shop/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('shop/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('shop/js/single_custom.js') }}"></script>
</body>

</html>
