<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episodes = Episode::with('movie')->orderBy('movie_id', 'desc')->get();
        return view('admin.episode.index', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::orderBy('id', 'desc')->get();
        return view('admin.episode.create', compact('movies'));
    }

    public function addEpisode($id)
    {
        $movie = Movie::where('id', $id)->first();

        $currentEpisodeCount = $movie->episodes()->count();
         // Nếu số tập hiện tại đã đạt hoặc vượt quá số tập phim, không cho thêm tập mới
         if($currentEpisodeCount >= $movie->episode_count){
        flash()->error('Số tập phim đã đạt giới hạn!');
        return redirect()->back();
         }
        // Đếm số tập đã có để tự động chọn số tập tiếp theo
        $nextEpisode = $movie->episodes()->count() + 1;

        return view('admin.episode.create', compact('movie', 'nextEpisode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'movie_id' => 'required',
                'link' => 'required',
                'episode' => [
                    'required',
                    Rule::unique('episodes')->where(function ($query) use ($request) {
                        return $query->where('movie_id', $request->movie_id);
                    }),
                ],
            ],
            [
                'movie_id.required' => 'Vui lòng chọn phim.',

                'link.required' => 'Vui lòng nhập link phim',

                'episode.required' => 'Vui lòng chọn tập phim.',
                'episode.unique' => 'Tập phim đã tồn tại. Vui lòng chọn tập phim khác.',
            ]
        );
        $episode_check = Episode::where('episode', $data['episode'])->where('movie_id', $data['movie_id'])->count();
        if ($episode_check > 0) {
            return redirect()->back();
        } else {
            $data['created_at'] = now();
            $data['updated_at'] = now();

            $episode = Episode::create($data);
        }
        // dd($data);
        flash()->success('Thêm tập phim thành công!');


        return redirect()->route('episode.edit', $episode->id)->with('message', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $episode = Episode::findOrFail($id);
        $movies = Movie::all();

        return view('admin.episode.edit', compact('episode', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        Episode::find($id)->update($data);
        flash()->success('Cập nhật tập phim thành công!');

        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id)->delete();

        return redirect()->back()->with('message', 'Xóa dữ liệu thành công');
    }
}
