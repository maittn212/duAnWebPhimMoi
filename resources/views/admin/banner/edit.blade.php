@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý banner
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Tiêu đề banner</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $banner->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="url" class="mb-2">Đường dẫn</label>
                                <input type="text" name="url" class="form-control" value="{{ $banner->url }} ">

                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="mb-2">Ảnh</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @php
                                    $image_check = substr($banner->image, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $banner->image }}" alt="{{ $banner->title }}" title="{{ $banner->title }}"
                                        width="60px" height="90px">
                                @else
                                    <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}"
                                        title="{{ $banner->title }}" width="60px" height="90px">
                                @endif

                            </div>
                            <div class="form-group mb-3">
                                <label for="start_date" class="mb-2">Ngày bắt đầu</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($banner->start_date)->format('Y-m-d') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="end_date" class="mb-2">Ngày kết thúc</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($banner->end_date)->format('Y-m-d') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="position" class="mb-2">Vị trí</label>
                                <select class="form-control" name="position" id="position">
                                    <option value="">--Chọn vị trí--</option>
                                    <option value="0" @selected($banner->position == '0')>Modal</option>
                                    <option value="1" @selected($banner->position == '1')>Banner 1</option>
                                    <option value="2" @selected($banner->position == '2')>Banner 2</option>
                                    <option value="3" @selected($banner->position == '3')>Banner 3</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status" class="mb-2">Trạng thái</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">--Chọn trạng thái--</option>
                                    <option value="1" @selected($banner->status == '1')>Hiển thị</option>
                                    <option value="0" @selected($banner->status == '0')>Không hiển thị</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('banner.index') }}" class="btn btn-secondary">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
