<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    // Hiển thị danh sách tất cả đơn hàng
    public function index()
    {
        $orders = Order::with('customer')->orderBy('date_order', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    // Cập nhật trạng thái đơn hàng (duyệt đơn)
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,approved',
    ]);

    $order = Order::with('orderDetails')->findOrFail($id);

// Chỉ xử lý trừ hàng nếu đơn được duyệt và chưa trừ kho trước đó
if ($request->status === 'approved' && !$order->inventory_updated) {
    DB::transaction(function () use ($order) {
        foreach ($order->orderDetails as $detail) {
            $product = Product::find($detail->product_id);
            if ($product) {
                $product->quantity -= $detail->quantity;
                if ($product->quantity < 0) {
                    $product->quantity = 0;
                }
                $product->save();
            }
        }

        $order->inventory_updated = true;
        $order->status = 'approved';
        $order->save();
    });
} else {
    $order->status = $request->status;
    $order->save();
}

return redirect()->route('admin.orders.index')
                ->with('success', 'Cập nhật trạng thái đơn hàng thành công!');

}

    
    public function show($id)
{
    $order = Order::with('customer', 'orderDetails.product')->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}
}
