<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="theme-color" content="#234556">
    <meta http-equiv="Content-Language" content="vi" />
    <meta content="VN" name="geo.region" />
    <meta name="DC.language" scheme="utf-8" content="vi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="language" content="Việt Nam">
    <link rel="stylesheet" href="{{ Storage::url($info_home->logo) }}">
    {{-- {!! Flasher::render() !!} --}}

    <link rel="shortcut icon"
        href="{{ Storage::url($info_home->logo) }}"
        type="image/x-icon" />
    <meta name="revisit-after" content="1 days" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>{{ $info_home->title }}</title>
    <meta name="description"
        content="{{ $info_home->description }}" />
    <link rel="canonical" href="{{ Request::url() }}">
    <link rel="next" href="{{ Request::url() }}" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{ $info_home->title }}" />
    <meta property="og:description"
        content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="55" />
    <!-- Sử dụng asset() để liên kết CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome/4.2.0/css/font-awesome.min.css') }}">
    <link rel="dns-prefetch" href="//s.w.org">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all">

    <!-- Sử dụng asset() để liên kết JS -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <style type="text/css" id="wp-custom-css">
        .textwidget p a img {
            width: 100%;
        }
    </style>
    <style>
        #header .site-title {
            /* background: url(https://motchillzz.store/logo.webp) no-repeat top left; */
            background-size: contain;
            text-indent: -9999px;
        }
        .slogan {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
}

.slogan .site-title {
    margin: 0;
    font-size: 18px; /* Điều chỉnh kích thước chữ nếu cần */
    display: flex;
    align-items: center;
}

.slogan img {
    height: 50px; /* Giảm chiều cao ảnh để cân đối với thanh tìm kiếm */
    margin-left: 10px; /* Tạo khoảng cách giữa chữ và ảnh */
}

    </style>
</head>

<body class="home blog halimthemes halimmovies" data-masonry="">
    <header id="header">
        <div class="container">
            <div class="row" id="headwrap">
                <div class="col-md-3 col-sm-6 slogan">
                    <p  class="site-title" ><a class="logo" href="" title="phim hay ">Phim Hay</p>
                        <img src="{{ Storage::url($info_home->logo) }}" style="height:60px">
                    </a>
                </div>
                <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                    <div class="header-nav">
                        <div class="col-xs-12">
                            <form action="{{ route('search') }}" id="search-form-pc" name="halimForm" role="search" method="GET">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        <input id="search" type="text" name="search" class="form-control"
                                            placeholder="Tìm kiếm..." autocomplete="off" value="{{ request('search') }}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-search"></i> Tìm
                                            </button>
                                        </span>
                                        <i class="animate-spin hl-spin4 hidden"></i>
                                    </div>
                                </div>
                            </form>
                            <ul class="ui-autocomplete ajax-results hidden"></ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-xs">
                    <div id="get-bookmark" class="box-shadow"><i class="hl-bookmark"></i><span> Bookmarks</span><span
                            class="count">0</span></div>
                    <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                        <ul style="margin: 0;"></ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="navbar-container">
        <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"
                        data-target="#halim" aria-expanded="false">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right expand-search-form"
                        data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                        <span class="hl-search" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                        Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
                        <span class="count">0</span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">

                    </button>
                </div>
                <div class="collapse navbar-collapse" id="halim">
                    <div class="menu-menu_1-container">
                        <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                            <li class="current-menu-item active"><a title="Trang Chủ"
                                    href="{{ route('homepage') }}">Trang Chủ</a></li>

                            <!--Danh mục-->
                            @foreach ($categories as $category)
                                <li class="mega"><a title="{{ $category->title }}"
                                        href="{{ route('category', $category->slug) }}">{{ $category->title }}</a></li>
                            @endforeach
                        
                            </li>
                            <li class="mega dropdown">
                                <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @foreach ($genres as $genre)
                                        <li><a title="{{ $genre->title }}"
                                                href="{{ route('genre', $genre->slug) }}">{{ $genre->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="mega dropdown">
                                <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @foreach ($countries as $country)
                                        <li><a title="{{ $country->title }}"
                                                href="{{ route('country', $country->slug) }}">{{ $country->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="mega dropdown">
                                <a title="Năm phát hành" href="#" data-toggle="dropdown"
                                    class="dropdown-toggle" aria-haspopup="true">Năm phát hành<span
                                        class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @for ($year = 2000; $year <= 2025; $year++)
                                        <li>
                                            <a title="{{ $year }}"
                                                href="{{ url('nam/' . $year) }}">{{ $year }}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </li>

                            <li class="mega dropdown">
                                <a title="Tài khoản" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                                    @if(Auth::check())
                                        Tài khoản: {{ Auth::user()->name }}
                                    @else
                                        Tài khoản: Khách
                                    @endif
                                    <span class="caret"></span>
                                </a>
                                <ul role="menu" class="dropdown-menu">
                                    @if(Auth::check())
                                        <li><a href="{{ route('logout-home') }}">Đăng xuất</a></li>
                                    @else
                                        <li><a href="{{ route('login-by-google') }}">Đăng nhập Google</a></li>
                                    @endif
                                </ul>
                            </li>
                            
                            
                        </ul>
                    </div>
                    {{-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                        <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                    </ul> --}}
                </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
                <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
                <div id="mobile-user-login"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row fullwith-slider"></div>
    </div>
    <div class="container">
        @yield('content')
        @include('pages.include.banner')

    </div>
    <script>
      $(window).on('load', function(){
        $('#bannerQC').modal('show');
      })
    </script>
    <div class="clearfix"></div>

    <footer id="footer" class="clearfix">
        <div class="container footer-columns">
            <div class="row container">
                <div class="widget about col-xs-12 col-sm-4 col-md-4">
                    <div class="footer-logo">
                        <img class="img-responsive"
                            src="{{ Storage::url($info_home->logo) }}"
                            alt="Phim hay 2025 - Xem phim hay nhất"  />
                    </div>
                    {{-- Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                        data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;protected]</a> --}}
                </div>
                <div class="widget about col-xs-12 col-sm-4 col-md-8">
                    <div class="footer-logo">
                        <p>Email: {{$info_home->email }}</p>
                        <p>Số điện thoại: {{$info_home->phone }}</p>
                        <p>Mô tả: {{$info_home->description }}</p>


                    </div>
                    {{-- Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                        data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;protected]</a> --}}
                </div>

            </div>
        </div>
    </footer>
    <div id='easy-top'></div>

    <script type='text/javascript' src='{{ asset('js/bootstrap.min.js?ver=5.7.2') }}'></script>
    <script type='text/javascript' src='{{ asset('js/owl.carousel.min.js?ver=5.7.2') }}'></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v22.0">
    </script>
    <script type='text/javascript' src='{{ asset('js/halimtheme-core.min.js?ver=1626273138') }}'></script>
    
    <script type="text/javascript">
        
         function remove_background(movie_id)
           {
            for(var count = 1; count <= 5; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ccc');
            }
          }

          //hover chuột đánh giá sao
         $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
          // alert(index);
          // alert(movie_id);
            remove_background(movie_id);
            for(var count = 1; count<=index; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
          });
         //nhả chuột ko đánh giá
         $(document).on('mouseleave', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
            var rating = $(this).data("rating");
            remove_background(movie_id);
            //alert(rating);
            for(var count = 1; count<=rating; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
           });

          //click đánh giá sao
       
              
              
                
          $(document).on('click', '.rating', function(){
    var index = $(this).data("index");
    var movie_id = $(this).data('movie_id');

    $.ajax({
        url: "{{route('add-rating')}}",
        method: "POST",
        data: { 
            rating: index, 
            movie_id: movie_id 
        },
        headers: { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },
        success: function(data) {
            if (data == 'done') {
                alert("Bạn đã đánh giá phim " + index + " trên 5 sao");
                location.reload();
            } else if (data == 'exist') {
                alert("Bạn đã đánh giá phim này rồi, cảm ơn bạn nhé");
            } else {
                alert("Lỗi đánh giá");
            }
        }
    });
});


     
      </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Load danh sách mặc định
            $.ajax({
                url: "{{ url('/filter-topview-default') }}",
                method: 'GET',
                success: function(data) {
                    $('#show_default').html(data);
                }
            });

            // Click để lọc theo ngày, tuần, tháng
            $('.filter-sidebar').click(function() {
                var value = $(this).data('value'); // Lấy giá trị từ data-value

                $.ajax({
                    url: "{{ url('/filter-topview-phim') }}",
                    method: 'GET',
                    data: {
                        value: value
                    },
                    success: function(data) {
                        $('#show_default').html(data);
                    }
                });
            });
        });
    </script>
    <style>
        

        #overlay_mb {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer
        }

        #overlay_mb .overlay_mb_content {
            position: relative;
            height: 100%
        }

        .overlay_mb_block {
            display: inline-block;
            position: relative
        }

        #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center
        }

        #overlay_mb .overlay_mb_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7)
        }

        #overlay_mb img {
            position: relative;
            z-index: 999
        }

        @media only screen and (max-width: 768px) {
            #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
                width: 400px;
                top: 3%;
                transform: translate(-50%, 3%)
            }
        }

        @media only screen and (max-width: 400px) {
            #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
                width: 310px;
                top: 3%;
                transform: translate(-50%, 3%)
            }
        }
    </style>

    <style>
        #overlay_pc {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer;
        }

        #overlay_pc .overlay_pc_content {
            position: relative;
            height: 100%;
        }

        .overlay_pc_block {
            display: inline-block;
            position: relative;
        }

        #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        #overlay_pc .overlay_pc_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7);
        }

        #overlay_pc img {
            position: relative;
            z-index: 999;
        }

        @media only screen and (max-width: 768px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
                width: 400px;
                top: 3%;
                transform: translate(-50%, 3%);
            }
        }

        @media only screen and (max-width: 400px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
                width: 310px;
                top: 3%;
                transform: translate(-50%, 3%);
            }
        }
    </style>

    <style>
        
        .float-ck {
            position: fixed;
            bottom: 0px;
            z-index: 9
        }

        * html .float-ck

        /* IE6 position fixed Bottom */
            {
            position: absolute;
            bottom: auto;
            top: expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop, 10)||0)-(parseInt(this.currentStyle.marginBottom, 10)||0)));
        }

        #hide_float_left a {
            background: #0098D2;
            padding: 5px 15px 5px 15px;
            color: #FFF;
            font-weight: 700;
            float: left;
        }

        #hide_float_left_m a {
            background: #0098D2;
            padding: 5px 15px 5px 15px;
            color: #FFF;
            font-weight: 700;
        }

        span.bannermobi2 img {
            height: 70px;
            width: 300px;
        }

        #hide_float_right a {
            background: #01AEF0;
            padding: 5px 5px 1px 5px;
            color: #FFF;
            float: left;
        }
    </style>
    

</body>

</html>
