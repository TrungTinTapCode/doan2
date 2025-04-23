<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\trangchu\HomeController;
use App\Http\Controllers\trangchu\SanPhamController;
use App\Http\Controllers\trangchu\ThongBaoController;
use App\Http\Controllers\trangchu\LienHeController;
use App\Http\Controllers\trangchu\VideoController;
use App\Http\Controllers\trangchu\GioHangController;
use App\Http\Controllers\trangchu\DSTController;

// Trang chu
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sanpham', [SanPhamController::class, 'index'])->name('sanpham');
Route::get('/thongbao', [ThongBaoController::class, 'index'])->name('thongbao');
Route::get('/lienhe', [LienHeController::class, 'index'])->name('lienhe');
Route::get('/video', [VideoController::class, 'index'])->name('video');
Route::get('/giohang', [GioHangController::class, 'index'])->name('giohang');
Route::get('/dst',[DSTController::class, 'index'])->name('dst');
//Nguoidung 

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
