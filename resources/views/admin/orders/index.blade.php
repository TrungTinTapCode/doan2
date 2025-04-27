<!DOCTYPE html>
<html>
<head>
    <title>Quản lý đơn hàng</title>
</head>
<body>
    <h1>Danh sách đơn hàng</h1>

    @if (session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Địa chỉ giao</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Cập nhật trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->customer->name ?? 'Không rõ' }}</td>
                <td>{{ $order->date_order }}</td>
                <td>{{ $order->shipping_address }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                <td>{{ ucfirst($order->status) }}</td>
                <th>Chi tiết</th>
                <td>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                            <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Đã xác nhận</option>
                        </select>
                        <button type="submit">Cập nhật</button>
                    </form>
                </td>
                <td>
                <a href="{{ route('admin.orders.show', $order->id) }}">
                    <button type="button">Xem chi tiết</button>
                </a>
            </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
