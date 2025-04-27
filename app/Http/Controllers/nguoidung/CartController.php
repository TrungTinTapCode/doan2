<?php

namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 1. Hiển thị giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('trangchu.cart.index', compact('cart'));
    }

    // 2. Thêm sản phẩm vào giỏ
    public function add(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Đã thêm vào giỏ hàng']);
    }

    // 3. Cập nhật số lượng sản phẩm trong giỏ
    public function update(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        if ($quantity <= 0) {
            return response()->json(['success' => false, 'message' => 'Số lượng phải lớn hơn 0']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Đã cập nhật số lượng']);
        }

        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
    }

    // 4. Xóa 1 sản phẩm khỏi giỏ
    public function remove(Request $request)
    {
        $productId = $request->product_id;

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Đã xóa sản phẩm']);
        }

        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
    }

    // 5. Xóa toàn bộ giỏ hàng
    public function clear()
    {
        session()->forget('cart');
        return response()->json(['success' => true, 'message' => 'Đã xoá toàn bộ giỏ hàng']);
    }
}
