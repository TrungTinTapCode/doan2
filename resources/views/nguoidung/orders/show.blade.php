<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết đơn hàng</title>
</head>
<body>
    <h1>Đơn hàng #{{ $order->id }}</h1>

    <p><strong>Ngày đặt:</strong> {{ $order->date_order }}</p>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
    <p><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</p>

    <h2>Sản phẩm:</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>

        @foreach ($order->orderDetails as $detail)
        <tr>
            <td>{{ $detail->product->name ?? 'Sản phẩm đã xóa' }}</td>
            <td>{{ number_format($detail->price, 0, ',', '.') }} VNĐ</td>
            <td>{{ $detail->quantity_order }}</td>
            <td>{{ number_format($detail->price * $detail->quantity_order, 0, ',', '.') }} VNĐ</td>
        </tr>
        @endforeach
    </table>

    <h3>Tổng cộng: {{ number_format($order->total, 0, ',', '.') }} VNĐ</h3>
</body>
</html>
