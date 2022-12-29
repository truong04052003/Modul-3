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
                            <li><a href="https://www.facebook.com/tranvntruong">Trang</a></li>
                            <li><a href="https://zalo.me/0343689757">Liên hệ</a></li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">

                                        <a class="dropdown-item" href="{{ route('logout') }}">Đăng Xuất</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar_user">
                            <a href="{{ route('show.cart') }}" class="bg-dark text-white ">
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
