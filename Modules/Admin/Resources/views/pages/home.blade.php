@extends('admin::layouts.master')

@section('content')
	<div class="row" style="margin-left: 35px;">
		<div class="col-md-3">
			<a href="">
				<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
					<div class="card-body">
						<div class="md-card-header" style="color: black"></div>
						<i class="fas fa-users" style="float: right;font-size: 30px;color: pink;"></i>
						<h5 class="" style="text-align: center;">10</h5>
						<br><br>
						<p class="card-text">Tài khoản cần được phê duyệt.</p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-body">
					<i class="fas fa-users" style="float: right;font-size: 30px;"></i>
					<h5 class="" style="text-align: center;">10</h5>
					<br><br>
					<p class="card-text">Bài đăng cần được phê duyệt.</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-body">
					<i class="fas fa-users" style="float: right;font-size: 30px;"></i>
					<h5 class="" style="text-align: center;">10</h5>
					<br><br>
					<p class="card-text">Phòng trọ đã cập nhật trạng thái.</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-body">
					<i class="fas fa-users" style="float: right;font-size: 30px;"></i>
					<h5 class="" style="text-align: center;">10</h5>
					<br><br>
					<p class="card-text">Tin nhắn mới chưa đọc.</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		toastr.success({{ 'status' }});
	</script>
@endsection