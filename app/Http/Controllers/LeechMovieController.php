<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeechMovieController extends Controller
{
    public function leech_movie()
    {
        $resp = Http::get('https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1')->json();
        return view('admin.leech.index', compact('resp'));
    }
    public function leech_episode($slug)
    {
        $resp = Http::get('https://ophim1.com/phim/' . $slug)->json();
        // $resp_movie[] = $resp['movie'];
        return view('admin.leech.leechEpisode', compact('resp'));
    }
    public function leech_store(Request $request, string $slug)
    {
        $resp = Http::get('https://ophim1.com/phim/' . $slug)->json();
        $resp_movie[] = $resp['movie'];
        // dd($resp_movie);
        $movie = new Movie();
    
        foreach ($resp_movie as $res) {
            $movie->title = $res['name'];
            $movie->trailer = $res['trailer_url'];
            $movie->episode_count = $res['episode_total'];
            $movie->time = $res['time'];
            $movie->language_type = 0;
            $movie->resolution = 0;
            $movie->eng_name = $res['origin_name'];
            $movie->slug = $res['slug'];
            $movie->category_id = 1;
            $movie->year = $res['year'];

            

    
            $movie->is_hot = 0;
            $movie->description = $res['content'];
            $movie->status = 1;
    
            // Thêm thể loại nếu chưa có
            $genre = Genre::firstOrCreate([
                'title' => $res['category'][0]['name'], // Lấy tên thể loại từ phản hồi
                'slug' => $res['category'][0]['slug'],  // Lấy slug thể loại từ phản hồi
                'status' => 1
            ]);
            $movie->genre_id = $genre->id;
    
            // Thêm quốc gia nếu chưa có trong bảng countries

            $country = Country::firstOrCreate([
                'title' => $res['country'][0]['name'],  // Lấy tên quốc gia từ phản hồi
                'slug' => $res['country'][0]['slug'],   // Lấy slug quốc gia từ phản hồi
                'status' => 1

            ]);
            $movie->country_id = $country->id;
    
            $movie->movie_type = 1;
            $movie->count_views = 0;
            $movie->created_at = now();
            $movie->updated_at = now();
            $movie->image = $res['thumb_url'];
    
            // Lấy thể loại để attach sau
            // $genre = Genre::orderBy('id', 'DESC')->first();
            // $movie->genre_id = $genre->id;
            $movie->save();
    
            $movie->movie_genre()->attach($genre);
    
            // Thêm diễn viên vào bảng actors và liên kết với movie_id
            foreach ($res['actor'] as $actorName) {
                Actor::firstOrCreate([
                    'name' => $actorName,
                    'movie_id' => $movie->id // Lưu trực tiếp movie_id vào actors
                ]);
            }
    
            flash()->success('Thêm phim thành công!');
    
            return redirect()->back();
        }
    }
    
    public function leech_episode_store(Request $request, $slug)
    {
        // Lấy thông tin phim từ database
        $movie = Movie::where('slug', $slug)->first();

        // Kiểm tra nếu phim không tồn tại
        if (!$movie) {
            flash()->error('Phim không tồn tại!');
            return redirect()->back();
        }

        // Lấy thông tin các tập phim từ API
        $resp = Http::get('https://ophim1.com/phim/' . $slug)->json();

        foreach ($resp['episodes'] as $key => $res) {
            foreach ($res['server_data'] as $key_data => $res_data) {

                // Kiểm tra xem tập phim này đã có trong database chưa
                $existing_episode = Episode::where('movie_id', $movie->id)
                    ->where('episode', $res_data['name'])
                    ->first();

                // Nếu tập phim chưa có, thêm mới
                if (!$existing_episode) {
                    $ep = new Episode();
                    $ep->movie_id = $movie->id;
                    $ep->link = '<p><iframe src="' . $res_data['link_embed'] . '" frameborder="0"></iframe></p>';
                    $ep->episode = $res_data['name'];
                    $ep->created_at = now();
                    $ep->updated_at = now();
                    $ep->save();
                }
            }
        }

        flash()->success('Thêm tập phim thành công!');
        return redirect()->back();
    }

    public function leech_detail($slug)
    {
        $resp = Http::get('https://ophim1.com/phim/' . $slug)->json();
        $resp_movie[] = $resp['movie'];
        return view('admin.leech.leechDetail', compact('resp_movie'));
    }
}
