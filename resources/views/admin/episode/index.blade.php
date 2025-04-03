@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-4 text-center fw-bold fs-3 bg-primary text-white shadow-lg rounded-pill">
                        Quản lý tập phim
                    </div>

                    <div class="card-body" >
                        <a href="{{ route('episode.create') }}" class="btn btn-success btn-sm mb-3">Thêm mới</a>
                        <div class="table-responsive">
                        <table class="table" id="tablePhim">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên phim</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tập phim</th>
                                    <th scope="col">Link phim</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($episodes as $episode)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $episode->movie->title }}</td>
                                        <td><img src="{{ Storage::url($episode->movie->image) }}" width="100"></td>
                                        <td>
                                           {{ $episode->episode }}
                                        </td>
                                        <td>
                                            {{-- {!! str_replace('<iframe', '<iframe width="200" height="100"', $episode->link) !!} --}}
                                            {{  $episode->link }}

                                        </td>                                        
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-warning btn-sm me-1" href="{{ route('episode.edit', $episode->id) }}" title="Sửa">Sửa</a>
                                                <form action="{{ route('episode.destroy', $episode->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không?')" title="Xóa">Xóa</button>
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
@endsection
