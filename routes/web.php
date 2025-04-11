<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/products', [ProductController::class, 'index']);
// Hiển thị form thêm sản phẩm
Route::get('/products/create', [ProductController::class, 'create']);

// Xử lý dữ liệu form gửi lên
Route::post('/products', [ProductController::class, 'store']);

// Hiển thị form sửa sản phẩm
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

// Xử lý cập nhật
Route::put('/products/{id}', [ProductController::class, 'update']);
//Xóa
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
//Hiện chi tiết sản phẩm
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//Quản lí danh mục sản phẩm
Route::resource('categories', CategoryController::class);
