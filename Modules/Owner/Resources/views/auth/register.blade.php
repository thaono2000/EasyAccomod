<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Đăng ký</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Đăng ký</h4>
                            <form method="POST" class="my-login-validation" action="{{ route('owner.post_register') }}">
                                @csrf
								<div class="form-group">
									<label for="name">Tên</label>
									<input id="name" type="text" class="form-control" name="full_name" required autofocus>
									<div class="invalid-feedback">
										Tên bạn là gì ?
									</div>
								</div>

								<div class="form-group">
									<label for="email">Địa chỉ email</label>
									<input id="email" type="email" class="form-control" name="email" required>
								</div>

								<div class="form-group">
									<label for="password">Mật khẩu</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group">
									<label for="phone">Số điện thoại</label>
									<input id="phone" type="text" class="form-control" name="phone" required>
								</div>

								<div class="form-group">
									<label for="identity">Số CMND</label>
									<input id="identity" type="text" class="form-control" name="identity" required>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Đăng ký
									</button>
								</div>
								<div class="mt-4 text-center">
									Bạn đã có tài khoản <a href="{{ route('owner.form_login') }}">Đăng nhập</a>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
</body>
</html>