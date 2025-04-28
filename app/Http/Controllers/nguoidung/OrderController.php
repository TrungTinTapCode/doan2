<?php

namespace App\Http\Controllers\nguoidung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkoutForm()
{
    $cart = session()->get('cart', []);

    return view('nguoidung.cart.checkout', compact('cart'));
}

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Validate dữ liệu giao hàng
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            // Tính tổng tiền đơn hàng
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Lưu đơn hàng
            $order = Order::create([
                'customer_id' => Auth::guard('customer')->id(),
                'total' => $total,
                'shipping_address' => $request->shipping_address,
                'phone_number' => $request->phone_number,
                'status' => 'pending',
            ]);

            // Lưu chi tiết đơn hàng
            foreach ($cart as $productId => $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity_order' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Xóa giỏ hàng
            session()->forget('cart');

            DB::commit();

            return redirect()->route('nguoidung.orders.history')->with('success', 'Đặt hàng thành công! Đơn hàng của bạn đang chờ duyệt.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại!');
        }
    }

    // Thêm hàm xem lịch sử đơn hàng
    public function history()
    {

        $customer = Auth::guard('customer')->user();

        $orders = Order::where('customer_id', $customer->id)
                        ->orderBy('created_at', 'desc')
                        ->with('orderDetails.product')
                        ->get();
                        
        return view('nguoidung.orders.history', compact('orders'));
    }
}
