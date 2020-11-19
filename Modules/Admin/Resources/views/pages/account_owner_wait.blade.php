@extends('admin::layouts.master')

@section('content')
    <div class="col">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            {{-- Title của pages --}}
                            <div class="card-header">
                                <h2 class="card-title pl-2 left-column my-1" style="font-weight: bold;">DANH SÁCH TÀI KHOẢN CHỦ TRỌ</h2>
                            </div>
                            {{-- Show danh sách tài khoản --}}
                            <div class="card-body">
                                <div class="table-responsive p-0">
                                    <table class="table table-bordered table-hover table-striped text-center">
                                        <thead class="thead">
                                            <tr>
                                                <th style="width: 10%">
                                                    ID                      
                                                </th>
                                                <th style="width: 30%">
                                                    Họ và tên
                                                </th>
                                                <th style="width: 30%">
                                                    Email
                                                </th>
                                                <th style="width: 20%">
                                                    Phone
                                                </th>
                                                <th style="width: 10%">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($accounts->all()))
                                                @foreach($accounts as $account)
                                                    <tr>
                                                        <td scope="row">{{ $account->id }}</td>
                                                        <td>{{ $account->full_name }}</td>
                                                        <td>{{ $account->email}}</td>
                                                        <td> {{ $account->phone }}</td>
                                                        <td class="pt-2 pb-2">
                                                        <button type="button" data-url='{{ route('admin.accounts.approval_account', $account->id) }}'
                                                            onclick="accountSuccess({{ $account->id }} )"
                                                            class="btn btn-sm btn-success btn-update" id="{{ $account->id }}">
                                                                Phê duyệt
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="5">Không có bản ghi nào</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div>
                                        {{$accounts->links("pagination::bootstrap-4")}}
                                    </div>
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
        function accountSuccess(id) {
            document.getElementById(id).innerHTML = '<i class="fas fa-check"></i>';
            $.ajax({
                type: 'get',
                url: 'http://localhost:8000/admin/approvalAccount/' + id,
                success: function(response) {
                    toastr.success('Đã phê duyệt tài khoản!!!')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Xử lý lỗi
                }
            })
        }
    </script>
@endsection