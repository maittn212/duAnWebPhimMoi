<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderBy('id','desc')->get();
        return view('admin.country.index', compact('countries'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:countries|max:255',
                'description' => 'nullable|max:255',
                'slug' => 'required|unique:countries|max:255',
                'status' => 'required',

            ],
            [
                'title.required' => 'Vui lòng nhập quốc gia.',
                'title.unique' => 'Quốc gia đã tồn tại. Vui lòng chọn tên khác.',
                'title.max' => 'Tên quốc gia không được vượt quá 255 ký tự.',

                'description.max' => 'Mô tả không được vượt quá 255 ký tự.',

                'slug.required' => 'Vui lòng nhập đường dẫn cho quốc gia.',
                'slug.unique' => 'Đường dẫn đã tồn tại. Vui lòng chọn đường dẫn khác.',
                'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',

                'status.required' => 'Vui lòng chọn trạng thái.',
            ]
        );

        Country::create($data);
        flash()->success('Thêm quốc gia thành công!');
        
        return redirect()->route('country.index');
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
        $country = Country::findOrFail($id);
        return view('admin.country.edit',compact('country')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = $request->except('_token');
        $data = $request->validate(
            [
                'title' => 'required|unique:countries,title,' . $id . '|max:255',
                'description' => 'nullable|max:255',
                'slug' => 'required|unique:countries,slug,' . $id . '|max:255',
                'status' => 'required',

            ],
            [
                'title.required' => 'Vui lòng nhập tên quốc gia.',
                'title.unique' => 'Tên quốc gia đã tồn tại. Vui lòng chọn tên khác.',
                'title.max' => 'Tên quốc gia không được vượt quá 255 ký tự.',

                'description.max' => 'Mô tả không được vượt quá 255 ký tự.',

                'slug.required' => 'Vui lòng nhập đường dẫn cho quốc gia.',
                'slug.unique' => 'Đường dẫn đã tồn tại. Vui lòng chọn đường dẫn khác.',
                'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',

                'status.required' => 'Vui lòng chọn trạng thái thể loại.',
            ]
        );
        
        Country::findOrFail($id)->update($data);
        flash()->success('Cập nhật quốc gia thành công!');

        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::findOrFail($id)->delete();
        flash()->success('Xóa quốc gia thành công!');

        return redirect()->route('country.index')->with('message','Xóa dữ liệu thành công');
    }
}
