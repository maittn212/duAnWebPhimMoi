<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.banner.index');
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
        $request->validate([
            'title' => 'required|max:255',
            'position' => 'required',
            'image' => 'required|image|max:2048',
            'url' => 'required|url',
            'status' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ],[
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
  

        return redirect()->route('banner.index')->with('success', 'Banner created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
