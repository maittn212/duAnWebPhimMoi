<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Flasher\Laravel\Facade\Flasher;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
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
                'title.unique' => 'Tên danh mục đã tồn tại. Vui lòng chọn tên khác.',
                'title.max' => 'Tên danh mục không được vượt quá 255 ký tự.',

                'description.max' => 'Mô tả không được vượt quá 255 ký tự.',

                'slug.required' => 'Vui lòng nhập đường dẫn cho danh mục.',
                'slug.unique' => 'Đường dẫn đã tồn tại. Vui lòng chọn đường dẫn khác.',
                'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',

                'status.required' => 'Vui lòng chọn trạng thái danh mục.',
            ]
        );

        Category::create($data);
        flash()->success('Thêm danh mục phim thành công!');

        return redirect()->route('category.index');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Loại bỏ _token và _method trước khi cập nhật
        // $data = $request->except(['_token', '_method']);
        $data = $request->validate(
            [
                'title' => 'required|unique:categories,title,' . $id . '|max:255',
                'description' => 'nullable|max:255',
                'slug' => 'required|unique:categories,slug,' . $id . '|max:255',
                'status' => 'required',

            ],
            [
                'title.required' => 'Vui lòng nhập tên danh mục.',
                'title.unique' => 'Tên danh mục đã tồn tại. Vui lòng chọn tên khác.',
                'title.max' => 'Tên danh mục không được vượt quá 255 ký tự.',

                'description.max' => 'Mô tả không được vượt quá 255 ký tự.',

                'slug.required' => 'Vui lòng nhập đường dẫn cho danh mục.',
                'slug.unique' => 'Đường dẫn đã tồn tại. Vui lòng chọn đường dẫn khác.',
                'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',

                'status.required' => 'Vui lòng chọn trạng thái danh mục.',
            ]
        );
        Category::where('id', $id)->update($data);

        flash()->success('Cập nhật danh mục phim thành công!');
        return redirect()->route('category.index')->with('message', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        flash()->success('Xóa danh mục phim thành công!');
        return redirect()->route('category.index')->with('message', 'Xóa dữ liệu thành công');
    }
}
