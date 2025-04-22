<?php

namespace App\Http\Controllers\Nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SanPhamController extends Controller
{
    public function index(): View
    {
        return view('nguoidung.sanpham');
    }
}
