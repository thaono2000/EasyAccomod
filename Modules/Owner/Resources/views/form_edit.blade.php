@extends('owner::layouts.master')

@section('content')
    <hr style="margin-top: 0;margin-bottom: 25px;width: 100%">
    <div id="page-body" class="container">
        <div id="page-header">
            <h2>Chỉnh sửa bài đăng</h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="/owner/edit/{{ $motel->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="diachi" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Địa chỉ cho thuê</label> 
                        <div class="col-8">
                        <input name="location" class="form-control " required="required" type="text" value="{{ $motel->location }}" @if($motel->status == 1) disabled @endif>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="tieude" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Tiêu đề</label> 
                        <div class="col-8">
                        <input name="title" class="form-control" required="required" type="text" value="{{ $motel->title }}"  @if($motel->status == 1) disabled @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mota" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Mô tả</label> 
                        <div class="col-8">
                            <textarea name="infrastructure" cols="40" rows="4" class="form-control"  @if($motel->status == 1) disabled @endif>{{ $motel->infrastructure }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="giathue" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Giá cho thuê</label> 
                        <div class="col-8">
                        <input name="price" class="form-control" required="required" type="text" value="{{ $motel->price }}"  @if($motel->status == 1) disabled @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dientich" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Diện tích</label> 
                        <div class="col-8">
                            <input name="acreage" class="form-control" required="required" type="text" value="{{ $motel->acreage }}"  @if($motel->status == 1) disabled @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dientichwc" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Nhà tắm</label> 
                        <div class="col-8">
                            @if($motel->status == 0)
                                <select name="bathroom" class="form-control">
                                    <option value="Chung">Chung</option>
                                    <option value="Riêng">Riêng</option>
                                </select>
                            @else
                                <select class="form-control" disabled>
                                    <option value="">{{ $motel->bathroom }}</option>
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dieuhoa" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Điều hoà</label> 
                        <div class="col-8">
                            <input name="air_conditioning" class="form-control" required="required" type="text" value="{{ $motel->air_conditioning }}"  @if($motel->status == 1) disabled @endif>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="nonglanh" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Nóng lạnh</label> 
                        <div class="col-8">
                            <input name="hot_cold" class="form-control" required="required" type="text" value="{{ $motel->hot_cold }}"  @if($motel->status == 1) disabled @endif>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="hinhanh" class="col-4 col-form-label"  style="color: black;margin-left: 0.1px">Hình ảnh</label>
                        {{-- <div class="col-8">
                            <input type="file" class="form-control-file"  id="image" name="image[]" accept=".jpg, .jpeg, .png" multiple>
                            <p class="text-danger">{{ $errors->first('image') ?? 'none' }}</p>
                        </div> --}}
                    </div>

                    @foreach ($motel->images as $image)
                            <img src="http://localhost:8000/storage/images/{{$image->image}}">
                        @endforeach 

                    <div class="form-group row">
                        <label for="nonglanh" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Trạng thái</label> 
                        <div class="col-8">
                            <input name="now" class="form-control" required="required" type="text" value="{{ $motel->now }}" @if($motel->status == 0) disabled @endif>
                        </div>
                    </div> 
            
                    <div class="form-group row">
                        <div class="offset-4 col-6">
                        <button name="submit" type="submit" class="btn btn-primary" style="margin-top: 10px;margin-bottom: 20px;" onclick="notification({{$motel->id}})">Đăng bài</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    function notification(id) {
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/owner/adminNotification/' + id,
                success: function(response) {
                    // toastr.success('Đã gửi thông báo tới admin')
                    console.log(111);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Xử lý lỗi
                }
            })
        }
</script>