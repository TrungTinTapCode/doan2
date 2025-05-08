<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết đơn hàng #{{ $order->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:rgb(241, 241, 241);
            padding: 40px;
            color: #333;
            margin-left: 150px;
            margin-right: 150px;
        }

        h1 {
            text-align: center;
            font-size: 40px;
            margin-bottom: 30px;
            font-weight: bold;
            color:rgb(0, 0, 0);
        }

        h3 {
            margin-top: 40px;
            font-size: 20px;
            color: #343a40;
            font-weight: 600;
        }

        p {
            font-size: 20px;
            margin: 10px 0;
        }

        strong {
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        thead {
            background-color: rgb(77, 77, 77);
            color: white;
        }

        thead th {
            padding: 14px 12px;
            text-align: left;
            font-weight: 600;
        }

        tbody td {
            padding: 14px 12px;
            border-top: 1px solidrgb(100, 100, 100);
            vertical-align: middle;
        }
/*
        tr:hover {
            background-color: #f1f3f5;
        } */

        /* button {
            background-color: #6c757d;
            color: white;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color:rgb(199, 199, 199);
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        a button {
            margin-top: 30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        } */
        .btn-back {
    display: inline-block;
    background-color:rgb(0, 77, 144);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    font-size: 15px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-back:hover {
    background-color:rgb(0, 126, 223);
    transform: translateY(-2px);
}

.btn-back:active {
    transform: translateY(0);
}

    </style>
</head>
<body>
@include('menu')
    <h1><b>CHI TIẾT ĐƠN HÀNG #{{ $order->id }}</b></h1>
    <a href="{{ route('admin.orders.index') }}" class="btn-back">← Quay lại danh sách</a>
    <p><strong>Khách hàng:</strong> {{ $order->customer->name ?? 'Không rõ' }}</p>
    <p><strong>Ngày đặt:</strong> {{ $order->date_order }}</p>
    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} VNĐ</p>
    <p><strong>Trạng thái:</strong> @if($order->status == 'pending')
                    <span class="text-yellow-500">Chờ duyệt</span>
                @else
                    <span class="text-green-500">Đã duyệt</span>
                @endif</p>
                <td>
                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST class="btn-back">
                                        @csrf
                                        @method('PUT')
                                        <select name="status">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                                            <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Đã duyệt</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                                    </form>
                                </td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
