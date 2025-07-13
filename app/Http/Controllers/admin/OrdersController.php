<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Log;
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
    public function updateStatus(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:pending,approved',
        ]);

        $order = Order::findOrFail($id);

        // QUY TẮC 1: Không cho phép chuyển trạng thái từ "Đã duyệt" về trạng thái khác.
        if ($order->status === 'approved') {
            return redirect()->route('admin.orders.index')->with('error', 'Không thể thay đổi trạng thái của đơn hàng đã được duyệt.');
        }

        // Nếu trạng thái mới không phải là 'approved', chỉ cần cập nhật và bỏ qua.
        if ($request->status !== 'approved') {
            $order->status = $request->status;
            $order->save();
            return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
        }

        // QUY TẮC 2: Xử lý duyệt đơn và trừ kho một cách an toàn.
        try {
            DB::transaction(function () use ($order) {
                // Khóa đơn hàng đang xử lý để tránh race condition
                $orderToUpdate = Order::with('orderDetails.product')->lockForUpdate()->findOrFail($order->id);

                // Kiểm tra lại lần nữa bên trong transaction để đảm bảo an toàn
                if ($orderToUpdate->inventory_updated) {
                    return; // Đơn hàng đã được xử lý bởi một tiến trình khác, không làm gì cả.
                }

                foreach ($orderToUpdate->orderDetails as $detail) {
                    $product = $detail->product;

                    if (!$product) {
                        throw new \Exception("Sản phẩm với ID {$detail->product_id} không tồn tại.");
                    }

                    if ($product->quantity < $detail->quantity_order) {
                        throw new \Exception("Không đủ số lượng tồn kho cho sản phẩm '{$product->name}'.");
                    }

                    // Trừ số lượng tồn kho
                    $product->quantity -= $detail->quantity_order;
                    $product->save();
                }

                // Cập nhật trạng thái đơn hàng và đánh dấu đã trừ kho
                $orderToUpdate->status = 'approved';
                $orderToUpdate->inventory_updated = true;
                $orderToUpdate->save();
            });

            return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được duyệt và tồn kho đã được cập nhật.');
        } catch (\Exception $e) {
            Log::error("Lỗi duyệt đơn hàng #{$id}: " . $e->getMessage());
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi duyệt đơn hàng: ' . $e->getMessage());
        }
    }

    
    public function show($id)
{
    $order = Order::with('customer', 'orderDetails.product')->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}
}
