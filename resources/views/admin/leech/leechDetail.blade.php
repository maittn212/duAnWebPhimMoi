@extends('layouts.app')

@section('title', 'Chi Tiết Phim')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý nguồn phim
                    </div>
                    <div class="card-body">
                        @foreach ($resp_movie as $resp)
                           <div class="row mb-3">
                            <h2 class="movie-title text-primary font-weight-bold text-center">{{ $resp['name'] }}
                            </h2>
                            <p class="movie-origin-name text-muted text-center"><strong>
                                </strong>{{ $resp['origin_name'] }}</p>
                           </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="movie-image mb-4">
                                        <img src="{{ $resp['thumb_url'] }}" alt="{{ $resp['name'] }}"
                                            class="img-fluid rounded" width="300" height="400">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <p><strong>Số tập hiện tại: </strong>{{ $resp['episode_current'] }}</p>
                                    <p><strong>Tổng số tập: </strong>{{ $resp['episode_total'] }}</p>
                                    <p><strong>Thời gian: </strong>{{ $resp['time'] }}</p>
                                    <p><strong>Thể loại: </strong>{{ $resp['category'][0]['name'] ?? 'Chưa xác định' }}</p>

                                    <p><strong>Trạng thái: </strong>{{ $resp['status'] }}</p>
                                    <p><strong>Năm xuất bản: </strong>{{ $resp['year'] }}</p>
                                    <p><strong>Độ phân giải: </strong>{{ $resp['quality'] }}</p>
                                    <p><strong>Ngôn ngữ: </strong>{{ $resp['lang'] }}</p>

                                    <p><strong>Diễn viên: </strong>
                                        @foreach ($resp['actor'] as $actor)
                                        {{ $actor }}@if (!$loop->last), @endif
                                        @endforeach
                                    </p>
                                    <p><strong>Đạo diễn: </strong>{{ $resp['director'][0] ?? 'Chưa xác định' }}</p>
                                    <p><strong>Quốc gia: </strong>{{ $resp['country'][0]['name'] ?? 'Chưa xác định' }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h3 class="text-primary font-weight-bold mb-3 description">Nội dung phim</h3>
                                    <p>{!! $resp['content'] !!}</p>
                                </div>
                            </div>
                            <div class="row">
                        <a href="{{ route('leech-movie', $resp['slug']) }}" class="btn btn-secondary">Quay lại</a>

                            </div>
                        @endforeach

                    </div>
                </div>
            <style>
                p{
                    margin-bottom: 0.5rem;
                }
            </style>

 @endsection

