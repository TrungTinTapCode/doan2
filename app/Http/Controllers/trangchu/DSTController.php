<?php

namespace App\Http\Controllers\trangchu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DSTController extends Controller
{
    public function index()
    {
        return view('dst');
    }
}
