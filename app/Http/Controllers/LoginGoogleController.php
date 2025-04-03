<?php
namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use Exception;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

  

class LoginGoogleController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

        

    /**

     * Create a new controller instance.

     *

     * @return void

     */

     public function handleGoogleCallback()
     {
         try {
             $user = Socialite::driver('google')->user();
     
             // Tìm user theo email và google_id
             $finduser = User::where('email', $user->email)->whereNotNull('google_id')->first();
     
             if ($finduser) {
                 Auth::login($finduser);
             } else {
                 // Nếu email đã tồn tại nhưng chưa có google_id, cập nhật google_id thay vì tạo user mới
                 $existingUser = User::where('email', $user->email)->first();
     
                 if ($existingUser) {
                     $existingUser->update([
                         'google_id' => $user->id
                     ]);
                     Auth::login($existingUser);
                 } else {
                     // Tạo tài khoản mới nếu hoàn toàn chưa tồn tại
                     $newUser = User::create([
                         'name' => $user->name,
                         'email' => $user->email,
                         'google_id' => $user->id,
                         'password' => bcrypt('12345678')
                     ]);
                     Auth::login($newUser);
                 }
             }
     
             return redirect()->intended('/');
     
         } catch (Exception $e) {
             dd($e->getMessage());
         }
     }
     
    public function logoutHome(){
        Auth::logout();
        return redirect()->back();
    }

}