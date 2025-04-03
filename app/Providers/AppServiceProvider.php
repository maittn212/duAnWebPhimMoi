<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Info;
use App\Models\Movie;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // thống kê trang admin
        $category_total = Category::all()->count();
        $genre_total = Genre::all()->count();
        $country_total = Country::all()->count();
        $movie_total = Movie::all()->count();
        $top_movies = Movie::orderBy('count_views','desc')->take(10)->get();
        $new_movies = Movie::orderBy('created_at','desc')->take(5)->get();
        $total_views = Movie::sum('count_views');
        $info_home = Info::find(1);


        View::share([
            'category_total' => $category_total,
            'genre_total' => $genre_total,
            'country_total' => $country_total,
            'movie_total' => $movie_total,
            'top_movies' => $top_movies,
            'new_movies' => $new_movies,
            'total_views' => $total_views,

            'info_home' =>$info_home,
        ]);
        Paginator::useBootstrapFive();
    }
}
