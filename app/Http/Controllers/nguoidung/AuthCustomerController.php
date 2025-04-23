<?php

namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCustomerController extends Controller
{
    public function showLoginForm() {
        return view('nguoidung.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['username' => 'Tài khoản hoặc mật khẩu không đúng']);
    }

    public function showRegisterForm() {
        return view('nguoidung.register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|unique:customers',
            'name' => 'required',
            'phone' => 'required|unique:customers',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);
        return redirect()->route('nguoidung.hoso');
    }

    public function logout(Request $request)
{
    auth('customer')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home'); 
}

}
