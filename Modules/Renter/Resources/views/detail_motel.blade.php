@extends('renter::layouts.master')

@section('content')
    <form action="/renter/report/{{ $motel->id }}" method="POST"> 
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nội dung báo cáo vi phạm:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="text" style="width:100%;" name="report">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">report</button>
                </div>
                </div>
            </div>
        </div>
    </form>
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
                        <button style="width: 14%;height: 50px;margin-right: 10px;border: 1px solid #d7dce0;border-radius: 50px;outline:none" onclick="likes({{$motel->id}})">
                            <i class="fa fa-heart-o" aria-hidden="true" style="color: palevioletred" id="heart">  Lưu tin</i>
                        </button>
                        <button style="width: 20%;height: 50px;margin-right: 10px;border: 1px solid #d7dce0;border-radius: 50px;outline:none" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: red">  Báo cáo vi phạm</i>
                        </button>
                        <button type="button" style="width: 30%;height: 50px;margin-left: 130px;border: 1px solid #d7dce0;outline:none">
                            <i class="fa fa-phone" aria-hidden="true" style="font-size: 24px;color: #009177"> {{ $motel->owner->phone }}</i>
                        </button>
                    </div>
                    <hr style="width: 83%;">
                    <div style="font-size: 24px;font-weight: 700;line-height: 30px;margin-top: 20px">
                        Review
                    </div>
                    <form action="/renter/review/{{ $motel->id }}" method="POST">
                        @csrf
                        <div style="display:flex;margin-bottom: 20px;margin-top: 20px;">
                            <input type="text" style="width: 65%;height:60px;border: 1px solid #009177;outline:none" name="review">
                            <button type="sumbit" style="margin-left: 30px;width: 15%;background: white;border: 1px solid #009177;border-radius: 50px;outline:none">Gửi</button>
                        </div>
                    </form>
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
                        <a href="{{ route('renter.badinh') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Ba Đình</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.caugiay') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Cầu Giấy</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.dongda') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Đống Đa</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.haibatrung') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hai Bà Trưng</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.hoankiem') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hoàn Kiếm</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.hoangmai') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Hoàng Mai</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.longbien') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Long Biên</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.namtuliem') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Nam Từ Liêm</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.tayho') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Tây Hồ</a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('renter.thanhxuan') }}" style="font-size: 16px;color: #53535F;font-weight:400">Quận Thanh Xuân</a>
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
            url: 'http://localhost:8000/renter/likes/' + id,
            success: function(response) {
                console.log(1111);
                toastr.success('Đã thêm vào danh sách yêu thích')
            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            }
        })
    }

    function FormReport (id) {
        $('#textWarningDelete').text('Bạn có chắc chắn muốn xóa team này?');
        $('#team_id').val(id);
    }
</script>


@section('script')
<script>
    @if (session()->has('status'))
        toastr.success('{{ session('status') }}')
    @endif
</script>
@endsection