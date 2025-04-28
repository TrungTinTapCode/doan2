<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </div>

    <!-- Form thông tin giao hàng -->
    @if (count($cart) > 0)
    <div class="form-section">
        <h3>Thông Tin Giao Hàng</h3>
        <form action="{{ route('nguoidung.order.place') }}" method="POST">
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
