@extends('owner::layouts.master')
@section('content')
<hr>
<div class="container">
    <h1>Dữ liệu cá nhân</h1>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <hr>
            <a href="{{ route('owner.form_information') }}">Thông tin cá nhân</a>
            <hr>
            <a href="{{ route('owner.my_motel') }}">Bài đăng của tôi</a>
            <hr>
        </div>

        <div class="col-md-9" style="margin-top: 15px">
            <div class="card border-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Thông tin cá nhân</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/owner/update/{{ $user->id }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                <label for="username" class="col-4 col-form-label" style="margin-left: 0.1px;">Email</label> 
                                <div class="col-8">
                                    <input id="username" name="email" value="{{ $user->email }}" class="form-control " required="required" type="text">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="name" class="col-4 col-form-label" style="margin-left: 0.1px;">Tên</label> 
                                <div class="col-8">
                                    <input id="name" name="full_name" value="{{ $user->full_name }}" class="form-control" required="required" type="text">
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-4 col-form-label" style="margin-left: 0.1px;">Mật khẩu </label> 
                                    <div class="col-8">
                                        <input id="password" name="password" value="{{ $user->password }}" class="form-control" required="required" type="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="email" class="col-4 col-form-label" style="margin-left: 0.1px;">Số điện thoại</label> 
                                <div class="col-8">
                                    <input id="email" name="phone" placeholder="{{ $user->phone }}" class="form-control" required="required" type="text" disabled>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="CMND" class="col-4 col-form-label" style="margin-left: 0.1px;">Số CMND</label> 
                                <div class="col-8">
                                    <input id="CMND" name="identity" placeholder="{{ $user->identity }}" class="form-control" required="required" type="text" disabled>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-left: 350px;margin-top: 30px;">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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