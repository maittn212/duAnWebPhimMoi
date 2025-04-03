@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        {{-- <div class="col-xs-12 carausel-sliderWidget">
            <section id="halim-advanced-widget-4">
                <div class="section-heading">
                    <a href="danhmuc.php" title="Phim Chiếu Rạp">
                        <span class="h-text">Phim Chiếu Rạp</span>
                    </a>
                    <ul class="heading-nav pull-right hidden-xs">
                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                            data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span>
                        </li>
                    </ul>
                </div>
                <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                    <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie') }}" title="GÓA PHỤ ĐEN">
                                <figure><img class="lazy img-responsive"
                                        src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg"
                                        alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                                <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                        aria-hidden="true"></i>Vietsub</span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">GÓA PHỤ ĐEN</p>
                                        <p class="original_title">Black Widow</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                </div>
            </section>
            <div class="clearfix"></div>
        </div> --}}
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 class="section-title"><span>PHIM HOT</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($phimHot as $hot)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}" title="{{ $hot->title }}">
                                <figure><img class="lazy img-responsive" src="{{ Storage::url($hot->image) }}"
                                        alt="{{ $hot->title }}" title="{{ $hot->title }}"></figure>
                                <span class="status">
                                    @if ($hot->resolution == 0)
                                        HD
                                    @elseif($hot->resolution == 1)
                                        SD
                                    @elseif ($hot->resolution == 2)
                                        HDCam
                                    @elseif ($hot->resolution == 3)
                                        Cam
                                    @else
                                        FullHD
                                    @endif
                                </span>
                                <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    {{ $hot->episode_count_current }}/{{ $hot->episode_count }}
                                    @if ($hot->language_type == 0)
                                        Vietsub
                                        @if ($hot->season != 0)
                                            - Season {{ $hot->season }}
                                        @endif
                                    @else
                                        Thuyết minh
                                        @if ($hot->season != 0)
                                            - Season {{ $hot->season }}
                                        @endif
                                    @endif
                                </span>

                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{ $hot->title }}</p>
                                        @if ($hot->eng_name !== null)
                                            <p class="original_title">{{ $hot->eng_name }}</p>
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
                        margin: 5,
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
                                items: 5
                            },
                            1000: {
                                items: 5
                            }
                        }
                    })
                });
            </script>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach ($category_home as $category)
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <style>
                            .xemThem{
                                position: absolute;
                                right: 0;
                                font-weight: 400;
                                line-height: 21px;
                                text-transform: uppercase;
                                padding: 9px 25px 9px 10x;
                            }
                        </style>
                        <span class="h-text">{{ $category->title }}</span>
                        <a href="{{ route('category', $category->slug) }}" title="Xem thêm" class="xemThem"> <span class="h-text">Xem
                                thêm</span></a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @if ($category->movies->count() > 0)
                            @foreach ($category->movies->take(16) as $movie)
                                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                    <div class="halim-item">
                                        <a class="halim-thumb" href="{{ route('movie', $movie->slug) }}">
                                            <figure>
                                                <img class="lazy img-responsive" src="{{ Storage::url($movie->image) }}"
                                                    alt="{{ $movie->title }}" title="{{ $movie->title }}">
                                            </figure>
                                            <span class="status">
                                                @if ($movie->resolution == 0)
                                                    HD
                                                @elseif($movie->resolution == 1)
                                                    SD
                                                @elseif($movie->resolution == 2)
                                                    HDCam
                                                @elseif($movie->resolution == 3)
                                                    Cam
                                                @else
                                                    FullHD
                                                @endif
                                            </span>
                                            <span class="episode">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                                {{ $movie->episode_current_count }}/{{ $movie->episode_count }}
                                                @if ($movie->language_type == 0)
                                                    Vietsub
                                                    @if ($movie->season != 0)
                                                        - Season {{ $movie->season }}
                                                    @endif
                                                @else
                                                    Thuyết minh
                                                    @if ($movie->season != 0)
                                                        - Season {{ $movie->season }}
                                                    @endif
                                                @endif
                                            </span>
                                            <div class="icon_overlay"></div>
                                            <div class="halim-post-title-box">
                                                <div class="halim-post-title">
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
                        @else
                            <p>Không có phim thuộc danh mục này</p>
                        @endif
                    </div>
                </section>
                <div class="clearfix"></div>
            @endforeach
        </main>

        @include('pages.include.sidebar')
    </div>
@endsection
