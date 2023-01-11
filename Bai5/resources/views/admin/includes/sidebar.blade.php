<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{route('trangchu')}}">
        <i class="bi bi-grid"></i>
        <span>Trang tổng quan</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('products.index')}}">
        <i class="bi bi-journal-text"></i><span>Quản lý sản phẩm</span><i></i>
      </a>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('categories.index')}}">
        <i class="bi bi-menu-button-wide"></i><span>Quản lý thể loại</span><i></i>
      </a>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('orders.index')}}">
        <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý đơn hàng</span><i></i>
      </a>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('product_codes.index')}}">
        <i class="bi bi-bar-chart"></i><span>Quản lý mã sản phẩm</span><i></i>
      </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('group.index')}}">
          <i class="bi bi-bar-chart"></i><span>Quản lý nhóm quyền</span><i></i>
        </a>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gem"></i><span>Thông tin liên hệ</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="icons-nav" class="nav-content collapse" >
        <li>
          <a href="tel:08880902222" title="Gọi ngay">
            <i class="bi bi-circle"></i><span>Holine : 0343689757</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="bi bi-circle"></i><span>Email : tranvantruong10b2@gmail.com</span>
          </a>
        </li>
        <li>
          <a href="https://www.google.com/maps/place/S%C3%A1o+Tr%C3%BAc+Thanh+Tr%C6%B0%E1%BB%9Dng/@16.9458654,107.0786152,17z/data=!3m1!4b1!4m5!3m4!1s0x3140c3abc27a0cad:0xaecafd0ec224fd81!8m2!3d16.9458603!4d107.0808039?hl=vi">
            <i class="bi bi-circle"></i><span>Địa chỉ : Sáo Trúc Thanh Trường</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="https://zalo.me/0343689757">
        <i class="bi bi-person"></i>
        <span>Zalo</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="http://localhost/Modul-3/Laravel/Bai5/public/products/garbagecan">
        <i class="bi bi-question-circle"></i>
        <span>Thùng Rác</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-register.html">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li>
    

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i class="bi bi-dash-circle"></i>
        <span>Error 404</span>
      </a>
    </li><!-- End Error 404 Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('logout')}}">
        <i class="bi bi-file-earmark"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Blank Page Nav -->

  </ul>

</aside><!-- End Sidebar-->
<style>
  span {
    color: black;
}
</style>



