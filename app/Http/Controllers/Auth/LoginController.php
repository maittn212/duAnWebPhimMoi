<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Đảm bảo import lớp Controller
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); // Phương thức middleware() được gọi ở đây
    }
}