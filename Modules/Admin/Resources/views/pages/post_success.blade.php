@extends('admin::layouts.master')

@section('content')
    <div class="col">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex">
                    <div class="col-6 col-md-2">
                        <a href="{{ route('admin.posts.create_account') }}" class="btn btn-primary">Đăng bài mới</a>
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
                                            @foreach($posts as $post)
                                                <tr>
                                                    <td scope="row">{{ $post->id }}</td>
                                                    <td style="white-space: normal;word-break: break-all">{{ $post->location }}</td>
                                                    <td>{{ $post->price}}</td>
                                                    <td>{{ $post->acreage }}</td>
                                                    <td>{{ $post->image }}</td>
                                                    <td style="white-space: normal;word-break: break-all">{{ $post->infrastructure }}</td>
                                                    <td class="pt-2 pb-2">
                                                    <button type="button" class="btn btn-sm btn-primary" id="{{ $post->id }}"><a href="{{ route('admin.posts.form_post', $post->id) }}">Chỉnh sửa</a></button>
                                                    <button type="button" onclick="postsuccess({{ $post->id }})" class="btn btn-sm btn-danger" id="{{ $post->id }}">Gỡ bài</button>
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
    <script>
        toastr.success('{{ session('status') }}')
    </script>
    @endif
</script>
    
@endsection