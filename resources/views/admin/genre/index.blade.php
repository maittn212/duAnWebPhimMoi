@extends('layouts.app')

@section('content')
    <div class="container">
        @session('message')
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endsession
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý thể loại
                    </div>

                    <div class="card-body">
                        <a href="{{ route('genre.create') }}" class="btn btn-success btn-sm mb-3">Thêm mới</a>
                        <table class="table"  id="tablePhim">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên thể loại</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genres as $genre)
                                    <tr>
                                        <th scope="row">{{ $genre->id }}</th>
                                        <td>{{ $genre->title }}</td>
                                        <td>{{ $genre->slug }}</td>
                                        <td>
                                            @if ($genre->status == 1)
                                                <span class="badge bg-success">Hiển thị</span>
                                            @else
                                                <span class="badge bg-danger">Không hiển thị</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-warning btn-sm me-1" href="{{ route('genre.edit', $genre->id) }}">Sửa</a>
                                                <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không?')" >Xóa</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
