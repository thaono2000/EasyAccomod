@extends('admin::layouts.master')

@section('content')
    <div class="col">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex">
                    <div class="col-6 col-md-2">
                        <a href="{{ route('admin.posts.create_post') }}" class="btn btn-primary">Đăng bài mới</a>
                    </div>
                    <div class="col col-md-9" style="margin:0 auto"></div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title pl-2 left-column my-1" style="font-weight: bold;">DANH SÁCH ĐÃ ĐĂNG TẢI</h2>
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
                                                    Thời gian tạo                   
                                                </th>
                                                <th style="width: 10%">
                                                    Người tạo
                                                </th>
                                                <th style="width: 15%">Thao tác</th>
                                            </tr>
                                        </thead>

                                        <tbody>                                          
                                            @foreach($posts as $key => $post)
                                                <tr>
                                                    <tr>
                                                        <td scope="row">{{ $post->id }}</td>
                                                        <td style="white-space: normal;word-break: break-all">{{ $post->owner->full_name }}</td>
                                                        <td>{{ $post->created_at->format('d-m-Y')}}</td>
                                                        <td>
                                                            @if($post->admin_id == null)
                                                                Owner
                                                            @else 
                                                                Admin
                                                            @endif
                                                        </td>
                                                    <td class="pt-2 pb-2">
                                                    <button type="button" class="btn btn-sm btn-primary" id="{{ $post->id }}"><a href="{{ route('admin.posts.form_post', $post->id) }}" style="color: white">Chỉnh sửa</a></button>
                                                    {{-- <button type="button" onclick="postsuccess({{ $post->id }})" class="btn btn-sm btn-danger" id="{{ $post->id }}">Gỡ bài</button> --}}
                                                    <button type="button" onclick="postRefuse({{ $key }}, {{ $post->id }})" class="btn btn-sm btn-danger " id="{{ $key }}">Gỡ bài</button>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    @if (session()->has('status'))
        toastr.success('{{ session('status') }}')
    @endif

    function postRefuse(key, id) {
            document.getElementById(key).innerHTML = '<i class="fas fa-times-circle"></i>';
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/admin/refusePost/' + id,
                success: function(response) {
                    toastr.warning('Đã gỡ bài đăng!!!')
                    // console.log(111);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Xử lý lỗi
                }
            })
        }
</script>
    
@endsection