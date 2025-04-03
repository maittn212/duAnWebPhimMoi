@extends('layout')
@section('content')

    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a
                                        href="{{ route('category', $movie->category->slug) }}">{{ $movie->category->title }}</a>
                                    » <span><a
                                            href="">{{ $movie->country->title }}</a>
                                        » <span class="breadcrumb_last"
                                            aria-current="page">{{ $movie->title }}</span></span></span></span></div>
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
                    <style type="text/css">
                        .iframe-phim iframe {
                            width: 100%;
                            height: 500px;
                        }
                    </style>
                    <div class="iframe-phim">
                        {!! $episode->link !!}

                    </div>

                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <div class="title-block">
                        <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                                <div class="halim-pulse-ring"></div>
                            </div>
                        </a>
                        <div class="title-wrapper-xem full">
                            <h1 class="entry-title"><a href="" title="{{ $movie->title }}"
                                    class="tl">{{ $movie->title }} Tập {{ $episode->episode }}</a></h1>
                        </div>
                    </div>
                    <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                        <article id="post-37976" class="item-content post-37976"></article>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div id="halim-ajax-list-server"></div>
                    </div>
                    <div id="halim-list-server">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0"
                                    role="tab" data-toggle="tab"><i class="hl-server"></i>
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
                                </a></li>
                            <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0"
                                    role="tab" data-toggle="tab"><i class="hl-server"></i>
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
                                </a></li>
                        </ul>



                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                                <div class="halim-server">
                                    <ul class="halim-list-eps">
                                        @foreach ($movie->episodes as $key => $soTap)
                                            <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $soTap->episode) }}">
                                                <li class="halim-episode"><span
                                                        class="halim-btn halim-btn-2  {{ $tapphim == $soTap->episode ? 'active' : '' }}  halim-info-1-1 box-shadow"
                                                        data-post-id="37976" data-server="1" data-episode="1"
                                                        data-position="first" data-embed="0"
                                                        data-title="Xem phim {{ $movie->title }}- Tập {{ $soTap->episode }} - {{ $movie->eng_name }} - vietsub + Thuyết Minh"
                                                        data-h1="{{ $movie->title }} - {{ $soTap->episode }}">{{ $soTap->episode }}</span>
                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="htmlwrap clearfix">
                        <div id="lightout"></div>
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
        @include('pages.include.sidebar')
    </div>

@endsection
