
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý nguồn phim
                    </div>
                    <div class="card-body">
                       
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên phim</th>
                                    <th scope="col">Đường dẫn phim</th>
                                    <th scope="col">Số tập</th>
                                    <th scope="col">Tập phim</th>
                    
                                    <th scope="col">Link embed</th>
                                    <th scope="col">Link M3u8</th>

                                    
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resp['episodes'] as $key=>$res)
                                    <tr>
                                        <th scope="row">{{ $key +1 }}</th>
                                        <td>{{ $resp['movie']['name'] }}</td>
                                        <td>{{  $resp['movie']['slug'] }}</td>
                                        <td>{{  $resp['movie']['episode_total'] }}</td>

                                        <td>
                                            @foreach ($res['server_data'] as $key=>$server_1 )
                                                <ul>
                                                    <li>Tập {{ $server_1['name'] }}
                                                        <input type="text" class="form-control" value="{{ $server_1['link_embed'] }}" id="">
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($res['server_data'] as $key=>$server_2 )
                                                <ul>
                                                    <li>Tập {{ $server_2['name'] }}
                                                        <input type="text" class="form-control" value="{{ $server_1['link_m3u8'] }}" id="">
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </td>
                                        <td>{{ $res['server_name'] }}</td>
                                        <td>
                                            <form action="{{ route('leech-episode-store', [$resp['movie']['slug']]) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-success btn-sm mb-3">Thêm tập phim</button>
                                            </form>
                                            {{-- <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không?')" title="Xóa">Xóa</button>
                                            </form> --}}
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
