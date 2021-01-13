@extends('admin::layouts.master')

@section('content')
    <div class="col">
        <!-- Main content -->
        {{-- @include('admin::commons.confirmDelete', ['routeDelete' => route('admin.teams.delete'), 'name' => 'team_id', 'id' => 'team_id']) --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- search bar --}}
                    {{-- @include('admin::pages.search') --}}
                    {{-- end search bar  --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title pl-2 left-column my-1" style="font-weight: bold;">DANH SÁCH BÀI ĐĂNG CHỜ PHÊ DUYỆT</h2>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <table class="table table-bordered table-hover table-striped text-center">
                                        <thead class="thead">
                                            <tr>
                                                <th style="width: 10%">
                                                    ID                      
                                                </th>
                                                <th style="width: 20%">
                                                    Tên chủ trọ                   
                                                </th>
                                                <th style="width: 10%">
                                                    Gia hạn                  
                                                </th>
                                                <th style="width: 10%">
                                                    Nhà trọ
                                                </th>
                                                <th style="width: 15%">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(count($extends->all()))
                                                @foreach($extends as $key => $extend)
                                                    <tr>
                                                        <td scope="row">{{ $extend->id }}</td>
                                                        <td style="white-space: normal;word-break: break-all">{{ $extend->owner->full_name }}</td>
                                                        <td>{{ $extend->more_extend}}</td>
                                                        <td>
                                                            {{ $extend->motel_id }}
                                                        </td>
                                                        <td class="pt-2 pb-2">
                                                            <button type="button" onclick="postSuccess({{ $extend->id }})" class="btn btn-sm btn-success btn-btn" id="{{ $extend->id }}">Phê duyệt</button>
                                                            <button type="button" onclick="postRefuse({{ $key }}, {{ $extend->id }})" class="btn btn-sm btn-danger " id="{{ $key }}">Từ chối</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="7">Không có bản ghi nào</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    {{$extends->links("pagination::bootstrap-4")}}  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function postSuccess(id) {
            document.getElementById(id).innerHTML = '<i class="fas fa-check"></i>';
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/admin/approvalExtend/' + id,
                success: function(response) {
                    toastr.success('Đã phê duyệt gia hạn')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Xử lý lỗi
                }
            })
        }

        function postRefuse(key, id) {
            document.getElementById(key).innerHTML = '<i class="fas fa-times-circle"></i>';
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/admin/refuseExtend/' + id,
                success: function(response) {
                    toastr.warning('Đã từ chối gia hạn')
                    console.log(111);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Xử lý lỗi
                }
            })
        }
    </script>
@endsection