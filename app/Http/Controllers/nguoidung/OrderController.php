<?php

namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    // 1. Hiển thị form thanh toán
    public function checkoutForm()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống!');
        }

        return view('nguoidung.cart.checkout', compact('cart'));
    }

    // 2. Xử lý đặt đơn hàng
    public function checkout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống!');
        }

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            $order = new Order();
            $order->customer_id = Auth::check() ? Auth::id() : null; // Nếu có login
            $order->date_order = Carbon::now();
            $order->total = $total;
            $order->shipping_address = $request->shipping_address;
            $order->phone_number = $request->phone_number;
            $order->status = 'pending'; // trạng thái mặc định
            $order->save();

            foreach ($cart as $productId => $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $productId;
                $orderDetail->quantity_order = $item['quantity'];
                $orderDetail->price = $item['price'];
                $orderDetail->save();
            }

            DB::commit();

            session()->forget('cart'); // Xóa giỏ hàng sau khi đặt xong

            return redirect()->route('home')->with('success', 'Đặt hàng thành công!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
