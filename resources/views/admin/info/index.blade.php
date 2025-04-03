@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý thông tin website
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="bg-light text-center" width="30%">Tên Website</th>
                                    <td>{{ $info->title }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-center">Logo</th>
                                    <td><img src="{{ Storage::url($info->logo) }}" alt="Logo" height="50"></td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-center">Email liên hệ</th>
                                    <td>{{ $info->email }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-center">Số điện thoại</th>
                                    <td>{{ $info->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-center">Mô tả Website</th>
                                    <td>{{ $info->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    
                        <div class="text-center mt-4">
                            <a href="{{ route('info.edit', $info->id) }}" class="btn btn-warning px-4 py-2 shadow-lg fw-bold" data-bs-toggle="modal" data-bs-target="#editWebsiteModal">
                                <i class="fa fa-wrench"></i> Chỉnh sửa
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
