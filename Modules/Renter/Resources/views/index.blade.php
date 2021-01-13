@extends('renter::layouts.master')

@section('content')
    <div class="review">
        <div class="img-bg">
            <img src="{{ asset('images/bg.png') }}">
        </div>
        <h2>Review khu vực Hà Nội</h2>
        <div class="img-review">
            <ul class="location">
                <li style="position: relative">
                    <a href="{{ route('renter.badinh') }}">
                        <img src="{{ asset('images/badinh.jpg') }}" alt="">
                        <span class="badinh">Quận Ba Đình</span>
                    </a>
                </li>
                <li style="position: relative">
                    <a href="{{ route('renter.caugiay') }}">
                        <img src="{{ asset('images/caugiay.jpg') }}" alt="">
                        <span class="caugiay">Quận cầu giấy</span>
                    </a>
                </li>
                <li style="position: relative">
                    <a href="{{ route('renter.dongda') }}">
                        <img src="{{ asset('images/dongda.jpg') }}" alt="">
                        <span class="dongda">Quận Đống Đa</span>
                    </a>
                </li>
                <li style="position: relative">
                    <a href="{{ route('renter.haibatrung') }}">
                        <img src="{{ asset('images/haibatrung.jpg') }}" alt="">
                        <span class="haibatrung">Quận Hai Bà Trưng</span>
                    </a>
                </li>
            </ul>
            <ul class="location">
                <li style="position: relative">
                    <a href="{{ route('renter.hoankiem') }}">
                        <img src="{{ asset('images/hoankiem.jpg') }}" alt="">
                        <span class="hoankiem">Quận Hoàn Kiếm</span>
                    </a>
                </li>
                <li style="position: relative">
                    <a href="{{ route('renter.hoangmai') }}">
                        <img src="{{ asset('images/hoangmai.jpg') }}" alt="">
                        <span class="hoangmai">Quận Hoàng Mai</span>
                    </a>
                </li>
                <li style="position: relative">
                    <a href="{{ route('renter.longbien') }}">
                        <img src="{{ asset('images/longbien.jpg') }}" alt="">
                        <span class="longbien">Quận Long Biên</span>
                    </a>
                </li>
                <li style="position: relative">
                    <a href="{{ route('renter.namtuliem') }}">
                        <img src="{{ asset('images/namtuliem.jpg') }}" alt="">
                        <span class="namtuliem">Quận Nam Từ Liêm</span>
                    </a>
                </li>
            </ul>
            <ul class="location">
                <li style="position: relative">
                    <a href="{{ route('renter.tayho') }}">
                        <img src="{{ asset('images/tayho.jpg') }}" alt="">
                        <span class="tayho">Quận Tây Hồ</span>
                    </a>
                </li>
                <li style="position: relative">
                    <a href="{{ route('renter.thanhxuan') }}">
                        <img src="{{ asset('images/thanhxuan.jpg') }}" alt="">
                        <span class="thanhxuan">Quận Thanh Xuân</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="product">
        <div class="content">
            <a href="{{ route('renter.list_motel') }}">
                <h2>Xem tất cả</h2>
            </a>
        </div>
        <div class="info-product">
            <ul class="product-items">
                <li class="product-item">
                    <div class="img-product"><img src="{{ asset('images/phongtro1.jpg') }}"></div>
                    <div class="info-detail">
                        <div class="title">
                            <a href="">
                                Cho thuê trung cư giá rẻ
                            </a><br>
                        </div>
                        <div class="location">
                            Ngõ 59/130 Mễ trì, Nam Từ Liêm, Hà Nội
                        </div>
                        <ul class="info-content">
                            <li><i class="fa fa-square" aria-hidden="true" style="font-size: 13px;"></i> 200m2</li>
                            <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 13px;"></i> 1</li>
                            <li><i class="fa fa-bath" style="font-size: 13px;"></i> 1</li>
                        </ul>
                        <div class="price">3 triệu</div>
                        <div class="more">
                            <div class="post-date">Ngày đăng: 4/12/2020</div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true">
                                    <span>
                                        0945156995
                                    </span>
                                </i>
                            </div>  
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="img-product"><img src="{{ asset('images/phongtro1.jpg') }}"></div>
                    <div class="info-detail">
                        <div class="title">
                            <a href="">
                                Cho thuê trung cư giá rẻ
                            </a><br>
                        </div>
                        <div class="location">
                            Ngõ 59/130 Mễ trì, Nam Từ Liêm, Hà Nội
                        </div>
                        <ul class="info-content">
                            <li><i class="fa fa-square" aria-hidden="true" style="font-size: 13px;"></i> 35 m2</li>
                            <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 13px;"></i> 1</li>
                            <li><i class="fa fa-bath" style="font-size: 13px;"></i> 1</li>
                        </ul>
                        <div class="price">3 triệu</div>
                        <div class="more">
                            <div class="post-date">Ngày đăng: 4/12/2020</div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true">
                                    <span>
                                        0945156995
                                    </span>
                                </i>
                            </div>  
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="img-product"><img src="{{ asset('images/phongtro1.jpg') }}"></div>
                    <div class="info-detail">
                        <div class="title">
                            <a href="">
                                Cho thuê trung cư giá rẻ
                            </a><br>
                        </div>
                        <div class="location">
                            Ngõ 59/130 Mễ trì, Nam Từ Liêm, Hà Nội
                        </div>
                        <ul class="info-content">
                            <li><i class="fa fa-square" aria-hidden="true" style="font-size: 13px;"></i> 35 m2</li>
                            <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 13px;"></i> 1</li>
                            <li><i class="fa fa-bath" style="font-size: 13px;"></i> 1</li>
                        </ul>
                        <div class="price">3 triệu</div>
                        <div class="more">
                            <div class="post-date">Ngày đăng: 4/12/2020</div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true">
                                    <span>
                                        0945156995
                                    </span>
                                </i>
                            </div>  
                        </div>
                    </div>
                </li>
                <hr style="width: 88%;margin-bottom: 50px;!important">
            </ul>

            <ul class="product-items">
                <li class="product-item">
                    <div class="img-product"><img src="{{ asset('images/phongtro1.jpg') }}"></div>
                    <div class="info-detail">
                        <div class="title">
                            <a href="">
                                Cho thuê trung cư giá rẻ
                            </a><br>
                        </div>
                        <div class="location">
                            Ngõ 59/130 Mễ trì, Nam Từ Liêm, Hà Nội
                        </div>
                        <ul class="info-content">
                            <li><i class="fa fa-square" aria-hidden="true" style="font-size: 13px;"></i> 35 m2</li>
                            <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 13px;"></i> 1</li>
                            <li><i class="fa fa-bath" style="font-size: 13px;"></i> 1</li>
                        </ul>
                        <div class="price">3 triệu</div>
                        <div class="more">
                            <div class="post-date">Ngày đăng: 4/12/2020</div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true">
                                    <span>
                                        0945156995
                                    </span>
                                </i>
                            </div>  
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="img-product"><img src="{{ asset('images/phongtro1.jpg') }}"></div>
                    <div class="info-detail">
                        <div class="title">
                            <a href="">
                                Cho thuê trung cư giá rẻ
                            </a><br>
                        </div>
                        <div class="location">
                            Ngõ 59/130 Mễ trì, Nam Từ Liêm, Hà Nội
                        </div>
                        <ul class="info-content">
                            <li><i class="fa fa-square" aria-hidden="true" style="font-size: 13px;"></i> 35 m2</li>
                            <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 13px;"></i> 1</li>
                            <li><i class="fa fa-bath" style="font-size: 13px;"></i> 1</li>
                        </ul>
                        <div class="price">3 triệu</div>
                        <div class="more">
                            <div class="post-date">Ngày đăng: 4/12/2020</div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true">
                                    <span>
                                        0945156995
                                    </span>
                                </i>
                            </div>  
                        </div>
                    </div>
                </li>
                <li class="product-item">
                    <div class="img-product"><img src="{{ asset('images/phongtro1.jpg') }}"></div>
                    <div class="info-detail">
                        <div class="title">
                            <a href="">
                                Cho thuê trung cư giá rẻ
                            </a><br>
                        </div>
                        <div class="location">
                            Ngõ 59/130 Mễ trì, Nam Từ Liêm, Hà Nội
                        </div>
                        <ul class="info-content">
                            <li><i class="fa fa-square" aria-hidden="true" style="font-size: 13px;"></i> 35 m2</li>
                            <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 13px;"></i> 1</li>
                            <li><i class="fa fa-bath" style="font-size: 13px;"></i> 1</li>
                        </ul>
                        <div class="price">3 triệu</div>
                        <div class="more">
                            <div class="post-date">Ngày đăng: 4/12/2020</div>
                            <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true">
                                    <span>
                                        0945156995
                                    </span>
                                </i>
                            </div>  
                        </div>
                    </div>
                </li>
                <hr style="width: 88%;margin-bottom: 50px!important;">
            </ul>
        </div>
    </div>

@endsection


@section('script')
<script>
    @if (session()->has('status'))
        toastr.success('{{ session('status') }}')
    @endif
</script>
@endsection