@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 class="section-title"><span>PHIM HOT</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($phimHot as $hot)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}" title="{{ $hot->title }}">
                                <figure>
                                    @php
                                        $image_check = substr($hot->image, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img src="{{ $hot->image }}" alt="{{ $hot->title }}"
                                            title="{{ $hot->title }}">>
                                    @else
                                        <img src="{{ Storage::url($hot->image) }}" alt="{{ $hot->title }}"
                                            title="{{ $hot->title }}">
                                    @endif
                                </figure>
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
            <div class="ad-banners">
                @if ($hotBanners->isNotEmpty())
                    @foreach ($hotBanners as $banner)
                        <div class="ad-banner1">
                            <form action="{{ route('update-click', $banner->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button style="border: none; background: transparent; padding: 0;">
                                    <a href="{{ $banner->url }}" target="_blank">
                                        @php
                                            $image_check = substr($banner->image, 0, 5);
                                        @endphp
                                        @if ($image_check == 'https')
                                            <img src="{{ $banner->image }}" alt="{{ $banner->title }}"
                                                title="{{ $banner->title }}">
                                        @else
                                            <img src="{{ Storage::url($banner->image) }}" alt="{{ $banner->title }}"
                                                title="{{ $banner->title }}">
                                        @endif
                                    </a>
                                </button>
                            </form>
                         
                        </div>
                    @endforeach
                @else
                    <div class="ad-banner">
                        <div class="contact-header">
                            <h2 class="contact-title">🔥 Booking Quảng Cáo 🔥</h2>
                            <p class="contact-description">Đưa thương hiệu của bạn đến với hàng nghìn khách hàng!</p>
                        </div>
                        <div class="advertisement-contact">
                            <div class="contact-body">
                                <a href="mailto:{{ $info->email }}" class="contact-button">Liên Hệ Quảng Cáo</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <style>
                .ad-banners {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            
            .ad-banner1 {
                width: 32%; /* Đảm bảo mỗi banner chiếm 1/3 chiều rộng của container */
                height: 300px; /* Giới hạn chiều cao của banner */
                box-sizing: border-box;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            .ad-banner1 img {
                width: 690px; /* Đảm bảo ảnh chiếm 100% chiều rộng của phần tử */
                height: 180px; /* Đảm bảo ảnh chiếm 100% chiều cao của phần tử */
                object-fit: cover; /* Đảm bảo ảnh không bị méo và cắt phần thừa để khớp với kích thước */
                display: block;
            }
            

                /* Liên hệ quảng cáo */
                .ad-banner {
                    width: 100%;
                    padding: 30px 15px;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    margin: 30px 0;
                }
                .contact-header {
                    background-color: #202b34;
                    text-align: center;
                    padding: 20px;
                    color: #fff;
                }
                .contact-title {

                    font-weight: bold;
                    font-size: 2rem;
                    margin-bottom: 15px;
                }
                .advertisement-contact {
                    background-color: #202b34;

                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .contact-body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    margin-top: 5px;
                }
                .contact-button {
                    background-color: #d30000;
                    color: #fff;
                    padding: 12px 30px;
                    border-radius: 50px;
                    text-decoration: none;
                    font-weight: bold;
                    text-align: center;
                    /* transition:  transform 0.2s ease;  */
                    display: inline-block;
                }
                .contact-button:hover {
                    background-color: #8f0000;
                    color: #fff;
                    transform: translateY(-2px);
                }


                /* Responsive: Chỉnh sửa cho màn hình nhỏ */
                @media (max-width: 768px) {
                    .contact-title {
                        font-size: 1.6rem;
                    }

                    .contact-body p {
                        font-size: 1rem;

                    }

                    .contact-button {
                        padding: 10px 25px;

                    }
                }
            </style>

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
                            .xemThem {
                                position: absolute;
                                right: 0;
                                font-weight: 400;
                                line-height: 21px;
                                text-transform: uppercase;
                                padding: 9px 25px 9px 10x;
                            }
                        </style>
                        <span class="h-text">{{ $category->title }}</span>
                        <a href="{{ route('category', $category->slug) }}" title="Xem thêm" class="xemThem"> <span
                                class="h-text">Xem
                                thêm</span></a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @if ($category->movies->count() > 0)
                            @foreach ($category->movies->take(16) as $movie)
                                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                    <div class="halim-item">
                                        <a class="halim-thumb" href="{{ route('movie', $movie->slug) }}">
                                            <figure>
                                                @php
                                                    $image_check = substr($movie->image, 0, 5);
                                                @endphp
                                                @if ($image_check == 'https')
                                                    <img class="lazy img-responsive" src="{{ $movie->image }}"
                                                        alt="{{ $movie->title }}" title="{{ $movie->title }}">>
                                                @else
                                                    <img class="lazy img-responsive"
                                                        src="{{ Storage::url($movie->image) }}" alt="{{ $movie->title }}"
                                                        title="{{ $movie->title }}">
                                                @endif

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
