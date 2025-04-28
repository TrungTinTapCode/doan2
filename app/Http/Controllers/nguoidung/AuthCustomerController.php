<?php

namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('customer')->attempt($credentials)) {
            // Đăng nhập thành công
            $user = Auth::guard('customer')->user();

            // Lưu thông tin vào session nếu cần
            session(['email' => $user->email]);

            return redirect()->route('home');
        }

        // Đăng nhập thất bại
        return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }

    /**
     * Hiển thị form đăng ký
     */
    public function showRegisterForm()
    {
        return view('nguoidung.register');
    }

    /**
     * Xử lý yêu cầu đăng ký
     */
    public function register(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:customers',
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^[0-9]{10}$/|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',
            'password_confirmation.same' => 'Mật khẩu nhập lại không khớp!',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
        ]);
        if ($validator->fails()) {
            return redirect()->route('nguoidung.register')
                ->withErrors($validator)
                ->withInput();
        }

        // Tạo người dùng mới
        try {
            // Log dữ liệu đăng ký để debug
            Log::info('Dữ liệu đăng ký:', $request->only(['username', 'name', 'email', 'phone']));

            $customer = new Customer();
            $customer->username = $request->username;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->password = Hash::make($request->password);
            $customer->save();

            // Chuyển hướng đến trang đăng nhập với thông báo thành công
            return redirect()->route('nguoidung.login')
                ->with('success', 'Đăng ký tài khoản thành công!');
        } catch (\Exception $e) {
            // Ghi chi tiết lỗi vào log
            Log::error('Lỗi đăng ký: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());

            return redirect()->route('nguoidung.register')
                ->withInput()
                ->withErrors(['database' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    /**
     * Đăng xuất người dùng
     */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('nguoidung.login');
    }

    public function showProfile()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('nguoidung.login');
        }

        return view('nguoidung.hoso');
    }
}
