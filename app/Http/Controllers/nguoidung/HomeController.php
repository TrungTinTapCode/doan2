<?php

namespace App\Http\Controllers\nguoidung;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }
}
