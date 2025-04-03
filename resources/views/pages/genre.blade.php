@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $genre_slug->title }}</a> »
                                    <span class="breadcrumb_last" aria-current="page">2020</span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
            
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>{{ $genre_slug->title }}</span></h1>
                </div>
                <div class="section-bar clearfix">
                    <div class="row">
                        <!--Lọc phim-->
                        @include('pages.include.locphim')       
                    </div>
                </div>
                <div class="halim_box">
                    @foreach ($movies as $movie)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie',$movie->slug) }}">
                                    <figure><img class="lazy img-responsive" src="{{ Storage::url($movie->image) }}"
                                            alt="{{ $movie->title }}" title="{{ $movie->title }}"></figure>
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

                                    </span>
                                    <span class="episode">
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
                <div class="clearfix"></div>
                <div class="text-center">
                    {!! $movies->links('pagination::bootstrap-4') !!}

                </div>
            </section>
        </main>
        @include('pages.include.sidebar')
    
    </div>
@endsection
