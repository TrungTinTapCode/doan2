<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminAccount;

class AuthAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login-admin');
    }

    public function login(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        // Tìm tài khoản admin
        $admin = AdminAccount::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Đảm bảo mật khẩu đã được mã hóa đúng
            if (!password_get_info($admin->password)['algoName']) {
                return redirect()->back()->withErrors(['login_error' => 'Mật khẩu không hợp lệ, vui lòng đặt lại.']);
            }

            // Đăng nhập thành công, lưu vào session
            session(['username' => $admin->username, 'email' => $admin->email]);

            return redirect()->route('admin.orders.index');
        }

        // Đăng nhập thất bại
        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.');
    }

    public function logout()
    {
        session()->forget(['username', 'email']);
        return redirect()->route('admin.login');
    }


//đăng ký
public function showRegisterForm()
{
    return view('admin.register-admin');
}

public function register(Request $request)
{
    $request->validate([
        'username' => 'required|unique:adminaccount,username|max:255',
        'name' => 'required|max:255',
        'password' => 'required|min:6|confirmed',
    ], [
        'username.required' => 'Vui lòng nhập tên đăng nhập.',
        'username.unique' => 'Tên đăng nhập đã tồn tại.',
        'name.required' => 'Vui lòng nhập họ và tên.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    ]);

    // Tạo tài khoản admin
    AdminAccount::create([
        'username' => $request->username,
        'name' => $request->name, // Thêm cột name vào database
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('admin.login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
}

}

