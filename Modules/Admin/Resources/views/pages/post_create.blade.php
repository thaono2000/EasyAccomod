@extends('admin::layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.posts.add_post') }}">
                            {{ csrf_field() }}
                            <div class="justify-content-md-center">
                                <div class="">
                                    <div class="form-group row">
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 200px;">Địa chỉ:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="location" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 135px;">price:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="price">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 row" >
                                            <label style="margin-top: 15px;margin-left: 184px;">Diện tích:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="acreage" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 141px;">Ảnh:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 207px;">Mô tả:</label>
                                            <div class="col-md-6">    
                                                <textarea name="infrastructure" class="form-control" rows="4" cols="50"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <label style="margin-top: 15px;margin-left: 115px;">Gia hạn:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

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