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
        background-color:rgb(243, 243, 243);
    }
    .container-cart {
    padding: 20px;
    margin: 20px auto;
    max-width: 960px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container-cart h1 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.container-cart a {
    display: block;
    color: #007bff;
    margin-bottom: 10px;
    text-decoration: none;
    transition: color 0.3s ease;
    text-align: right;
}

.container-cart a:hover {
    color: #0056b3;
}

.container-cart .success {
    color: green;
    margin-bottom: 10px;
}

.container-cart .error {
    color: red;
    margin-bottom: 10px;
}

.container-cart p {
    color: #555;
    margin-bottom: 15px;
    text-align: center;
}

.banggiohang {
    overflow-x: auto; /* Để bảng có thể cuộn ngang trên màn hình nhỏ */
    margin-bottom: 20px;
}

.banggiohang table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #dee2e6;
}

.banggiohang th, .banggiohang td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

.banggiohang th {
    background-color: #f8f9fa;
    font-weight: bold;
    color: #333;
}

.banggiohang tr:last-child td {
    border-bottom: none;
}

.banggiohang img {
    max-width: 80px;
    height: auto;
    vertical-align: middle;
    margin-right: 10px;
    border-radius: 4px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.banggiohang input[type="number"] {
    width: 60px;
    padding: 6px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    text-align: center;
}

.banggiohang button {
    padding: 8px 12px;
    background-color:rgb(77, 77, 77);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 0.9rem;
}

.banggiohang button:hover {
    background-color:rgb(199, 199, 199);
    color: black;
}

.endgiohang {
    text-align: right;
    padding: 15px 0;
    border-top: 1px solid #dee2e6;
}

.endgiohang h3 {
    color: #333;
    margin-bottom: 10px;
}

.endgiohang button {
    padding: 10px 15px;
    background-color:rgb(0, 103, 24);
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 17px;
    margin-left: 10px;
}

.endgiohang button:hover {
    background-color:rgb(0, 170, 40);

}

.endgiohang form {
    display: inline;
    margin-left: 10px;
}

.endgiohang form button {
    background-color:rgb(149, 0, 15);
}

.endgiohang form button:hover {
    background-color: #c82333;
}

</style>
</head>
<body>
    @include('header')
  <div class="giohang">
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
                <th></th>
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
    <h3>
        <b>
        Tổng cộng:
        {{ number_format(collect($cart)->sum(function($item){ return $item['price'] * $item['quantity']; }), 0, ',', '.') }} VNĐ
        </b>
    </h3>
<br>
        <a href="{{ route('order.checkout.form') }}"><button>Thanh toán</button></a>
        <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Xóa toàn bộ giỏ hàng</button>
        </form>
       </div>
<br><br>

    @endif
  </div>

    @include('footer')
</body>
</html>
