<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>
</head>
<body>
<h1>Giỏ hàng của bạn</h1>

@if ($customer)
    <p>Giỏ hàng của: {{ $customer->name }} ({{ $customer->email }})</p>
@endif
<a href="{{ route('nguoidung.orders.history') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
    Xem lịch sử đơn hàng
</a>
    @if (session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif
    @if (empty($cart) || count($cart) == 0)
        <p>Giỏ hàng đang trống.</p>
    @else
        <table border="1" cellpadding="10">
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>

            @foreach ($cart as $productId => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                <td>
                    <form action="{{ route('cart.update') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId }}">
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                        <button type="submit">Cập nhật</button>
                    </form>
                </td>
                <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</td>
                <td>
                    <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId }}">
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

        <h3>Tổng cộng: 
            {{ number_format(collect($cart)->sum(function($item){ return $item['price'] * $item['quantity']; }), 0, ',', '.') }} VNĐ
        </h3>

        <a href="{{ route('order.checkout.form') }}"><button>Thanh toán</button></a>
        <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Xóa toàn bộ giỏ hàng</button>
        </form>
    @endif
</body>
</html>
