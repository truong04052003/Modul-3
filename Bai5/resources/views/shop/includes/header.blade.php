

	<header class="header trans_300">
{{-- tiêu đề thanh trường  --}}
<div class="main_nav_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">
                <div class="logo_container">
                    <a href="{{asset('shop/images/image.png')}}">Thanh Trường<span> Shop</span></a>
                </div>
                <nav class="navbar">
                    
                    <ul class="navbar_menu">
                        <li><a href="http://localhost/Modul-3/Laravel/Bai5/public/shop/index">Shop</a></li>
                        <li><a href="#">Khuyến mãi</a></li>
                        <li><a href="#">Trang</a></li>
                        <li><a href="contact.html">Liên hệ</a></li>
                    </ul>
                    <ul class="navbar_user">
                        <li><a href="#"><i  aria-hidden="true"></i></a></li>
                        <li><a href="#"><i  aria-hidden="true"></i></a></li>
                        <li class="checkout" href="" >
                            <a href="{{asset('shop/includes/cart')}}" class="bg-info text-white">
                                <div class="box-cart">
                                    <i class="iconnewglobal-cart"></i>
                                    <span class="cart-number"></span>
                                </div>
                                <span>Giỏ hàng</span>
                            </a>
                               
                        </li>
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
