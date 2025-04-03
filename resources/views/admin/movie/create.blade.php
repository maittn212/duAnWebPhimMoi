@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý phim
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
                        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Tiêu đề</label>
                                <input type="text" name="title" id="slug" onkeyup="ChangeToSlug()"
                                    value="{{ old('title') }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Tên tiếng Anh</label>
                                <input type="text" name="eng_name" id="eng_name" class="form-control" value="{{ old('eng_name') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="slug" class="mb-2">Đường dẫn</label>
                                <input type="text" name="slug" id="convert_slug" class="form-control" value="{{ old('slug') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="movie_type" class="mb-2">Loại phim</label>
                                <select class="form-control" name="movie_type" id="movie_type">
                                    <option value="">--Chọn loại phim--</option>
                                    <option value="0" @selected(old('status') == '0')>Series (Phim dài tập)</option>
                                    <option value="1" @selected(old('status') == '1')>Movie (Phim chiếu rạp / Phim một tập)</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="time" class="mb-2" >Thời lượng</label>
                                <input type="text" name="time" id="time" class="form-control" value="{{ old('time') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="episode_count" class="mb-2">Số tập</label>
                                <input type="text" name="episode_count" id="episode_count" class="form-control" value="{{ old('episode_count') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="trailer" class="mb-2">Trailer</label>
                                <input type="text" name="trailer" id="trailer" class="form-control" value="{{ old('trailer') }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="image" class="mb-2">Ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">
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
                            <div class="form-group mb-3">
                                <label for="category" class="mb-2">Danh mục</label>
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">--Chọn danh mục--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $item->category_id ?? '') == $category->id)>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="genre_id" class="d-block mb-2">Thể loại</label>
                                <div class="d-flex flex-wrap gap-3">
                                    @foreach ($list_genre as $genre)
                                        @if (isset($movie))
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="genre[]"
                                                    id="genre_{{ $genre->id }}" value="{{ $genre->id }}"
                                                    {{ $movie->genre_id ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="genre_{{ $genre->id }}">{{ $genre->title }}</label>
                                            </div>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="genre[]"
                                                id="genre_{{ $genre->id }}" value="{{ $genre->id }}">
                                            <label class="form-check-label"
                                                for="genre_{{ $genre->id }}">{{ $genre->title }}</label>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label for="country">Quốc gia</label>
                                <select class="form-control" name="country_id" id="country">
                                    <option value="">--Chọn quốc gia--</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @selected(old('country_id', $item->country_id ?? '') == $country->id)>{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="country">Phim Hot</label>
                                <select class="form-control" name="is_hot" id="is_hot">
                                    <option value="0" @selected(old('status') == '0')>Không</option>
                                    <option value="1" @selected(old('status') == '1')>Có</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="resolution">Độ phân giải</label>
                                <select class="form-control" name="resolution" id="resolution">
                                    <option value="0" @selected(old('status') == '0')>HD</option>
                                    <option value="1" @selected(old('status') == '1')>SD</option>
                                    <option value="2" @selected(old('status') == '2')>HDCam</option>
                                    <option value="3" @selected(old('status') == '3')>Cam</option>
                                    <option value="4" @selected(old('status') == '4')>FullHD</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="language_type">Kiểu ngôn ngữ</label>
                                <select class="form-control" name="language_type" id="language_type">
                                    <option value="0" @selected(old('status') == '0')>Vietsub</option>
                                    <option value="1"@selected(old('status') == '1')>Thuyết minh</option>
                                </select>
                            </div>

                            <button class="btn btn-primary">Thêm mới</button>
                            <a href="{{ route('movie.index') }}" class="btn btn-secondary">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
