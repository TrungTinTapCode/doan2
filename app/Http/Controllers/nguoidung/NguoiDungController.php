<?php

namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function index()
    {
        return view('nguoidung.hoso');
    }
}
