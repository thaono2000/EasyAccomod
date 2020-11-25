@extends('admin::layouts.master')

@section('content')
    <div class="col">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title pl-2 left-column my-1" style="font-weight: bold;">DANH SÁCH BÀI ĐĂNG ĐÃ TỪ CHỐI</h2>
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
                                                    Địa chỉ                      
                                                </th>
                                                <th style="width: 10%">
                                                    Giá                      
                                                </th>
                                                <th style="width: 10%">
                                                    Diện tích
                                                </th>
                                                <th style="width: 10%">
                                                    Ảnh
                                                </th>
                                                <th style="width: 25%">
                                                    Mô tả
                                                </th>
                                                <th style="width: 15%">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(count($posts->all()))
                                                @foreach($posts as $post)
                                                    <tr>
                                                        <td scope="row">{{ $post->id }}</td>
                                                        <td style="white-space: normal;word-break: break-all">{{ $post->location }}</td>
                                                        <td>{{ $post->price}}</td>
                                                        <td>{{ $post->acreage }}</td>
                                                        <td>{{ $post->image }}</td>
                                                        <td style="white-space: normal;word-break: break-all">{{ $post->infrastructure }}</td>
                                                        <td class="pt-2 pb-2">
                                                            <button type="button" onclick="postSuccess({{ $post->id }})" class="btn btn-sm btn-success btn-btn" id="{{ $post->id }}">Phê duyệt</button>
                                                            <button type="button" onclick="" class="btn btn-sm btn-danger" id="">Từ chối</button>
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
                                    {{$posts->links("pagination::bootstrap-4")}}  
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
                url: 'http://localhost:8000/admin/approvalPost/' + id,
                success: function(response) {
                    toastr.success('Đã phê duyệt bài đăng!!!')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Xử lý lỗi
                }
            })
        }
    </script>
@endsection