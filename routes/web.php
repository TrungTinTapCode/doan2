<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

use App\Http\Controllers\ProductController;

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


