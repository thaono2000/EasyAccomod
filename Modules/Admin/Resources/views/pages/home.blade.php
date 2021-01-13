@extends('admin::layouts.master')

@section('content')
	<div style="margin-left: 30px;">
		<h1>Thông báo</h1>
	</div>
	<div>
		<div class="list" style="margin-left: 30px;">
			@foreach ($admin->AdminNotifications as $notification)
				<div class="alert alert-success" role="alert" style="text-align:center;width: 50%">
					{{ $notification->notification }} vào lúc {{ $notification->created_at->format('H:i:s d-m-Y') }}
				</div>
			@endforeach
		</div>
	</div>
@endsection
<script>
</script>