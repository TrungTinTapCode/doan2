<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\trangchu\HomeController;
use App\Http\Controllers\trangchu\SanPhamController;
use App\Http\Controllers\trangchu\ThongBaoController;
use App\Http\Controllers\trangchu\LienHeController;
use App\Http\Controllers\trangchu\VideoController;
use App\Http\Controllers\trangchu\GioHangController;
use App\Http\Controllers\trangchu\DSTController;
use App\Http\Controllers\nguoidung\AuthCustomerController;
use App\Http\Controllers\nguoidung\NguoiDungController;
use App\Http\Controllers\nguoidung\CartController;
use App\Http\Controllers\nguoidung\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\AuthAdminController;


// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham');
Route::get('/sanpham/{id}', [SanPhamController::class, 'show'])->name('sanpham.show');
Route::get('/thongbao', [ThongBaoController::class, 'index'])->name('thongbao');
Route::get('/lienhe', [LienHeController::class, 'index'])->name('lienhe');
Route::get('/video', [VideoController::class, 'index'])->name('video');
Route::get('/giohang', [GioHangController::class, 'index'])->name('giohang');
Route::get('/dst', [DSTController::class, 'index'])->name('dst');

// Người dùng - Khách hàng chưa đăng nhập
Route::get('/nguoidung/login', [AuthCustomerController::class, 'showLoginForm'])->name('nguoidung.login');
Route::post('/nguoidung/login', [AuthCustomerController::class, 'login']);
Route::get('/nguoidung/register', [AuthCustomerController::class, 'showRegisterForm'])->name('nguoidung.register');
Route::post('/nguoidung/register', [AuthCustomerController::class, 'register'])->name('nguoidung.register.post');
Route::post('/nguoidung/logout', [AuthCustomerController::class, 'logout'])->name('nguoidung.logout');
Route::get('/login', fn() => redirect()->route('nguoidung.login'))->name('login');
Route::post('/login', [AuthCustomerController::class, 'login']);

// Người dùng - Đăng nhập mới được dùng
Route::middleware('auth:customer')->group(function () {
    Route::get('/hoso', [NguoiDungController::class, 'index'])->name('nguoidung.hoso');
    Route::get('/lich-su-don-hang', [OrderController::class, 'history'])->name('nguoidung.orders.history');

    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/checkout', [OrderController::class, 'checkoutForm'])->name('checkout.form');
        Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.place');
    });
});

// Admin đăng nhập
Route::get('/admin/login', [AuthAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthAdminController::class, 'login']);
Route::post('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/orders/index', [OrderController::class, 'index'])->name('admin.orders.index');


Route::get('/admin/register', [AuthAdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AuthAdminController::class, 'register'])->name('admin.register.submit');

// Giỏ hàng
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
});

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}/update-status', [OrdersController::class, 'updateStatus'])->name('orders.updateStatus');
});

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


// Menu demo
Route::get('/menu', fn() => view('menu'))->name('menu');

// tìm kiếm sản phẩm
Route::get('/search', [ProductController::class, 'search'])->name('search-nguoidung');


//thanh menu
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');

