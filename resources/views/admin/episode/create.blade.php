@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý tập phim
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
                        <form action="{{ route('episode.store') }}" method="POST">
                            @csrf
                            {{-- Nếu có $movie thì ẩn dropdown, hiển thị phim cố định --}}
                            @if (isset($movie))
                                <div class="form-group mb-3">
                                    <label for="movie">Phim</label>
                                    <input type="text" class="form-control" value="{{ $movie->title }}" disabled>
                                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="episode">Tập số</label>
                                    <input type="text" class="form-control" value="{{ $nextEpisode }}" disabled>
                                    <input type="hidden" name="episode" value="{{ $nextEpisode }}">
                                </div>
                            @else
                                <div class="form-group mb-3">
                                    <label for="movie">Phim</label>
                                    <select class="form-control" name="movie_id" id="movie">
                                        <option value="">-- Chọn phim --</option>
                                        @foreach ($movies as $movie)
                                            <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label for="episode">Chọn tập phim</label>
                                    <select class="form-control" name="episode" id="episode" disabled>
                                        <option value="">-- Chọn tập phim --</option>
                                        @foreach ($movies as $movie)
                                            @for ($i = 1; $i <= $movie->episode_count; $i++)
                                                <option value="{{ $i }}" data-movie="{{ $movie->id }}"
                                                    class="episode-option hidden">
                                                    Tập {{ $i }}
                                                </option>
                                            @endfor
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group mb-3">
                                <label for="link">Link phim</label>
                                <input type="text" name="link" id="link" class="form-control" value="">
                            </div>


                                <button class="btn btn-primary">Thêm mới</button>
                                <a href="{{ route('episode.index') }}" class="btn btn-secondary">Quay lại</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


