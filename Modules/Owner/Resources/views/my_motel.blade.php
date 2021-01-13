@extends('owner::layouts.master')

@section('content')
    <hr>
    <div class="container" >
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

            <div class="col-md-9" style="margin-top: 15px;">
                <div class="table-responsive p-0">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead class="thead">
                            <tr>
                                <th style="width: 19%">
                                    Địa chỉ                      
                                </th>
                                <th style="width: 4.5%">
                                    Lượt thích
                                </th>
                                <th style="width: 2.5%">
                                    Gia hạn                      
                                </th>
                                <th style="width: 5%">
                                    Ngày đăng
                                </th>
                                <th style="width: 10%">Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>                                          
                            @foreach($user->motels as $motel)
                                <form action="/owner/extend/{{$motel->id}}" method="POST"> 
                                    @csrf
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Gia hạn bài đăng:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <select class="form-control" name="extend">
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" onclick="notification({{ $motel->owner->id }})">Gia hạn</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <tr>
                                    <td style="white-space: normal;word-break: break-all">{{ $motel->location }}</td>
                                    <td>{{ count($motel->likelists) }}</td>
                                    <td>{{ $motel->extend}}</td>
                                    @if($motel->status == 1)
                                        <td>{{ $motel->updated_at->format('d-m-Y') }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td class="pt-2 pb-2">
                                    <a href="/owner/edit/{{ $motel->id }}" style="color: white"><button type="button" class="btn btn-sm btn-primary">Chỉnh sửa</a></button>
                                    @if($motel->status == 1)
                                        <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#exampleModal">Gia hạn</button>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

    function notification(id) {
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/owner/extendNotification/' + id,
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

@endsection