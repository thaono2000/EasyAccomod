@extends('admin::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.posts.edit_post', $posts->id) }}">
                            {{ csrf_field() }}
                            <div class="justify-content-md-center">
                                <div class="">
                                    <div class="form-group row">
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 195px;">Tiêu đề:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="title" value="{{ $posts->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 120px;">Địa chỉ:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="location" value="{{ $posts->location }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 row" >
                                            <label style="margin-top: 15px;margin-left: 184px;">Diện tích:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="acreage" value="{{ $posts->acreage }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 147px;">Giá:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="price" value="{{ $posts->price }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 row" >
                                            <label style="margin-top: 15px;margin-left: 184px;">Điều hòa:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="air_conditioning" value="{{ $posts->air_conditioning }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 92px;">Nóng lạnh:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="hot_cold" value="{{ $posts->hot_cold }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 187px;">Nhà tắm:</label>
                                            <div class="col-md-6">
                                                <select name='bathroom' class="form-control">
                                                    <option value="Chung">Chung</option>
                                                    <option value="Riêng">Riêng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 128px;">Mô tả:</label>
                                            <div class="col-md-6">    
                                                <textarea name="infrastructure" class="form-control" rows="4" cols="50">{{ $posts->infrastructure }}</textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 114px;">Gia hạn:</label>
                                            <div class="col-md-6">
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
                                        </div> --}}
                                    </div>
                                    <div class="form-group row">
                                        {{-- <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 195px;">Chủ trọ:</label>
                                            <div class="col-md-6">    
                                                <select name="owner_id" class="form-control">
                                                    @foreach ($owners as $owner)
                                                        <option value="{{ $owner->id }}">{{ $owner->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-6 row">
                                            <label style="margin-top: 5px;margin-left: 140px;">Ảnh:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="form-control-file" id="image" name="image[]" accept=".jpg, .jpeg, .png" multiple>
                                                <p class="text-danger">{{ $errors->first('image') ?? 'none' }}</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="form-group row">
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 207px;">Mô tả:</label>
                                            <div class="col-md-6">    
                                                <textarea name="infrastructure" class="form-control" rows="4" cols="50">{{ $posts->infrastructure }}</textarea>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group row text-center">
                                        <div class="col">
                                            <button class="btn btn-primary">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
