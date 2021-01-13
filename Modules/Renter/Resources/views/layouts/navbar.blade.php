<div class="navbar">
    <div class="logo-header">
        <a href="{{ route('renter.index') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}">
        </a>
    </div>
    <div class="menu-header">
        <ul class="menu-navbar row">
            <li><a href="{{ route('renter.like_list') }}"><i class="fa fa-heart-o" aria-hidden="true" style="font-size: 1.2rem;line-height: 30px;"></i></a></li>
            <li><a href=""><i class="fa fa-bell-o" style="font-size: 1.2rem;line-height: 30px;"></i></a></li>
            <li class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none;outline: none;border: none;">
                    <i class="fa fa-user-circle" id="dropbtn" aria-hidden="true" style="font-size: 1.2rem;line-height: 30px;"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="{{route('renter.form_information')}}" class="dropdown-item">Thông tin cá nhân</a>
                    <a href="{{ route('renter.logout') }}" class="dropdown-item">Đăng xuất</a>
                </div>
            </li>
            <li><a class="text-sm" href=""><button class="btn">Đăng tin</button></a></li>
        </ul>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
