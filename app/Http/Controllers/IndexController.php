<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Info;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// $category_home = Category::with('movie')->orderBy('id','desc')->where('status',1)->get();

class IndexController extends Controller
{
    public function home(Request $request)
    {
        $banners = DB::table('banners')->where('status', 1)->orderBy('id', 'desc')->get();
        $bannerModal = $banners->where('position', 0)->first();
        $hotBanners= $banners->where('position', [1,2,3])->take(3);

        $info = Info::find(1);
        $title = $info->title;
        $description = $info->description;

        $phimHot = Movie::withCount(['episodes as episode_count_current'])->where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->get();
        $movie_trending = Movie::where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $genres = Genre::where('status', 1)->orderBy('id', 'desc')->get();
        $countries = Country::where('status', 1)->orderBy('id', 'desc')->get();
        $category_home = Category::with(['movies' => function ($query) {
            $query->withCount(['episodes as episode_current_count']);
        }])->where('status', 1)->orderBy('id', 'desc')->get();

        return view('pages.home', compact('title','description','info','phimHot', 'categories', 'genres', 'countries', 'category_home', 'movie_trending'));
    }
    public function search(Request $request)
    {
        $phimHot = DB::table('movies')->select('*')->where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->get();
        $movie_trending = DB::table('movies')->select('*')->where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $phimhot = DB::table('movies')->select('*')->where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();

        $categories  = DB::table('categories')->orderBy('id', 'desc')->where('status', '=', 1)->get();
        $genres  = DB::table('genres')->orderBy('id', 'desc')->where('status', '=', 1)->get();
        $countries  = DB::table('countries')->orderBy('id', 'desc')->where('status', '=', 1)->get();
        // Xử lý tìm kiếm
        $keyword = $request->input('search');
        $searchResults = [];

        if (!empty($keyword)) {
            $searchResults = DB::table('movies')
                ->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('eng_name', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }
        return view('pages.search', compact('phimHot', 'categories', 'genres', 'countries', 'movie_trending', 'searchResults', 'keyword'));
    }
    public function locphim()
    {
        $order = $_GET['order'] ?? '';
        $genre = $_GET['genre'] ?? '';
        $country = $_GET['country'] ?? '';
        $year = $_GET['year'] ?? '';

        if ($order == '' && $genre == '' && $country == '' && $year == '') {
            return redirect()->back();
        } else {
            $categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
            $genres = Genre::orderBy('id', 'desc')->where('status', 1)->get();
            $countries = Country::orderBy('id', 'desc')->where('status', 1)->get();
            $movie_trending = Movie::where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();


            // Query phim
            $movies = Movie::with(['movie_genre', 'episodes'])
                ->where('status', 1)
                ->withCount('episodes as episode_current_count');

            // Nếu lọc theo thể loại, kiểm tra trong bảng trung gian
            if ($genre) {
                $movies->whereHas('movie_genre', function ($query) use ($genre) {
                    $query->where('genre_id', $genre);
                });
            }

            if ($country) {
                $movies->where('country_id', $country);
            }

            if ($year) {
                $movies->where('year', $year);
            }

            if ($order) {
                $movies->orderBy($order, 'desc');
            } else {
                $movies->orderBy('created_at', 'desc');
            }

            // Phân trang
            $movies = $movies->paginate(20);

            return view('pages.locphim', compact('categories', 'genres', 'countries', 'movies', 'movie_trending'));
        }
    }


    public function category($slug)
    {
        $movie_trending = Movie::where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $genres = Genre::where('status', 1)->orderBy('id', 'desc')->get();
        $countries = Country::where('status', 1)->orderBy('id', 'desc')->get();

        // Lấy thông tin danh mục
        $cate_slug = Category::where('slug', $slug)->firstOrFail();

        // Lấy danh sách phim thuộc danh mục này và đếm số tập phim
        $movies = Movie::withCount(['episodes as episode_current_count'])
            ->where('category_id', $cate_slug->id)
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(40);

        return view('pages.category', compact('categories', 'genres', 'countries', 'cate_slug', 'movies', 'movie_trending'));
    }

    public function year($year)
    {
        $movie_trending = Movie::where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $genres = Genre::where('status', 1)->orderBy('id', 'desc')->get();
        $countries = Country::where('status', 1)->orderBy('id', 'desc')->get();

        // Lấy danh sách phim theo năm và đếm số tập hiện tại
        $movies = Movie::withCount(['episodes as episode_current_count'])
            ->where('year', $year)
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(40);

        return view('pages.year', compact('categories', 'genres', 'countries', 'movies', 'year', 'movie_trending'));
    }

    public function genre($slug)
    {
        $movie_trending = Movie::where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $categories = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $genres = Genre::where('status', 1)->orderBy('id', 'desc')->get();
        $countries = Country::where('status', 1)->orderBy('id', 'desc')->get();

        // Lấy thông tin thể loại
        $genre_slug = Genre::where('slug', $slug)->firstOrFail();

        // Lấy danh sách phim thuộc thể loại này
        $movies = Movie::withCount(['episodes as episode_current_count'])
            ->whereHas('genres', function ($query) use ($genre_slug) {
                $query->where('genres.id', $genre_slug->id);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(40);

        return view('pages.genre', compact('categories', 'genres', 'countries', 'genre_slug', 'movies', 'movie_trending'));
    }

    public function country($slug)
    {
        $movie_trending = DB::table('movies')->select('*')->where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $categories  = DB::table('categories')->orderBy('id', 'desc')->where('status', '=', 1)->get();
        $genres  = DB::table('genres')->orderBy('id', 'desc')->where('status', '=', 1)->get();
        $countries  = DB::table('countries')->orderBy('id', 'desc')->where('status', '=', 1)->get();
        $country_slug = DB::table('countries')->where('slug', '=', $slug)->first();
        $movies = DB::table('movies')->select('*')->where('country_id', $country_slug->id)->where('status', 1)->orderBy('updated_at', 'desc')->paginate(40);

        return view('pages.country', compact('categories', 'genres', 'countries', 'country_slug', 'movies', 'movie_trending'));
    }
    public function movie($slug)
    {
        $movie_trending = Movie::where('is_hot', 1)
            ->where('status', 1)
            ->latest('updated_at')
            ->take(15)
            ->get();
        $categories  = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $countries = Country::orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        // dd($movie->toArray());

        $firstEpisode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'asc')->take(1)->first();

        // tổng tập phim hiện tại
        $episodeCurrentList = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episodeCurrentListCount = $episodeCurrentList->count();

        $movie_related = Movie::where('status', 1)
            ->where('id', '!=', $movie->id)
            ->whereHas('movie_genre', function ($query) use ($movie) {
                $query->where('genre_id', $movie->genre_id);
            })
            ->withCount(['episodes as episode_current_count'])
            ->inRandomOrder()
            ->take(10)
            ->get();

        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id')->count();
        // tănng view movie
        $count_views = $movie->count_views;
        $count_views = $count_views + 1;
        $movie->count_views = $count_views;
        $movie->save();

        return view('pages.movie', compact('episodeCurrentListCount', 'categories', 'genres', 'countries', 'movie', 'movie_related', 'movie_trending', 'firstEpisode', 'rating', 'count_total'));
    }
    public function addRating(Request $request)
    {
        $data = $request->all();
        $ip_address = $request->ip();
        $rating_count = Rating::where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if ($rating_count > 0) {
            echo 'exist';
        } else {

            Rating::create([
                'movie_id' => $data['movie_id'],
                'rating' => $data['rating'],
                'ip_address' => $ip_address,
            ]);
            echo 'done';
        }
    }
    public function watch($slug, $tap)
    {
        $movie_trending = DB::table('movies')->select('*')->where('is_hot', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $categories  = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $countries = Country::orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();

        $movie = Movie::with('category', 'movie_genre', 'genre', 'country', 'episodes', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
           $movie_related = Movie::where('status', 1)
            ->where('id', '!=', $movie->id)
            ->whereHas('movie_genre', function ($query) use ($movie) {
                $query->where('genre_id', $movie->genre_id);
            })
            ->withCount(['episodes as episode_current_count'])
            ->inRandomOrder()
            ->take(10)
            ->get();

        // dd($movie->category->slug);
        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 1);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 1;
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        }

        return view('pages.watch', compact('movie_related','episode', 'movie_trending', 'categories', 'countries', 'genres', 'movie', 'tapphim'));
    }
    public function filterTopview(Request $request)
    {
        $data = $request->all();
        $movies = DB::table('movies')->where('top_view', $data['value'])->orderBy('updated_at', 'desc')->take(15)->get();
    
        $output = '';
    
        if ($movies->count() > 0) {
            foreach ($movies as $mov) {
                if ($mov->resolution == 0) {
                    $text = 'SD';
                } elseif ($mov->resolution == 1) {
                    $text = 'HD';
                } elseif ($mov->resolution == 2) {
                    $text = 'HDCam';
                } else {
                    $text = 'Cam';
                }
    
                $image_check = substr($mov->image, 0, 5); // Check the start of the image URL
    
                // If the image URL starts with 'https', use the URL directly. Otherwise, use Storage URL.
                if ($image_check == 'https') {
                    $image_url = $mov->image; // Image from API
                } else {
                    $image_url = Storage::url($mov->image); // Image from local storage
                }
    
                $output .= '<div class="item post-37176">
                    <a href="' . url('phim/' . $mov->slug) . '" title="' . $mov->title . '">
                        <div class="item-link">
                            <img src="' . $image_url . '" class="lazy post-thumb" 
                                alt="' . $mov->title . '" title="' . $mov->title . '" />
                            <span class="is_trailer">' . $text . '</span>
                        </div>
                        <p class="title">' . $mov->title . '</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">';
    
                if ($mov->count_views > 0) {
                    $output .= number_format($mov->count_views) . ' lượt quan tâm';
                }
    
                $output .=    '</div>
                    <div class="viewsCount" style="color: #9d9d9d;">' . $mov->year . '</div>
                    <div class="" style="float: left">
                        <ul class="list-inline ration" title="Average Rating">';
                for ($count = 1; $count <= 5; $count++) {
                    $output .= '<li title="star_rating" style="font-size:20px;color:#ffcc00;padding:0"> &#9733;</li>';
                }
                $output .=    '</ul>
                    </div>
                </div>';
            }
        } else {
            $output = '<p class="text-center">Không có dữ liệu</p>';
        }
    
        echo $output;
    }
    public function filterTopviewDefault(Request $request)
    {
        $data = $request->all();
        $movie = DB::table('movies')->where('top_view', 1)->orderBy('updated_at', 'desc')->take(15)->get();
        $output = '';
        foreach ($movie as $mov) {
            if ($mov->resolution == 0) {
                $text = 'SD';
            } elseif ($mov->resolution == 1) {
                $text = 'HD';
            } elseif ($mov->resolution == 2) {
                $text = 'HDCam';
            } else {
                $text = 'Cam';
            }
            $output .= '<div class="item post-37176">
            <a href="' . url('phim/' . $mov->slug) . '" title="' . $mov->title . '">
                <div class="item-link">
                    <img src="' . Storage::url($mov->image) . '"
                        class="lazy post-thumb" alt="' . $mov->title . '"
                        title="' . $mov->title . '" />
                    <span class="is_trailer">' . $text . '</span>
                </div>
                <p class="title">' . $mov->title . '</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                </span>
            </div>
        </div> ';
        }
        echo $output;
    }
    public function episode($slug)

    {
        $movie = Movie::with('category', 'movie_genre', 'genre', 'country', 'episodes', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $movie_related = Movie::where('status', 1)
         ->where('id', '!=', $movie->id)
         ->whereHas('movie_genre', function ($query) use ($movie) {
             $query->where('genre_id', $movie->genre_id);
         })
         ->withCount(['episodes as episode_current_count'])
         ->inRandomOrder()
         ->take(10)
         ->get();
        return view('pages.episode',compact('movie','movie_related'));
    }
    public function updateClick(Request $request, $id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $banner->click_count += 1;
            $banner->save();
            return redirect()->to($banner->url);
        }
        return redirect()->back();
    }
}
