<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
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
        $order = Order::findOrFail($id);
        $order->status = $request->status; // status gửi lên từ form
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }
    
    public function show($id)
{
    $order = Order::with('customer', 'orderDetails.product')->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}
}
