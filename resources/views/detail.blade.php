@extends('layouts.master')

@section('content')
    <hr style="margin-top: 0;margin-bottom: 25px;width: 100%">
    <div class="mg-page-content">
        <div id="main">
            <div class="content"><h1>Thông tin chi tiết nhà trọ</h1></div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 20px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://localhost:8000/storage/images/{{$motel->images['0']->image}}" style="width: 83%">
                        </div>
                        @foreach ($motel->images as $images)
                            @if($images->image != $motel->images['0']->image)
                                <div class="carousel-item">
                                    <img src="http://localhost:8000/storage/images/{{$images->image}}" style="width: 83%">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="margin-right: 120px;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                  </div>
                
                <div class="detail-motel">
                    <div class="title">
                        <h4 style="margin-top: 20px">{{ $motel->title }}</h4> 
                    </div>
                    <div class="location" style="margin-top: -5px;color: #5a646e">
                        {{ $motel->location }}
                    </div>
                    <div class="price" style="color: #009177; font-size: 32px;margin-top: 5px;font-weight: 400;">
                        {{ $motel->price }} triệu
                    </div>
                    <div style="font-size: 24px;font-weight: 700;line-height: 30px;margin-top: 20px">
                        Thông tin chính
                    </div>
                    <div style="display:flex">
                        <ul style="margin-top: 30px;">
                            <li style=><span style="min-width: 130px;color: #919ba5;display: inline-block;">Giá:</span> {{ $motel->price }} triệu</li>
                            <li style=><span style="min-width: 130px;color: #919ba5;display: inline-block;margin-top: 10px;">Diện tích:</span> {{ $motel->acreage }} m2</li>
                            <li style=><span style="min-width: 130px;color: #919ba5;display: inline-block;margin-top: 10px;">Trạng thái:</span> {{ $motel->extend }}</li>
                            <li style=><span style="min-width: 130px;color: #919ba5;display: inline-block;margin-top: 10px;">Ngày đăng:</span> {{ $motel->created_at->format('d-m-Y') }}</li>
                        </ul>
                        <ul style="margin-top: 30px;margin-left: 240px;">
                            <li style=><span style="min-width: 130px;color: #919ba5;display: inline-block;">Nhà tắm:</span> Chung</li>
                            <li style=><span style="min-width: 130px;color: #919ba5;display: inline-block;margin-top: 10px;">Điều hòa:</span> {{ $motel->air_conditioning }}</li>
                            <li style=><span style="min-width: 130px;color: #919ba5;display: inline-block;margin-top: 10px;">Nóng lạnh:</span> {{ $motel->hot_cold }}</li>
                        </ul>
                    </div>
                    <div style="font-size: 24px;font-weight: 700;line-height: 30px;margin-top: 20px">
                        Mô tả chi tiết
                    </div>
                    <div style="margin-top: 15px;">
                        {{ $motel->infrastructure }}
                    </div>
                    <hr style="width: 83%;">
                    <div>
                        <button style="width: 14%;height: 50px;margin-right: 10px;border: 1px solid #d7dce0;border-radius: 50px;outline:none">
                            <a href="{{route('renter.form_login')}}"><i class="fa fa-heart-o" aria-hidden="true" style="color: palevioletred" id="heart">  Lưu tin</i></a>
                        </button>
                        <button style="width: 20%;height: 50px;margin-right: 10px;border: 1px solid #d7dce0;border-radius: 50px;outline:none" data-toggle="modal" data-target="#exampleModal">
                            <a href="{{route('renter.form_login')}}"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: red">  Báo cáo vi phạm</i></a>
                        </button>
                        <button type="button" style="width: 30%;height: 50px;margin-left: 130px;border: 1px solid #d7dce0;outline:none">
                            <i class="fa fa-phone" aria-hidden="true" style="font-size: 24px;color: #009177"> 0945156995</i>
                        </button>
                    </div>
                    <hr style="width: 83%;">
                    <div style="font-size: 24px;font-weight: 700;line-height: 30px;margin-top: 20px">
                        Review
                    </div>
                    <div style="margin-top: 20px;">
                        @foreach ($motel->reviews as $review)
                            <p style="font-weight: 600;color: #009177">{{$review->owner->full_name ?? $review->renter->full_name}}: <span style="font-weight: 400;color: black">{{ $review->review }}</span></p>
                        @endforeach
                    </div>
                </div>
        </div>
        <div id="side-bar">
            <div class="review">
                <h3>Review khu vực hà nội</h3>
                <hr>
                <ul>
                    <li>
                        <a href="{{ route('review.badinh') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Ba Đình</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.caugiay') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Cầu Giấy</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.dongda') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Đống Đa</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.haibatrung') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hai Bà Trưng</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.hoankiem') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hoàn Kiếm</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.hoangmai') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hoàng Mai</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.longbien') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Long Biên</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.namtuliem') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Nam Từ Liêm</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.tayho') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Tây Hồ</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('review.thanhxuan') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Thanh Xuân</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
