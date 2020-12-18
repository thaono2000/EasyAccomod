<div class="navbar">
    <div class="logo-header">
        <a href="" class="logo">
            <img src="{{ asset('images/logo.png') }}">
        </a>
    </div>
    <div class="menu-header">
        <ul class="menu-navbar row">
            <li><a href="{{ route('renter.form_login') }}" class="text-sm">Đăng nhập</a></li>
            <li>
                <a href="{{ route('register') }}" class="text-sm">Đăng kí</a>
            </li>
            <li><a href=""><i class="fa fa-heart-o" aria-hidden="true" style="font-size: 1.2rem;line-height: 30px;"></i></a></li>
            <li><a href=""><i class="fa fa-bell-o" style="font-size: 1.2rem;line-height: 30px;"></i></a></li>
            <li><a class="text-sm" href=""><button class="btn">Đăng tin</button></a></li>
        </ul>
    </div>
</div>