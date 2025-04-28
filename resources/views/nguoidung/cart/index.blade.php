<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    padding: 20px;
}

h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #333;
}

a {
    text-decoration: none;
    color: #0d6efd;
    font-weight: 600;
}

a:hover {
    text-decoration: underline;
}

table {
    width: 100%;
    background-color: white;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

table th, table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #dee2e6;
}

table th {
    background-color: #0d6efd;
    color: white;
    font-size: 18px;
}

table tr:last-child td {
    border-bottom: none;
}

input[type="number"] {
    width: 70px;
    padding: 6px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    text-align: center;
}

button {
    background-color: #0d6efd;
    color: white;
    padding: 8px 16px;
    border: none;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #0b5ed7;
    transform: translateY(-2px);
}

button:active {
    background-color: #0a58ca;
    transform: translateY(0);
}

form {
    display: inline-block;
}

h3 {
    margin-top: 20px;
    font-size: 24px;
    color: #333;
}

div[style*="color:green"], div[style*="color:red"] {
    padding: 10px;
    margin-top: 10px;
    border-radius: 6px;
    font-weight: 600;
}

div[style*="color:green"] {
    background-color: #d4edda;
    color: #155724 !important;
}

div[style*="color:red"] {
    background-color: #f8d7da;
    color: #721c24 !important;
}

.banggiohang{
    margin-left: 200px;
    margin-right: 200px;
}

.endgiohang{
    margin-left: 980px;
}
    </style>
</head>
<body>
    @include('header')
    <div class="container-cart">
        <h1>Giỏ hàng của bạn</h1>
        <a href="{{ route('nguoidung.orders.history') }}">
            Xem lịch sử đơn hàng
        </a>
@if ($customer)
    <p>Giỏ hàng của: {{ $customer->name }} ({{ $customer->email }})</p>
@endif

    @if (session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif
    @if (empty($cart) || count($cart) == 0)
        <p>Giỏ hàng đang trống.</p>
    @else
        <div class="banggiohang">
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

        </div>

<br>
       <div class="endgiohang">
       <h3>Tổng cộng:
            {{ number_format(collect($cart)->sum(function($item){ return $item['price'] * $item['quantity']; }), 0, ',', '.') }} VNĐ
        </h3>

        <a href="{{ route('order.checkout.form') }}"><button>Thanh toán</button></a>
        <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Xóa toàn bộ giỏ hàng</button>
        </form>
       </div>
<br><br>

    @endif
    @include('footer')
</body>
</html>
