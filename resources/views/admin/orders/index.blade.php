<!DOCTYPE html>
<html>
<head>
    <title>Quản lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .admin-container {
    padding: 30px;
    background-color: #f4f6f8;
    min-height: 100vh; /* Đảm bảo container chiếm toàn bộ chiều cao viewport */
}

.admin-content {
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.admin-content h1 {
    color: #333;
    margin-bottom: 30px;
    text-align: left; /* Căn trái tiêu đề */
    border-bottom: 2px solid #eee;
    padding-bottom: 15px;
}

.admin-content .alert-success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    margin-bottom: 20px;
}

.order-table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
    border-radius: 8px;
    overflow: hidden; /* Để bo tròn góc có hiệu lực */
}

.order-table thead {
    background-color:rgb(214, 214, 214); /* Màu nền đậm cho header */
    color: black;
}

.order-table th, .order-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.order-table th {
    font-weight: bold;
}

.order-table tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

.order-table tbody tr:hover {
    background-color: #e9ecef;
    transition: background-color 0.2s ease-in-out;
}

.order-table td:first-child {
    font-weight: 500; /* Nhấn mạnh mã đơn hàng */
}

.order-table .status-pending {
    color:rgb(205, 154, 0);
    font-weight: bold;
}

.order-table .status-approved {
    color:rgb(0, 130, 30);
    font-weight: bold;
}

.order-table select {
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    font-size: 0.9rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.order-table select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    outline: none;
}

.order-table button {
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.8rem;
    transition: background-color 0.2s ease-in-out;
}

.order-table button[type="submit"] {
    background-color: #007bff;
    color: white;
    margin-top: 5px; /* Thêm khoảng cách 5px phía trên nút */
    margin-left: 47px;
}

.order-table button[type="submit"]:hover {
    background-color: #0056b3;
}

.order-table a button {
    background-color:rgb(82, 82, 82);
    color: white;
}

.order-table a button:hover {
    background-color:rgb(145, 145, 145);
}

/* Стиль cho container cuộn ngang */
.table-responsive {
    overflow-x: auto;
}
    </style>
</head>
<body>
@include('menu')
<div class="admin-container">
        <div class="admin-content">
            <h1><b>DANH SÁCH ĐƠN HÀNG</b></h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Địa chỉ giao hàng</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Cập nhật trạng thái</th>
                            <th></th>
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
                                <td class="status-{{ $order->status }}">{{ ucfirst($order->status) }}</td>
                                <td>
                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                                            <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Đã xác nhận</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}">
                                        <button type="button" class="btn btn-sm btn-info">Xem chi tiết</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
