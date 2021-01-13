@extends('owner::layouts.master')

@section('content')
    <hr style="margin-top: 0;margin-bottom: 25px;width: 100%">
    <div id="page-body" class="container">
        <div id="page-header">
            <h2>Đăng bài cho thuê</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('owner.post_motel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nonglanh" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Tên người đăng</label> 
                        <div class="col-8">
                            <input name="hot_cold" class="form-control" required="required" type="text" value="{{ $user->full_name }}" disabled>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="nonglanh" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Số điện thoại</label> 
                        <div class="col-8">
                            <input name="hot_cold" class="form-control" required="required" type="text" value="{{ $user->phone }}" disabled>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="diachi" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Địa chỉ cho thuê</label> 
                        <div class="col-8">
                        <input name="location" class="form-control " required="required" type="text">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="tieude" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Tiêu đề</label> 
                        <div class="col-8">
                        <input name="title" class="form-control" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mota" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Mô tả</label> 
                        <div class="col-8">
                            <textarea name="infrastructure" cols="40" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="giathue" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Giá cho thuê</label> 
                        <div class="col-8">
                        <input name="price" class="form-control" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dientich" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Diện tích</label> 
                        <div class="col-8">
                            <input name="acreage" class="form-control" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dientichwc" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Nhà tắm</label> 
                        <div class="col-8">
                            <select name="bathroom" class="form-control">
                                <option value="Chung">Chung</option>
                                <option value="Riêng">Riêng</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dieuhoa" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Điều hoà</label> 
                        <div class="col-8">
                            <input name="air_conditioning" class="form-control" required="required" type="text">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="nonglanh" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Nóng lạnh</label> 
                        <div class="col-8">
                            <input name="hot_cold" class="form-control" required="required" type="text">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="hinhanh" class="col-4 col-form-label"  style="color: black;margin-left: 0.1px">Hình ảnh</label> 
                        <div class="col-8">
                            <input type="file" class="form-control-file"  id="image" name="image[]" accept=".jpg, .jpeg, .png" multiple>
                            <p class="text-danger">{{ $errors->first('image') ?? 'none' }}</p>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="dientichwc" class="col-4 col-form-label" style="color: black;margin-left: 0.1px">Gia hạn</label> 
                        <div class="col-8">
                            <select name="extend" class="form-control">
                                <option value="1 tuần">Gia hạn 1 tuần chỉ với 200k</option>
                                <option value="2 tuần">Gia hạn 2 tuần chỉ với 490k</option>
                                <option value="3 tuần">Gia hạn 3 tuần chỉ với 580k</option>
                                <option value="1 tháng">Gia hạn 1 tháng chỉ với 770k</option>
                                <option value="2 tháng">Gia hạn 2 tháng 1500k</option>
                                <option value="3 tháng">Gia hạn 3 tháng chỉ với 2200k</option>
                                <option value="4 tháng">Gia hạn 4 tháng 2900k</option>
                                <option value="5 tháng">Gia hạn 5 tháng chỉ với 3650k</option>
                                <option value="6 tháng">Gia hạn 6 tháng chỉ với 4400k</option>
                                <option value="7 tháng">Gia hạn 7 tháng chỉ với 5250k</option>
                                <option value="8 tháng">Gia hạn 8 tháng chỉ với 5900k</option>
                                <option value="9 tháng">Gia hạn 9 tháng chỉ với 6600k</option>
                                <option value="10 tháng">Gia hạn 10 tháng chỉ với 7300k</option>
                                <option value="11 tháng">Gia hạn 11 tháng chỉ với 7900k</option>
                                <option value="1 năm">Gia hạn 1 năm chỉ với 8500k</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Đăng bài</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection