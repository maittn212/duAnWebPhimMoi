<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>TRENDING</span>
                <ul class="halim-popular-tab" role="tablist">
                    {{-- <li role="presentation" class="active">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="today">Day</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="week">Week</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="month">Month</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($movie_trending as $trending)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $trending->slug) }}" title="{{ $trending->title }}">
                                <div class="item-link">
                                    <img src="{{ Storage::url($trending->image) }}" class="lazy post-thumb"
                                        alt="{{ $trending->title }}" title="{{ $trending->title }}" />
                                    <span class="is_trailer"> <span class="is_trailer">
                                            @if ($trending->resolution == 0)
                                                HD
                                            @elseif($trending->resolution == 1)
                                                SD
                                            @elseif ($trending->resolution == 2)
                                                HDCam
                                            @elseif ($trending->resolution == 3)
                                                Cam
                                            @else
                                                FullHD
                                            @endif
                                        </span>
                                </div>
                                <p class="title">{{ $trending->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">
                                @if ($trending->count_views > 0)
                                    {{ number_format($trending->count_views) }} lượt quan tâm
                                @endif
                            </div>
                            <div class="viewsCount" style="color: #9d9d9d;">
                                {{ $trending->year }}
                            </div>
                            <div class="" style="float: left">
                                <!--Sao-->
                                <ul class="list-inline ration" title="Average Ratin">
                                @for ($count = 1; $count <= 5; $count++)
                                    <li title="star_rating" style="font-size:20px;color:#ffcc00;padding:0"> &#9733;</li>
                                @endfor

                                </ul>
                            </div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Views</span>

            </div>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab"
                    aria-controls="pills-home" aria-selected="true" data-value="1">Ngày</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan"
                    role="tab" aria-controls="pills-profile" aria-selected="false" data-value="2">Tuần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link link filter-sidebar" id="pills-contact-tab" data-toggle="pill" data-value="3"
                    href="#thang" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
        </ul>
        <div id="halim-ajax-popular-post" class="popular-post">

            <span id="show_default"></span>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="ngay" role="tabpanel" aria-labelledby="pills-home-tab">
                <div id="halim-ajax-popular-post" class="popular-post">

                    <span id="show1"></span>
                </div>
            </div>
            <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div id="halim-ajax-popular-post" class="popular-post">

                    <span id="show2"></span>


                </div>
            </div>
            <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div id="halim-ajax-popular-post" class="popular-post">


                    <span id="show3"></span>



                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</aside>
<style>
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
