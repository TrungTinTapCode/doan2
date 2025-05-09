<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class CommentsController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm có bình luận
        $products = Product::with(['comments.customer'])->get();

        return view('admin.comments.index', compact('products'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'Xoá bình luận thành công!');
    }
}

