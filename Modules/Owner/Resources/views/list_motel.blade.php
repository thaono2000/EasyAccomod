@extends('owner::layouts.master')

@section('content')
    <hr style="margin-top: 0;margin-bottom: 25px;width: 100%">
    <div class="mg-page-content">
        <div id="main">
            <div class="content"><h1>Danh sách nhà trọ cho thuê</h1></div>
            <div class="list">
                <div class="list-result">
                    <ul>
                        @foreach($motels as $motel)
                            @if($motel->status == 1)
                                <li id="{{ $motel->id }}">
                                    <div class="img-motel">
                                        <img src="http://localhost:8000/storage/images/{{$motel->images['0']->image}}">
                                    </div>
                                    
                                    <div class="detail-motel">
                                        <div class="title">
                                            <a href="/owner/detail/{{$motel->id}}">
                                                {{ $motel->title }}
                                            </a><br>
                                        </div>
                                        <div class="location">
                                            {{ $motel->location }}
                                        </div>
                                        <ul class="info-motel">
                                            <li><i class="fa fa-square" aria-hidden="true" style="font-size: 13px;"></i> {{ $motel->acreage }}m2</li>
                                            <li><i class="fa fa-bed" aria-hidden="true" style="font-size: 13px;"></i> 1</li>
                                            <li><i class="fa fa-bath" style="font-size: 13px;"></i> 1</li>
                                        </ul>
                                        <div class="price">{{ $motel->price }} triệu</div>
                                        <div class="more">
                                            <div class="post-date">Ngày đăng: {{ $motel->updated_at->format('d-m-Y') }}</div>
                                            <div class="phone">
                                                <i class="fa fa-phone" aria-hidden="true" style="color: #00deb6">
                                                    <span style="color: black!important">
                                                        {{ $motel->owner->phone }}
                                                    </span>
                                                </i>
                                                <button style="background: none;border: none;font-size: 22px;outline:none" onclick="likes({{ $motel->id }})"><i class="fa fa-heart-o" aria-hidden="true" style="color: red;"></i></button>
                                            </div>  
                                        </div>
                                    </div>
                                </li>
                                <hr style="width: 100%;margin-left: -36px;">
                            @endif
                        @endforeach
                    </ul>
                    <div style="margin-left: -25px">
                        {{$motels->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
        <div id="side-bar">
            <div class="review">
                <h3>Review khu vực hà nội</h3>
                <hr>
                <ul>
                    <li>
                        <a href="{{ route('owner.badinh') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Ba Đình</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.caugiay') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Cầu Giấy</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.dongda') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Đống Đa</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.haibatrung') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hai Bà Trưng</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.hoankiem') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hoàn Kiếm</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.hoangmai') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hoàng Mai</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.longbien') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Long Biên</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.namtuliem') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Nam Từ Liêm</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.tayho') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Tây Hồ</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('owner.thanhxuan') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Thanh Xuân</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

<script>
    function likes(id){
        // document.getElementById("heart").style.color = "palevioletred";
        $.ajax({
            type: 'get',
            url: 'http://localhost:8000/owner/likes/' + id,
            success: function(response) {
                toastr.success('Đã thêm vào danh sách yêu thích')
            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            }
        })
    }
</script>