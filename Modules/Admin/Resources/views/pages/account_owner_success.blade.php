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
                                <h2 class="card-title pl-2 left-column my-1" style="font-weight: bold;">DANH SÁCH TÀI KHOẢN CHỦ TRỌ</h2>
                            </div>

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
                                                @foreach($accounts as $key => $account)
                                                    <tr>
                                                        <td scope="row">{{ $account->id }}</td>
                                                        <td>{{ $account->full_name }}</td>
                                                        <td>{{ $account->email}}</td>
                                                        <td>{{ $account->phone }}</td>
                                                        <td class="pt-2 pb-2">
                                                            <button type="button" onclick="accountSuccess({{ $key }})" class="btn btn-sm btn-danger btn-btn" id="{{ $key }}">Vô hiệu hóa</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="4">Không có bản ghi nào</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    {{$accounts->links("pagination::bootstrap-4")}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection