<div class="navbar">
    <div class="logo-header">
        <a href="" class="logo">
            <img src="{{ asset('images/logo.png') }}">
        </a>
    </div>
    <div class="menu-header">
        <ul class="menu-navbar row">
            <li><a href=""><i class="fa fa-heart-o" aria-hidden="true" style="font-size: 1.2rem;line-height: 30px;"></i></a></li>
            <li><a href=""><i class="fa fa-bell-o" style="font-size: 1.2rem;line-height: 30px;"></i></a></li>
            <li class="dropdown">
                <i class="fa fa-user-circle" id="dropbtn" aria-hidden="true" style="font-size: 1.2rem;line-height: 30px;"></i>
                <div class="dropdown-content">
                    <a href="#">Thông tin cá nhân</a>
                    <a href="{{ route('renter.logout') }}">Đăng xuất</a>
                </div>
            </li>
            <li><a class="text-sm" href=""><button class="btn">Đăng tin</button></a></li>
        </ul>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

