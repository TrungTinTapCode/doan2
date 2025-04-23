<?php

namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function index()
    {
        return view('giohang');
    }
}
