@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $country_slug->title }}</a> »
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
                    <h1 class="section-title"><span>{{ $country_slug->title }}</span></h1>
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
                                    <figure>
                                        @php
                                        $image_check = substr($movie->image, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img class="lazy img-responsive"  src="{{ $movie->image }}"  alt="{{ $movie->title }}"
                                        title="{{ $movie->title }}">>
                                    @else
                                        <img class="lazy img-responsive"  src="{{ Storage::url($movie->image) }}" alt="{{ $movie->title }}"
                                            title="{{ $movie->title }}">
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
                                        @else
                                            FullHD
                                        @endif
                                    </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span>
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
                    </article>
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {{-- <ul class='page-numbers'>
                <li><span aria-current="page" class="page-numbers current">1</span></li>
                <li><a class="page-numbers" href="">2</a></li>
                <li><a class="page-numbers" href="">3</a></li>
                <li><span class="page-numbers dots">&hellip;</span></li>
                <li><a class="page-numbers" href="">55</a></li>
                <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
             </ul> --}}
                    {!! $movies->links('pagination::bootstrap-4') !!}

                </div>
            </section>
        </main>
        @include('pages.include.sidebar')

    </div>
@endsection
