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

if ($request->status === 'approved' && !$order->inventory_updated) {
    DB::beginTransaction();
    try {
        foreach ($order->orderDetails as $detail) {
            $product = Product::find($detail->product_id);
            if ($product) {
                $newQuantity = $product->quantity - $detail->quantity_order;

                // Không cho tồn kho xuống dưới 0
                $product->quantity = $newQuantity < 0 ? 0 : $newQuantity;
                $product->save();
            }
        }

        $order->status = 'approved';
        $order->inventory_updated = true;
        $order->save();

        DB::commit();
        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Lỗi khi cập nhật tồn kho: ' . $e->getMessage());
    }
} else {
    // Trường hợp chỉ đổi trạng thái, không cần trừ hàng
    $order->status = $request->status;
    $order->save();

    return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
}

}


    
    public function show($id)
{
    $order = Order::with('customer', 'orderDetails.product')->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}
}
