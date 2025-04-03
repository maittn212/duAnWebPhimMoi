<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $category_total = Category::all()->count();
        // $genre_total = Genre::all()->count();
        // $country_total = Country::all()->count();


        return view('dashboard');

    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
