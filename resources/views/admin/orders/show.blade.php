<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết đơn hàng #{{ $order->id }}</title>
</head>
<body>
    <h1>Chi tiết đơn hàng #{{ $order->id }}</h1>

    <p><strong>Khách hàng:</strong> {{ $order->customer->name ?? 'Không rõ' }}</p>
    <p><strong>Ngày đặt:</strong> {{ $order->date_order }}</p>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} VNĐ</p>
    <p><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</p>

    <h3>Danh sách sản phẩm:</h3>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá lúc đặt</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetails as $detail)
            <tr>
                <td>{{ $detail->product->name ?? 'Sản phẩm không tồn tại' }}</td>
                <td>{{ number_format($detail->price, 0, ',', '.') }} VNĐ</td>
                <td>{{ $detail->quantity_order }}</td>
                <td>{{ number_format($detail->price * $detail->quantity_order, 0, ',', '.') }} VNĐ</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('admin.orders.index') }}">
        <button type="button">Quay lại danh sách</button>
    </a>
</body>
</html>
