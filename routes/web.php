<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
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


// Trang chu
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham');
Route::get('/thongbao', [ThongBaoController::class, 'index'])->name('thongbao');
Route::get('/lienhe', [LienHeController::class, 'index'])->name('lienhe');
Route::get('/video', [VideoController::class, 'index'])->name('video');
Route::get('/giohang', [GioHangController::class, 'index'])->name('giohang');
Route::get('/dst',[DSTController::class, 'index'])->name('dst');
Route::get('/sanpham/{id}', [SanPhamController::class, 'show'])->name('sanpham.show');
//khachchuadangnhap
Route::middleware('auth:customer')->group(function () {
    Route::get('/hoso', [NguoiDungController::class, 'index'])->name('nguoidung.hoso');
});


//Nguoidung 

Route::get('/nguoidung/login', [AuthCustomerController::class, 'showLoginForm'])->name('nguoidung.login');
Route::post('/nguoidung/login', [AuthCustomerController::class, 'login']);
Route::post('/login', [AuthCustomerController::class, 'login'])->name('login');
Route::get('/nguoidung/register', [AuthCustomerController::class, 'showRegisterForm'])->name('nguoidung.register');
Route::post('/nguoidung/register', [AuthCustomerController::class, 'register'])->name(' nguoidung.register.post');
Route::get('/register', [AuthCustomerController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthCustomerController::class, 'register']);


Route::post('/nguoidung/logout', [AuthCustomerController::class, 'logout'])->name('nguoidung.logout');
// Laravel yêu cầu phải có route tên 'login' khi dùng middleware 'auth'
Route::get('/login', function () {return redirect()->route('nguoidung.login');})->name('login');

// Trang admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Quản lý sản phẩm
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    
    

    // Quản lý danh mục sản phẩm
    Route::resource('categories', CategoryController::class);
});
//khúc này đang làm giỏ hàng
// Cart - Giỏ hàng
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
});
// Order - Đặt hàng
Route::prefix('order')->name('order.')->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkoutForm'])->name('checkoutForm');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
});

