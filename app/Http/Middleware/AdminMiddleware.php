<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Nếu chưa đăng nhập, chuyển hướng đến trang login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Nếu không phải admin, trả về lỗi 403
        if (Auth::user()->email !== 'admin@gmail.com') {
            abort(403, 'Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}
