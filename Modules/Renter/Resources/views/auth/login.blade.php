<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
								  <a class="nav-item nav-link active" id="nav-nguoithue-tab" data-toggle="tab" href="{{ route('renter.form_login') }}" role="tab" aria-controls="nav-nguoithue" >Người thuê</a>
								  <a class="nav-item nav-link" id="nav-chutro-tab" data-toggle="tab" href="{{ route('owner.form_login') }}" role="tab" aria-controls="nav-chutro">Chủ trọ</a>
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" role="tabpanel" >
									<h4 class="card-title">Đăng nhập người thuê</h4>
                                    <form method="POST" class="my-login-validation" novalidate="" action="{{ route('renter.post_login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Địa chỉ email</label>
                                            <input id="email" type="email" class="form-control @error('password') is-invalid @enderror" name="email" value="" required autofocus>
                                            @error('password')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Mật khẩu
                                            </label>
                                            <input id="password" type="password" class="form-control" name="password" required data-eye>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                                <label for="remember" class="custom-control-label">Nhớ mật khẩu</label>
                                            </div>
                                        </div>

                                        <div class="form-group m-0">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Đăng nhập
                                            </button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            Bạn không có tài khoản <a href="{{ route('renter.form_register') }}">Đăng ký ngay</a>
                                        </div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	<script>
		@if (session()->has('status'))
			toastr.success('{{ session('status') }}')
		@endif
	</script>
</body>
</html>
