<!DOCTYPE html>
<html>
<head>
    <title>Quản lý đơn hàng</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f9;
    padding: 30px;
    color: #333;
}

h1 {
    text-align: center;
    font-size: 32px;
    margin-bottom: 30px;
    font-weight: bold;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

thead {
    background-color: #0d6efd;
    color: white;
}

thead th {
    padding: 14px 12px;
    text-align: left;
    font-weight: 600;
}

tbody td {
    padding: 14px 12px;
    border-top: 1px solid #e9ecef;
    vertical-align: middle;
}

tr:hover {
    /* background-color: #f1f3f5; */
}

select {
    padding: 6px 10px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    background-color: #fff;
    font-size: 14px;
    margin-right: 6px;
}

button {
    background-color: #0d6efd;
    color: #fff;
    border: none;
    padding: 8px 14px;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    font-size: 14px;
}

button:hover {
    background-color: #0b5ed7;
    transform: translateY(-2px);
}

button:active {
    transform: translateY(0);
    background-color: #0a58ca;
}

a button {
    background-color: #20c997;
}

a button:hover {
    background-color: #17b88f;
}

div[style*="color:green"] {
    background-color: #d4edda;
    color: #155724 !important;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 500;
    box-shadow: 0 2px 10px rgba(0, 128, 0, 0.05);
}

    </style>
</head>
<body>
    <h1><b>DANH SÁCH ĐƠN HÀNG</b></h1>

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
