<?php

namespace App\Http\Controllers\nguoidung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $productId)
    {
    $request->validate([
'content' => 'required|string|max:1000',
]);
    Comment::create([
        'product_id' => $productId,
        'customer_id' => auth()->guard('customer')->user()->id,
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Đã gửi bình luận!');
    }
}

