@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span><span><a
                                        href="{{ route('category', $movie->category->slug) }}">{{ $movie->category->title }}</a>
                                    »
                                    <span><a
                                            href="{{ route('country', $movie->country->slug) }}">{{ $movie->country->title }}</a>
                                        »
                                        @foreach ($movie->movie_genre as $genre)
                                            <a href="{{ route('genre', [$genre->slug]) }}">{{ $genre->title }}</a> »
                                        @endforeach

                                        <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span>
                                    </span>
                                </span>


                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>


                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                @php
                                    $image_check = substr($movie->image, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img class="movie-thumb" src="{{ $movie->image }}" alt="{{ $movie->title }}"
                                        title="{{ $movie->title }}">
                                @else
                                    <img class="movie-thumb" src="{{ Storage::url($movie->image) }}"
                                        alt="{{ $movie->title }}" title="{{ $movie->title }}">
                                @endif

                                @if (isset($firstEpisode) && $firstEpisode->episode)
                                    <div class="bwa-content">
                                        <div class="loader"></div>
                                        <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $firstEpisode->episode) }}"
                                            class="bwac-btn">
                                            <i class="fa fa-play"></i>
                                        </a>

                                    </div>
                                @endif


                                <div class="fb-like" data-href="{{ url()->current() }}" data-width="" data-layout=""
                                    data-action="" data-size="" data-share="true" style="margin-top: 30px;"></div>
                            </div>

                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $movie->title }}</h1>

                                @if ($movie->eng_name !== null)
                                    <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->en }}</h2>
                                @endif
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                            @if ($movie->resolution == 0)
                                                HD
                                            @elseif($movie->resolution == 1)
                                                SD
                                            @elseif ($movie->resolution == 2)
                                                HDCam
                                            @elseif ($movie->resolution == 3)
                                                Cam
                                            @else
                                                FullHD
                                            @endif
                                        </span><span class="episode">
                                            @if ($movie->language_type == 0)
                                                Vietsub
                                            @else
                                                Thuyết minh
                                            @endif
                                        </span></li>
                                    <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> : {{ $movie->time }}</li>
                                    <li class="list-info-group-item">
                                        @if ($movie->movie_type == 0)
                                            <span>Tập phim</span> :
                                            {{ $episodeCurrentListCount }}/{{ $movie->episode_count }} -
                                            @if ($episodeCurrentListCount == $movie->episode_count)
                                                Hoàn thành
                                            @else
                                                Đang cập nhật
                                            @endif
                                        @else
                                            <span>Phim lẻ</span> :
                                            @if ($episodeCurrentListCount == 1)
                                                Đã phát hành
                                            @else
                                                Sắp chiếu
                                            @endif
                                        @endif
                                    </li>

                                    @if ($movie->season != 0)
                                        <li class="list-info-group-item"><span>Mùa: </span> : {{ $movie->season }}</li>
                                    @endif

                                    <li class="list-info-group-item"><span>Thể loại</span> :
                                        @foreach ($movie->movie_genre as $genre)
                                            <a href="{{ route('genre', $genre->slug) }}"
                                                rel="category tag">{{ $genre->title }}</a>
                                        @endforeach

                                    </li>
                                    <li class="list-info-group-item"><span>Danh mục phim</span> :
                                        <a href="{{ route('category', $movie->category->slug) }}"
                                            rel="category tag">{{ $movie->category->title }}</a>
                                    </li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> : <a
                                            href="{{ route('country', $movie->country->slug) }}"
                                            rel="tag">{{ $movie->country->title }}</a>
                                    </li>
                                    <li class="list-info-group-item">
                                        <span>Đánh giá</span>
                                        <ul class="list-inline rating" title="Average Rating">

                                            @for ($count = 1; $count <= 5; $count++)
                                                @php

                                                    if ($count <= $rating) {
                                                        $color = 'color:#ffcc00;'; //mau vang
                                                    } else {
                                                        $color = 'color:#ccc;'; //mau xam
                                                    }

                                                @endphp

                                                <li title="star_rating" id="{{ $movie->id }}-{{ $count }}"
                                                    data-index="{{ $count }}" data-movie_id="{{ $movie->id }}"
                                                    data-rating="{{ $rating }}" class="rating"
                                                    style="cursor:pointer; {{ $color }} 

                                              font-size:30px;">
                                                    &#9733;</li>
                                            @endfor

                                        </ul>
                                    </li>
                                </ul>

                                <style>
                                    .list-info-group-item {
                                        display: flex;
                                        align-items: center;
                                        /* Căn giữa theo chiều dọc */
                                        gap: 10px;
                                        /* Tạo khoảng cách giữa chữ và ngôi sao */
                                    }

                                    .list-inline.rating {
                                        padding: 0;
                                        margin: 0;
                                        list-style: none;
                                        display: flex;
                                        /* Sắp xếp các ngôi sao theo hàng ngang */
                                        gap: 5px;
                                        /* Khoảng cách giữa các ngôi sao */
                                    }

                                    .list-inline.rating li {
                                        font-size: 20px;
                                        /* Điều chỉnh kích thước ngôi sao */
                                        cursor: pointer;
                                    }
                                </style>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>

                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {!! $movie->description !!}
                            </article>
                        </div>
                    </div>
                    <!--Trailer phim-->
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                <iframe width="100%" height="400"
                                    src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                    title="{{ $movie->title }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </article>
                        </div>
                    </div>
                </div>
                <!--Bình luận-->
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    @php
                        $current_url = Request::url();
                    @endphp
                    <div class="video-item halim-entry-box">

                        <article id="post-38424" class="item-content">

                            <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%"
                                data-numposts="10" data-colorscheme="light"></div>

                        </article>
                    </div>
                </div>
            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach ($movie_related as $movie)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $movie->slug) }}"
                                        title="{{ $movie->title }}">
                                        <figure>
                                            @php
                                                $image_check = substr($movie->image, 0, 5);
                                            @endphp
                                            @if ($image_check == 'https')
                                                <img class="lazy img-responsive" src="{{ $movie->image }}"
                                                    alt="{{ $movie->title }}" title="{{ $movie->title }}">
                                            @else
                                                <img class="lazy img-responsive" src="{{ Storage::url($movie->image) }}"
                                                    alt="{{ $movie->title }}" title="{{ $movie->title }}">
                                            @endif
                                        </figure>
                                        <span class="status">
                                            @if ($movie->resolution == 0)
                                                HD
                                            @elseif($movie->resolution == 1)
                                                SD
                                            @elseif ($movie->resolution == 2)
                                                HDCam
                                            @elseif ($movie->resolution == 3)
                                                Cam
                                            @elseif ($movie->resolution == 4)
                                                FullHD
                                            @endif
                                        </span><span class="episode">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                            {{ $movie->episode_current_count ?? 0 }}/{{ $movie->episode_count }}
                                            @if ($movie->language_type == 0)
                                                Vietsub
                                            @else
                                                Thuyết minh
                                            @endif
                                        </span>

                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $movie->title }}</p>
                                                @if ($movie->eng_name !== null)
                                                    <p class="original_title">{{ $movie->eng_name }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach


                    </div>
                    <script>
                        $(document).ready(function($) {
                            var owl = $('#halim_related_movies-2');
                            owl.owlCarousel({
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: ['<i class="hl-down-open rotate-left"></i>',
                                    '<i class="hl-down-open rotate-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 4
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
        @include('pages.include.sidebar')

    </div>
@endsection
