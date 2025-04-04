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
                        <table class="table"  id="tablePhim">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Tên chính thức</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Ảnh poster</th>
                                    
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">_Id</th>
                                    <th scope="col">Năm</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resp['items'] as $key=>$res)
                                    <tr>
                                        <th scope="row">{{ $key +1 }}</th>
                                        <td>{{ $res['name'] }}</td>
                                        <td>{{  $res['origin_name'] }}</td>
                                        <td>
                                            <img src="{{ $resp['pathImage'].$res['thumb_url'] }}" height="80" width="90" style="object-fit: cover;">
                                        </td>
                                        <td>
                                            <img src="{{ $resp['pathImage'].$res['poster_url'] }}" height="80" width="90" style="object-fit: cover;">
                                        </td>                                
                                        <td>{{  $res['slug'] }}</td>
                                        <td>{{  $res['_id'] }}</td>
                                        <td>{{  $res['year'] }}</td>
                                        <td>               
                                            <div class="d-flex">
                                                <a href="{{ route('leech-detail', $res['slug']) }}" class="btn btn-info btn-sm mb-3">Xem chi tiết</a>
                                                @php
                                                // dd($res['slug']);
                                                    $movie = App\Models\Movie::where('slug', $res['slug'])->first();
                                                @endphp
                                                @if (!$movie)     
                                                <form action="{{ route('leech-store',$res['slug']) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm mb-3">Thêm phim</button>
                                                </form>
                                                @else
                                                <a href="{{ route('leech-episode', $res['slug']) }}" class="btn btn-success  btn-sm mb-3">Tập phim</a>
                                                <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không?')" title="Xóa">Xóa</button>
                                                </form>
                                                @endif
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
