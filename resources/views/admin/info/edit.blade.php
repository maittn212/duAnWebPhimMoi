@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý thông tin Website
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
                        <form action="{{ route('info.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Tiêu đề Website</label>
                                <input type="text" name="title" id="slug" 
                                    class="form-control" value="{{ $info->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="logo" class="mb-2">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <img src="{{ Storage::url($info->image) }}" width="100">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">Email</label>
                                <input type="text" name="email" id="email" 
                                    class="form-control" value="{{ $info->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="mb-2">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" 
                                    class="form-control" value="{{ $info->phone }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="mb-2">Mô tả</label>
                                <textarea class="form-control" name="description" id="description">{{ $info->description }}</textarea>
                            </div>
                            <button class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('info.index') }}" class="btn btn-secondary">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
