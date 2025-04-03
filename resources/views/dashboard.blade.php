@extends('layouts.app')
@section('content')
<style>
    .recent-movie-item {
    display: flex;
    align-items: center;
    gap: 12px; 
    padding: 10px;
}

.recent-movie-img {
    width: 60px;
    height: 90px;
    object-fit: cover;
    border-radius: 5px; 
    flex-shrink: 0; 
}

.recent-movie-info {
    flex-grow: 1; 
    font-size: 14px;
}

.recent-movie-info strong {
    font-size: 16px;
}

</style>
<div class="main-page">
    <div class="col_3">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-tags icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $category_total }}</strong></h5>
                    <span>Danh mục phim</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-tv user1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $genre_total }}</strong></h5>
                    <span>Thể loại phim</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-globe user2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $country_total }}</strong></h5>
                    <span>Quốc gia phim</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-film dollar1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ $movie_total }}</strong></h5>
                    <span>Phim</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ number_format($total_views) }}</strong></h5>
                    <span>Lượt quan tâm</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row-one widgettable">


    </div>
    <!-- for amcharts js -->
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablePhim').DataTable();
        });
    </script>
    <script src="{{ asset('backend/js/amcharts.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/export.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/css/export.css') }}" type="text/css" media="all" />
    <script src="{{ asset('backend/js/light.js') }}"></script>
    <!-- for amcharts js -->
    <script src="{{ asset('backend/js/index1.js') }}"></script>

</div>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Top Phim Được Xem Nhiều Nhất</h3>
            </div>
            <div class="panel-body">
                <table id="topMoviesTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Phim</th>
                            <th>Lượt Xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($top_movies as $index => $movie)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $movie->title }}</td>
                                <td>{{ number_format($movie->count_views) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Phim Gần Đây</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach ($new_movies as $movie)
                        <li class="list-group-item recent-movie-item">
                            <!-- Ảnh poster bên trái -->
                            <img src="{{ Storage::url($movie->image) }}" alt="{{ $movie->title }}" class="recent-movie-img">
                            
                            <!-- Thông tin phim bên phải -->
                            <div class="recent-movie-info">
                                <strong>{{ $movie->title }}</strong><br>
                                <small class="text-muted">{{ number_format($movie->count_views) }} lượt quan tâm</small><br>
                                <small class="text-muted">Cập nhật ngày: {{ $movie->updated_at->format('d/m/Y') }}</small>

                            </div>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </div>                   
        </div>
    </div>
    
    
    
    
</div>
@endsection