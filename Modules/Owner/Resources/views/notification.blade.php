@extends('owner::layouts.master')

@section('content')
<hr>
    <div class="mg-page-content">
        <div style="margin-right: 450px;">
            <div class="content" style="margin-top: 10px;margin-bottom: 30px;">
                <h1>Thông báo</h1>
            </div>
            <div class="list">
                @foreach ($user->notifications as $notification)
                    @if($notification->status == 1)
                        <div class="alert alert-success" role="alert" style="text-align:center;width: 200%;">
                            <button style="background: none;outline: none; border: none;color: white;" onclick="isRead({{ $notification->id }})">{{ $notification->notification }}</button>
                        </div>
                    @else
                    <div class="alert alert-danger" role="alert"  style="text-align:center;width: 200%;">
                        <button style="background: none;outline: none; border: none;color: white;" onclick="isRead({{ $notification->id }})">{{ $notification->notification }}</button>
                    </div>
                    @endif
                @endforeach
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
    function isRead(id) {
        $.ajax({
            type: 'get',
            url: 'http://localhost:8000/owner/isRead/' + id,
            success: function(response) {
                toastr.success('Đã xem!!!')
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //Xử lý lỗi
            }
        })
    }
</script>