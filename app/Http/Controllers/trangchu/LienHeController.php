<?php

namespace App\Http\Controllers\trangchu;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LienHeController extends Controller
{
    public function index(): View
    {
        return view('lienhe');
    }
}
