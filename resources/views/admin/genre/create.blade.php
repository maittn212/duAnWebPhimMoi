@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý thể loại
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('genre.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Tên thể loại</label>
                                <input type="text" name="title" id="slug" onkeyup="ChangeToSlug()" value="{{ old('title') }}"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="slug" class="mb-2">Đường dẫn</label>
                                <input type="text" name="slug" id="convert_slug" class="form-control" value="{{ old('slug') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="mb-2">Mô tả</label>
                                <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status" class="mb-2">Trạng thái</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">--Chọn trạng thái--</option>
                                    <option value="1" @selected(old('status') == '1')>Hiển thị</option>
                                    <option value="0" @selected(old('status') == '0')>Không hiển thị</option>
                                </select>
                            </div>

                            <button class="btn btn-primary">Thêm mới</button>
                            <a href="{{ route('genre.index') }}" class="btn btn-secondary">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
