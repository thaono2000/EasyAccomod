@extends('admin::layouts.master')

@section('content')
	<div class="row" style="margin-left: 35px;">
		<div class="col-md-4">
			<div class="card mb-1" style="width: 390px;height: 100px!important;">
				<div class="row no-gutters">
					<div class="col-md-5" style="background: #e2e3e5;height: 100px!important;">
					<i class="fas fa-user" style="font-size: 3rem;margin-left:27px;color:white;padding: 25px 0px 20px 30px;"></i>
					</div>
					<a href="{{ route("admin.accounts.wait_list_account") }}" style="color: black!important">
						<div class="col-md-7">
							<div class="card-body" style="width: 200px;text-align:center;">
								<h5 class="card-title">Tài khoản cần được phê duyệt.</h5>
								<p class="card-text" style="font-weight:bold;padding-top: 10px;">{{ $datas['accounts'] }}</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-1" style="width: 390px;height:100px!important;">
				<div class="row no-gutters">
					<div class="col-md-5" style="background: #e2e3e5;height:100px!important;">
						<i class="fa fa-spinner" style="font-size: 3rem;margin-left:20px;color:white;padding: 25px 0px 20px 30px;"></i>
					</div>
					<a href="{{ route("admin.posts.list_wait_post") }}" style="color: black!important">
						<div class="col-md-7">
							<div class="card-body" style="width: 200px;text-align:center;">
								<h5 class="card-title">Bài đăng cần được phê duyệt.</h5>
								<p class="card-text" style="padding-top:10px;font-weight:bold">{{ $datas['posts'] }}</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-5" style="width: 390px;height:100px!important;">
				<div class="row no-gutters">
					<div class="col-md-5" style="background: #e2e3e5;height:100px!important;">
						<i class="fas fa-recycle" style="font-size: 3rem;margin-left:20px;color:white;padding: 25px 0px 20px 30px;"></i>
					</div>
					<a href="{{ route("admin.posts.list_refuse_post") }}" style="color: black!important">
						<div class="col-md-7">
							<div class="card-body" style="width: 200px;text-align:center;">
								<h5 class="card-title">Bài đăng đã từ chối.</h5>
								<p class="card-text" style="padding-top:30px;font-weight:bold">{{ $datas['posts'] }}</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
