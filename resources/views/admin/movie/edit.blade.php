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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Tiêu đề</label>
                                <input type="text" name="title" id="slug" onkeyup="ChangeToSlug()"
                                    class="form-control" value="{{ $movie->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Tên tiếng Anh</label>
                                <input type="text" name="eng_name" id="eng_name" class="form-control"
                                    value="{{ $movie->eng_name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title" class="mb-2">Slug</label>
                                <input type="text" name="slug" id="convert_slug" class="form-control"
                                    value="{{ $movie->slug }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="time" class="mb-2">Thời lượng</label>
                                <input type="text" name="time" id="time" class="form-control"
                                    value="{{ $movie->time }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="movie_type" class="mb-2">Loại phim</label>
                                <select class="form-control" name="movie_type" id="movie_type">
                                    <option value="">--Chọn loại phim--</option>
                                    <option value="0" @selected($movie->movie_type == 0)>Series (Phim dài tập)</option>
                                    <option value="1"  @selected($movie->movie_type == 1)>Movie (Phim chiếu rạp / Phim một tập)</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="episode_count" class="mb-2">Số tập</label>
                                <input type="text" name="episode_count" id="episode_count" class="form-control"
                                    value="{{ $movie->episode_count }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="trailer" class="mb-2">Trailer</label>
                                <input type="text" name="trailer" id="trailer" class="form-control"
                                    value="{{ $movie->trailer }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="image" class="mb-2">Ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($movie->image !== null)
                                    <img src="{{ Storage::url($movie->image) }}" width="100">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="mb-2">Mô tả</label>
                                <textarea class="form-control" rows="10" name="description" id="description">{{ $movie->description }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status" class="mb-2">Trạng thái</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">--Chọn trạng thái--</option>
                                    <option value="1" {{ $movie->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ $movie->status == 0 ? 'selected' : '' }}>Không hiển thị
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category" class="mb-2">Danh mục</label>
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">--Chọn danh mục--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="genre_id" class="d-block mb-2">Thể loại</label>
                                <div class="d-flex flex-wrap gap-3">
                                    @foreach ($list_genre as $genre)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="genre[]"
                                                id="genre_{{ $genre->id }}" value="{{ $genre->id }}"
                                                {{ in_array($genre->id, $selected_genres) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="genre_{{ $genre->id }}">{{ $genre->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                           
                            <div class="form-group mb-3">
                                <label for="country" class="mb-2">Quốc gia</label>
                                <select class="form-control" name="country_id" id="country">
                                    <option value="">--Chọn quốc gia--</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $movie->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="is_hot" class="mb-2">Phim hot</label>
                                <select class="form-control" name="is_hot" id="is_hot">
                                    <option value="0" {{ $movie->is_hot == 0 ? 'selected' : '' }}>Không</option>
                                    <option value="1" {{ $movie->is_hot == 1 ? 'selected' : '' }}>Có</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="resolution" class="mb-2">Độ phân giải</label>
                                <select class="form-control" name="resolution" id="resolution">
                                    <option value="0" {{ $movie->resolution == 0 ? 'selected' : '' }}>HD</option>
                                    <option value="1" {{ $movie->resolution == 1 ? 'selected' : '' }}>SD</option>
                                    <option value="2" {{ $movie->resolution == 2 ? 'selected' : '' }}>HDCam</option>
                                    <option value="3" {{ $movie->resolution == 3 ? 'selected' : '' }}>Cam</option>
                                    <option value="4" {{ $movie->resolution == 4 ? 'selected' : '' }}>FullHD</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="language_type" class="mb-2">Kiểu ngôn ngữ</label>
                                <select class="form-control" name="language_type" id="language_type">
                                    <option value="0" {{ $movie->language_type == 0 ? 'selected' : '' }}>Vietsub
                                    </option>
                                    <option value="1" {{ $movie->language_type == 1 ? 'selected' : '' }}>Thuyết minh
                                    </option>
                                </select>
                            </div>


                            <button class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('movie.index') }}" class="btn btn-secondary">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
