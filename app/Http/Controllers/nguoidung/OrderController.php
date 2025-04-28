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
        $order->customer_id = Auth::guard('customer'); // Không cần check vì đã login rồi
        $order->date_order = now();
        $order->total = $total;
        $order->shipping_address = $request->shipping_address;
        $order->phone_number = $request->phone_number;
        $order->status = 'pending';
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

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
    }
}
public function history()
    {
        $customer = Auth::guard('customer')->user();

        // Lấy các đơn hàng của khách đang login
        $orders = Order::where('customer_id', $customer->id)
                        ->with('orderDetails.product') // lấy thêm chi tiết đơn + sản phẩm
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('nguoidung.orders.history', compact('orders'));
    }
    public function checkoutForm()
    {
        // Lấy thông tin giỏ hàng
        $cart = session()->get('cart', []);
    
        // Lấy thông tin khách hàng đang đăng nhập
        $customer = Auth::guard('customer')->user();
    
        return view('nguoidung.cart.checkout', compact('cart', 'customer'));
    }
    
}
