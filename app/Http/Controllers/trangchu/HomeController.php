<?php

namespace App\Http\Controllers\trangchu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', 1)
                                    ->where('quantity', '>', 0)
                                    ->take(6) 
                                    ->get();
        return view('index', compact('featuredProducts'));
    }
}
