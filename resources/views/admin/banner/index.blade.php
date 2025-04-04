@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý banner
                    </div>
                    <div class="card-body">
                        <a href="{{ route('banner.create') }}" class="btn btn-success btn-sm mb-3">Thêm mới</a>
                        <table class="table" id="tablePhim">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Vị trí</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ngày hiển thị</th>
                                    <th scope="col">Số lượt click</th>
                                    <th scope="col">Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <th scope="row">{{ $banner->id }}</th>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->url }}</td>
                                        <td>
                                            @php
                                                $image_check = substr($banner->image, 0, 5);
                                            @endphp
                                            @if ($image_check == 'https')
                                                <img src="{{ $banner->image }}" alt="{{ $banner->title }}"
                                                    title="{{ $banner->title }}" width="60px" height="90px">
                                            @else
                                                <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}"
                                                    title="{{ $banner->title }}" width="60px" height="90px">
                                            @endif

                                        </td>
                                        <td>
                                            @if ($banner->position == 0)
                                                Modal
                                            @elseif($banner->position == 1)
                                                Banner 1
                                            @elseif($banner->position == 2)
                                                Banner 2
                                            @elseif($banner->position == 3)
                                                Banner 3
                                            @endif
                                        </td>
                                        <td>
                                            @if ($banner->status == 1)
                                                <span class="badge bg-success">Hiển thị</span>
                                            @else
                                                <span class="badge bg-danger">Không hiển thị</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($banner->start_date > now())
                                                <span class="badge bg-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Từ {{ \Carbon\Carbon::parse($banner->start_date)->format('d/m/Y') }} đến {{ \Carbon\Carbon::parse($banner->end_date)->format('d/m/Y') }}">Chưa bắt đầu</span>
                                            @elseif ($banner->end_date < now())
                                                <span class="badge bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Từ {{ \Carbon\Carbon::parse($banner->start_date)->format('d/m/Y') }} đến {{ \Carbon\Carbon::parse($banner->end_date)->format('d/m/Y') }}">Đã kết thúc</span>
                                            @else
                                                <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Từ {{ \Carbon\Carbon::parse($banner->start_date)->format('d/m/Y') }} đến {{ \Carbon\Carbon::parse($banner->end_date)->format('d/m/Y') }}">Đang hiển thị</span>
                                            @endif
                                        </td>
                                        <td>{{ $banner->click_count }}</td>
                                        
                                        <td>
                                        <div class="d-flex">
                                            <a class="btn btn-warning btn-sm me-1"
                                                href="{{ route('banner.edit', $banner->id) }}" title="Sửa">Sửa</a>
                                            <form action="{{ route('banner.destroy', $banner->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có muốn xóa không?')"
                                                    title="Xóa">Xóa</button>
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
