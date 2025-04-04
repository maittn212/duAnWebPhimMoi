<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->get();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'position' => 'required',
                'image' => 'required|image|max:2048',
                'url' => 'required|url',
                'status' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề',
                'title.max' => 'Tiêu đề không được quá 255 ký tự',
                'position.required' => 'Vui lòng chọn vị trí hiển thị',
                'image.required' => 'Vui lòng chọn hình ảnh',
                'image.image' => 'Tệp tải lên phải là hình ảnh',
                'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
                'url.required' => 'Vui lòng nhập URL',
                'url.url' => 'URL không hợp lệ',
                'status.required' => 'Vui lòng chọn trạng thái',
                'start_date.required' => 'Vui lòng chọn ngày bắt đầu',
                'start_date.date' => 'Ngày bắt đầu không hợp lệ',
                'end_date.required' => 'Vui lòng chọn ngày kết thúc',
                'end_date.date' => 'Ngày kết thúc không hợp lệ',
                'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
            ]


        );
        
        // Thêm ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('banner');
        }
        $data['image'] = $path_image ?? null;

        $data['created_at'] = now();
        $data['updated_at'] = now();
        // $data['count_views'] = rand(100,999999);

        $banner = Banner::create($data);
        flash()->success('Thêm banner thành công');

        return redirect()->route('banner.edit', $banner->id);
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
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'position' => 'required',
                'image' => 'nullable|image|max:2048',
                'url' => 'required|url',
                'status' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề',
                'title.max' => 'Tiêu đề không được quá 255 ký tự',
                'position.required' => 'Vui lòng chọn vị trí hiển thị',
                'image.required' => 'Vui lòng chọn hình ảnh',
                'image.image' => 'Tệp tải lên phải là hình ảnh',
                'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
                'url.required' => 'Vui lòng nhập URL',
                'url.url' => 'URL không hợp lệ',
                'status.required' => 'Vui lòng chọn trạng thái',
                'start_date.required' => 'Vui lòng chọn ngày bắt đầu',
                'start_date.date' => 'Ngày bắt đầu không hợp lệ',
                'end_date.required' => 'Vui lòng chọn ngày kết thúc',
                'end_date.date' => 'Ngày kết thúc không hợp lệ',
                'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
            ]
        );
        // Xử lý file
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Nếu có ảnh bài học cũ và ảnh tồn tại trong thư mục storage public thì xóa ảnh
            if (!empty($movie->image) && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = $request->file('image')->store('banner', 'public');
        } else {
            // Nếu không upload ảnh thì giữ ảnh cũ
            $data['image'] = $banner->image;
        }

        // Cập nhật thời gian
        $data['updated_at'] = now();
        $banner->update($data);
        flash()->success('Cập nhật banner thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);

        // Xóa ảnh
        if (!empty($banner->image) && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();

        flash()->success('Xóa banner thành công!');

        return redirect()->back();
    }
}
