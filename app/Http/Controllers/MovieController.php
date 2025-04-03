<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File as FacadesFile;
use Laravel\Pail\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $movies = Movie::with('category', 'movie_genre', 'country', 'genre')
            ->withCount(['episodes as current_episode_count'])
            ->orderBy('id', 'desc')
            ->get();
        // dd($movies);
        return view('admin.movie.index', compact('movies'));
    }
    public function updateYear(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('id', $data['id_phim'])->update(['year' => $data['year']]);

        // $movie = DB::table('movies')->where('id', $data['id_phim'])->update(['year' => $data['year']]);
    }
    public function updateTopView(Request $request)
    {
        $data = $request->all();
        $movie = DB::table('movies')->where('id', $data['id_phim'])->update(['top_view' => $data['top_view']]);
    }
    public function updateSeason(Request $request)
    {
        $data = $request->all();
        $movie = DB::table('movies')->where('id', $data['id_phim'])->update(['season' => $data['season']]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_genre = Genre::all();
        $categories = DB::table('categories')->select('*')->get();
        $countries = DB::table('countries')->select('*')->get();
        $genres = DB::table('genres')->select('*')->get();


        return view('admin.movie.create', compact('list_genre', 'categories', 'countries', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:movies|max:255',
                'eng_name' => 'nullable|max:255',
                'slug' => 'required|unique:movies|max:255',
                'movie_type' => 'required',
                'time' => 'nullable|max:50',
                'episode_count' => 'required|integer|min:1',
                'trailer' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'description' => 'nullable|max:1000',
                'status' => 'required',
                'category_id' => 'required',
                'genre' => 'required|array',

                'country_id' => 'required',
                'is_hot' => 'nullable',
                'resolution' => 'required',
                'language_type' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề phim.',
                'title.unique' => 'Tiêu đề phim đã tồn tại. Vui lòng chọn tiêu đề khác.',
                'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
        
                'eng_name.max' => 'Tên tiếng Anh không được vượt quá 255 ký tự.',
        
                'slug.required' => 'Vui lòng nhập đường dẫn cho phim.',
                'slug.unique' => 'Đường dẫn phim đã tồn tại. Vui lòng chọn đường dẫn khác.',
                'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
        
                'movie_type.required' => 'Vui lòng chọn loại phim.',
        
                'time.max' => 'Thời lượng không được vượt quá 50 ký tự.',
        
                'episode_count.integer' => 'Số tập phải là số nguyên.',
                'episode_count.required' => 'Vui lòng nhập số tập.',

                'episode_count.min' => 'Số tập phải ít nhất là 1.',
        
                'image.image' => 'Tệp tải lên phải là hình ảnh.',
                'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif hoặc webpwebp.',
                'image.max' => 'Dung lượng ảnh không được vượt quá 2MB.',
        
                'description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        
                'status.required' => 'Vui lòng chọn trạng thái phim.',
        
                'category_id.required' => 'Vui lòng chọn danh mục phim.',
        
                'genre_id.required' => 'Vui lòng chọn thể loại phim.',
        
                'country_id.required' => 'Vui lòng chọn quốc gia.',
        
                'resolution.required' => 'Vui lòng chọn độ phân giải.',
        
                'language_type.required' => 'Vui lòng chọn kiểu ngôn ngữ.',
            ]
        );
        

        // Lấy thể loại đầu tiên làm genre_id
        $data['genre_id'] = !empty($request->genre) ? $request->genre[0] : null;


        // Thêm ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('movie');
        }
        $data['image'] = $path_image ?? null;

        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        // $data['count_views'] = rand(100,999999);

        $movie = Movie::create($data);
  

        // Thêm nhiều thể loại phim
        if (!empty($request->genre)) {
            $movie->movie_genre()->attach($request->genre);
        }
        flash()->success('Thêm phim thành công!');

        return redirect()->route('movie.edit', $movie->id)->with('message', 'Thêm dữ liệu thành công');
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
        $list_genre = Genre::all();
        $categories = Category::all();
        $countries = Country::all();
        $genres = Genre::all();
        $movie = Movie::findOrFail($id);

        // Lấy danh sách thể loại của phim (chỉ lấy ID)
        $selected_genres = Movie::find($id)->movie_genre()->pluck('genre_id')->toArray();

        return view('admin.movie.edit', compact('selected_genres', 'list_genre', 'categories', 'countries', 'genres', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::findOrFail($id); // Lấy phim theo ID

        $data = $request->validate([
            'title' => 'required|unique:movies,title,' . $id . '|max:255',
            'eng_name' => 'nullable|max:255',
            'slug' => 'required|unique:movies,slug,' . $id . '|max:255',
            'movie_type' => 'required',
            'time' => 'nullable|max:50',
            'episode_count' => 'nullable|integer|min:1',
            'trailer' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|max:1000',
            'status' => 'required',
            'category_id' => 'required',
            'genre' => 'required|array|min:1',
            'country_id' => 'required',
            'is_hot' => 'nullable',
            'resolution' => 'required',
            'language_type' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề phim.',
            'title.unique' => 'Tiêu đề phim đã tồn tại. Vui lòng chọn tiêu đề khác.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
    
            'eng_name.max' => 'Tên tiếng Anh không được vượt quá 255 ký tự.',
    
            'slug.required' => 'Vui lòng nhập đường dẫn cho phim.',
            'slug.unique' => 'Đường dẫn phim đã tồn tại. Vui lòng chọn đường dẫn khác.',
            'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
    
            'movie_type.required' => 'Vui lòng chọn loại phim.',
    
            'time.max' => 'Thời lượng không được vượt quá 50 ký tự.',
    
            'episode_count.integer' => 'Số tập phải là số nguyên.',
            'episode_count.min' => 'Số tập phải ít nhất là 1.',
    
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif hoặc webp.',
            'image.max' => 'Dung lượng ảnh không được vượt quá 2MB.',
    
            'description.max' => 'Mô tả không được vượt quá 1000 ký tự.',
    
            'status.required' => 'Vui lòng chọn trạng thái phim.',
    
            'category_id.required' => 'Vui lòng chọn danh mục phim.',
    
            'genre_id.required' => 'Vui lòng chọn thể loại phim.',
    
            'country_id.required' => 'Vui lòng chọn quốc gia.',
    
            'resolution.required' => 'Vui lòng chọn độ phân giải.',
    
            'language_type.required' => 'Vui lòng chọn kiểu ngôn ngữ.',
        ]);

        // Cập nhật genre_id bằng thể loại đầu tiên nếu có
        $data['genre_id'] = !empty($request->genre) ? $request->genre[0] : null;
        // Xử lý file
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Nếu có ảnh bài học cũ và ảnh tồn tại trong thư mục storage public thì xóa ảnh
            if (!empty($movie->image) && Storage::disk('public')->exists($movie->image)) {
                Storage::disk('public')->delete($movie->image);
            }
            $data['image'] = $request->file('image')->store('movie', 'public');
        } else {
            // Nếu không upload ảnh thì giữ ảnh cũ
            $data['image'] = $movie->image;
        }

        // Cập nhật thời gian
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');

        $movie->update($data);
        // Cập nhật danh sách thể loại phim (gắn lại thể loại mới)
        if (!empty($request->genre)) {
            // xóa thể loại cũ của phim, thêm danh sách thể loại mới vào movie_genre
            $movie->movie_genre()->sync($request->genre);
        }

        flash()->success('Cập nhật phim thành công!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        // Xóa ảnh
        if (!empty($movie->image) && Storage::disk('public')->exists($movie->image)) {
            Storage::disk('public')->delete($movie->image);
        }

        // xóa thể loại 
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();
        // Xóa tập
        
        Episode::whereIn('movie_id', [$movie->id])->delete();
        $movie->delete();

        flash()->success('Xóa phim thành công!');

        return redirect()->back();
    }
}
