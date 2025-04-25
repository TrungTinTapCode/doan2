<?php
namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class AuthCustomerController extends Controller
{
    public function showLoginForm() {
        return view('nguoidung.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('nguoidung.hoso');
        }

        return back()->withErrors(['username' => 'Thông tin đăng nhập không chính xác']);
    }

    public function showRegisterForm() {
        return view('nguoidung.register');
    }

    public function register(Request $request) {
        
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
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

    public function logout() {
        Auth::guard('customer')->logout();
        return redirect()->route('nguoidung.login');
    }
}
