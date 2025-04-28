<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>

@include('header')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }
    .container {
        width: 80%;
        margin: 30px auto;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
    }
    .product {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }
    .product img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin-right: 20px;
    }
    .product-info {
        flex: 1;
    }
    .form-section {
        margin-top: 30px;
    }
    .required {
        color: red;
    }
</style>

<div class="container">
    <h1>Đơn Hàng của bạn</h1>

    <!-- Danh sách sản phẩm trong giỏ -->
    <div class="product-list">
        @forelse ($cart as $productId => $item)
            <div class="product">
                <img src="{{ asset('uploads/' . $item['image']) }}" alt="{{ $item['name'] }}">
                <div class="product-info">
                    <h5>{{ $item['name'] }}</h5>
                    <p>Giá: {{ number_format($item['price'], 0, ',', '.') }} VNĐ</p>
                    <p>Số lượng: {{ $item['quantity'] }}</p>
                </div>
            </div>
        @empty
            <p>Giỏ hàng của bạn đang trống.</p>
        @endforelse
        @if(count($cart) > 0)
    <div class="mt-4 text-end">
        <h4>
            Tổng cộng: 
            <span class="text-danger">
                {{ number_format(collect($cart)->sum(function($item) {
                    return $item['price'] * $item['quantity'];
                }), 0, ',', '.') }}
                VNĐ
            </span>
        </h4>
    </div>
@endif

    </div>

    <!-- Form thông tin giao hàng -->
    @if (count($cart) > 0)
    <div class="form-section">
        <h3>Thông Tin Giao Hàng</h3>
        <form action="{{ route('order.checkout.place') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ giao hàng <span class="required">*</span>:</label>
                <input type="text" id="address" name="shipping_address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại giao hàng <span class="required">*</span>:</label>
                <input type="tel" id="phone" name="phone_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Ghi chú (tùy chọn):</label>
                <textarea id="notes" name="notes" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-danger w-100">Xác Nhận Đặt Hàng</button>
        </form>
    </div>
    @endif
</div>

@include('footer')

</body>
</html>
