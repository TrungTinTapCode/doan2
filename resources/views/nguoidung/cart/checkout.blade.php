<!DOCTYPE html>
<html>
<head>
    <title>Thanh toán</title>
</head>
<body>
    <h1>Thông tin giao hàng</h1>

    @if (session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('order.checkout') }}" method="POST">
        @csrf

        <label>Địa chỉ giao hàng:</label><br>
        <input type="text" name="shipping_address" required><br><br>

        <label>Số điện thoại:</label><br>
        <input type="text" name="phone_number" required><br><br>

        <button type="submit">Xác nhận đặt hàng</button>
    </form>
</body>
</html>
