<?php

namespace App\Http\Controllers\trangchu;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ThongBaoController extends Controller
{
    public function index(): View
    {
        return view('thongbao');
    }
}
