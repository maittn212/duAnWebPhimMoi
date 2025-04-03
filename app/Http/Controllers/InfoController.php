<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = Info::find(1);
        return view('admin.info.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $info = Info::findOrFail($id);
        return view('admin.info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $info = Info::findOrFail($id);
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'description' => 'nullable|max:1000',
                'email' => 'required|email|max:255',
                // 'phone' => 'required',
            ],
            [
                'title.required'       => 'Vui lòng nhập tiêu đề.',
                'title.max'           => 'Tiêu đề không được vượt quá 255 ký tự.',
        
                'logo.image'          => 'Logo phải là một tập tin hình ảnh.',
                'logo.mimes'          => 'Logo phải có định dạng jpeg, png, jpg, gif hoặc webp.',
                'logo.max'            => 'Dung lượng logo không được vượt quá 2MB.',
        
                'description.max'     => 'Mô tả không được vượt quá 1000 ký tự.',
        
                'email.required'      => 'Vui lòng nhập địa chỉ email.',
                'email.email'         => 'Email không hợp lệ.',
                'email.max'           => 'Email không được vượt quá 255 ký tự.',
        
                'phone.required'      => 'Vui lòng nhập số điện thoại.',
                'phone.regex'         => 'Số điện thoại không đúng định dạng (phải bắt đầu bằng +84 hoặc số 0, theo sau là 9 số).',
            ]
        );
        

          // Xử lý file
          if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            // Nếu có ảnh bài học cũ và ảnh tồn tại trong thư mục storage public thì xóa ảnh
            if (!empty($info->logo) && Storage::disk('public')->exists($info->logo)) {
                Storage::disk('public')->delete($info->logo);
            }
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        } else {
            // Nếu không upload ảnh thì giữ ảnh cũ
            $data['logo'] = $info->logo;
        }
        $info->update($data);
        flash()->success('Cập nhật thông tin Website thành công!');

        return redirect()->route('info.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
