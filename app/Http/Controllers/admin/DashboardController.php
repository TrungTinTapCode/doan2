<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        // $stocks = Stock::count();
        $orders = Order::count();
        // $vouchers = Voucher::count();
        // $carts = Cart::count();

        // Top 5 sản phẩm doanh thu cao nhất trong tháng
        $topProducts = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->whereMonth('orders.created_at', now()->month)
            ->whereYear('orders.created_at', now()->year)
            ->select('products.name', DB::raw('SUM(order_details.price * order_details.quantity_order) as revenue'))
            ->groupBy('products.name')
            ->orderByDesc('revenue')
            ->limit(5)
            ->get();

        $chartLabels = $topProducts->pluck('name');
        $chartData = $topProducts->pluck('revenue');

        // Doanh thu theo tháng trong năm hiện tại
        $yearlySales = [];
        for ($i = 1; $i <= 12; $i++) {
            $total = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->whereMonth('orders.created_at', $i)
                    ->whereYear('orders.created_at', now()->year)
                    ->sum(DB::raw('order_details.price * order_details.quantity_order'));


            $yearlySales[$i] = $total;
        }

        return view('admin.dashboard', compact(
            'products','orders',
            'chartLabels', 'chartData', 'yearlySales'
        ));
    }
}
