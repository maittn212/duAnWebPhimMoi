<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::orderBy('id','desc')->get();
        return view('admin.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:categories|max:255',
                'description' => 'nullable|max:255',
                'slug' => 'required|unique:categories|max:255',
                'status' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tên danh mục.',
                'title.unique' => 'Tên thể loại đã tồn tại. Vui lòng chọn tên khác.',
                'title.max' => 'Tên thể loại không được vượt quá 255 ký tự.',

                'description.max' => 'Mô tả không được vượt quá 255 ký tự.',

                'slug.required' => 'Vui lòng nhập đường dẫn cho thể loại.',
                'slug.unique' => 'Đường dẫn đã tồn tại. Vui lòng chọn đường dẫn khác.',
                'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',

                'status.required' => 'Vui lòng chọn trạng thái thể loại.',
            ]
        );
        Genre::create($data);
        flash()->success('Thêm thể loại thành công!');
        
        return redirect()->route('genre.index');
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
        $genre = Genre::findOrFail($id);
        return view('admin.genre.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:genres,title,' . $id . '|max:255',
                'description' => 'nullable|max:255',
                'slug' => 'required|unique:genres,slug,' . $id . '|max:255',
                'status' => 'required',

            ],
            [
                'title.required' => 'Vui lòng nhập tên thể loại.',
                'title.unique' => 'Tên thể loại đã tồn tại. Vui lòng chọn tên khác.',
                'title.max' => 'Tên thể loại không được vượt quá 255 ký tự.',

                'description.max' => 'Mô tả không được vượt quá 255 ký tự.',

                'slug.required' => 'Vui lòng nhập đường dẫn cho thể loại.',
                'slug.unique' => 'Đường dẫn đã tồn tại. Vui lòng chọn đường dẫn khác.',
                'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',

                'status.required' => 'Vui lòng chọn trạng thái thể loại.',
            ]
        );
        

        Genre::findOrFail($id)->update($data);
        flash()->success('Cập nhật thể loại thành công!');

        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::findOrFail($id)->delete();
        flash()->success('Xóa thể loại thành công!');

        return redirect()->back();
    }
}
