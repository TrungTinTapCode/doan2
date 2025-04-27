<!DOCTYPE html>
<html>
<head>
    <title>Danh sách đơn hàng</title>
</head>
<body>
    <h1>Đơn hàng của tôi</h1>

    @if (count($orders) == 0)
        <p>Bạn chưa có đơn hàng nào.</p>
    @else
        <table border="1" cellpadding="10">
            <tr>
                <th>Mã đơn</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>

            @foreach ($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->date_order }}</td>
                <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td><a href="{{ route('order.show', $order->id) }}">Xem chi tiết</a></td>
            </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
