<?php
namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class AuthCustomerController extends Controller
{

     /**
     * Hiển thị form đăng nhập
     */
    public function showLoginForm()
    {
        return view('nguoidung.login');
    }

    /**
     * Xử lý yêu cầu đăng nhập
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $user = Customer::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Đăng nhập thành công
            Auth::login($user);
            
            // Lưu thông tin vào session nếu cần (Laravel đã tự động làm điều này)
            session(['email' => $user->email]);
            
            return redirect()->route('home');
        }

        // Đăng nhập thất bại
        return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }
    /**
     * Đăng xuất người dùng
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}