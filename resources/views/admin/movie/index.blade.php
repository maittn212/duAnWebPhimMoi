@extends('layouts.app')

@section('content')
    <div class="container">
        @session('message')
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endsession
        @session('error')
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endsession

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
                        <a href="{{ route('movie.create') }}" class="btn btn-success btn-sm mb-3">Thêm mới</a>
                        <div class="table-responsive">
                            <table class=" table-responsive" id="tablePhim">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Top view</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Năm</th>
                                        <th scope="col">Số tập</th>
                                        <th scope="col">Mùa</th>
                                        <th scope="col">Độ phân giải</th>
                                        <th scope="col">Kiểu ngôn ngữ</th>
                                        <th scope="col">Quốc gia</th>
                                        <th scope="col">Thể loại</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tập phim</th>
                                        <th scope="col">Phim hot</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies as $movie)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $movie->title }}</td>
                                            <td>{{ optional($movie->category)->title ?? 'Chưa có danh mục' }}</td>
                                            <td>
                                                <select name="top_view" id="{{ $movie->id }}"
                                                    class="select-topview form-control">
                                                    <option value="0" {{ $movie->top_view == 0 ? 'selected' : '' }}>
                                                        Không
                                                    </option>
                                                    <option value="1" {{ $movie->top_view == 1 ? 'selected' : '' }}>
                                                        Ngày
                                                    </option>
                                                    <option value="2" {{ $movie->top_view == 2 ? 'selected' : '' }}>
                                                        Tuần
                                                    </option>
                                                    <option value="3" {{ $movie->top_view == 3 ? 'selected' : '' }}>
                                                        Tháng
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                                @php
                                                    $image_check = substr($movie->image,0,5)
                                                @endphp
                                                @if ($image_check == 'https')
                                                    <img src="{{ $movie->image }}" width="75" height="100">
                                                    
                                                @else
                                                    <img src="{{ Storage::url($movie->image) }}" width="75" height="100">
                                                    
                                                @endif
                                            </td>
                                            <td>
                                                <select name="year" id="{{ $movie->id }}"
                                                    class="select-year form-control">
                                                    @for ($i = 2000; $i <= 2025; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $i == $movie->year ? 'selected' : '' }}>{{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td>{{ $movie->current_episode_count }}/{{ $movie->episode_count }}</td>
                                            <td>
                                                @php
                                                    $season = [];
                                                @endphp
                                                <select name="season" id="{{ $movie->id }}"
                                                    class="select-season form-control">
                                                    @for ($season = 0; $season <= 20; $season++)
                                                        <option value="{{ $season }}"
                                                            {{ $season == $movie->season ? 'selected' : '' }}>
                                                            {{ $season }}</option>
                                                    @endfor
                                                </select>
                                            </td>


                                            <td>

                                                @if ($movie->resolution == 0)
                                                    <span class="badge bg-success">HD</span>
                                                @elseif($movie->resolution == 1)
                                                    <span class="badge bg-danger">SD</span>
                                                @elseif ($movie->resolution == 2)
                                                    <span class="badge bg-warning text-dark">HDCam</span>
                                                @elseif ($movie->resolution == 3)
                                                    <span class="badge bg-secondary">Cam</span>
                                                @else
                                                    <span class="badge bg-primary">FullHD</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($movie->language_type == 0)
                                                    <span class="badge bg-success">Vietsub</span>
                                                @else
                                                    <span class="badge bg-info">Thuyết minh</span>
                                                @endif
                                            </td>
                                            <td>{{ $movie->country->title }}</td>

                                            <td>
                                                @foreach ($movie->movie_genre as $genre)
                                                    <span class="badge bg-dark">{{ $genre->title }}</span>
                                                @endforeach

                                            </td>
                                            <td>
                                                @if ($movie->status == 1)
                                                    <span class="badge bg-success">Hiển thị</span>
                                                @else
                                                    <span class="badge bg-danger">Không hiển thị</span>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('add-episode', $movie->id) }}" class="btn btn-info btn-sm">Thêm
                                                    tập</a></td>
                                            <td>
                                                @if ($movie->is_hot == 1)
                                                    <span class="badge bg-success">Có</span>
                                                @else
                                                    <span class="badge bg-danger">Không</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-warning btn-sm me-1"
                                                        href="{{ route('movie.edit', $movie->id) }}">Sửa</a>
                                                    <form action="{{ route('movie.destroy', $movie->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
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
    </div>
    <style>
        select {
    width: 100% !important;
    min-width: 120px;
    max-width: 250px;
}

    </style>
@endsection
