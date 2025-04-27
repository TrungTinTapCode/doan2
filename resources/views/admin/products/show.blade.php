<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHI TIẾT SẢN PHẨM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        background-color: #f0f2f5;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #2c3e50;
        text-transform: uppercase;
        font-size: 32px;
        font-weight: bold;
    }

    .back-link {
        margin-bottom: 30px;
        font-size: 16px;
        color: #3498db;
        text-decoration: none;
        font-weight: 500;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    .product-info {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 700px;
        text-align: left;
    }

    .product-info p {
        font-size: 18px;
        color: #34495e;
        margin-bottom: 15px;
    }

    .product-info img {
        display: block;
        margin: 20px auto 0;
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .no-image {
        text-align: center;
        font-style: italic;
        color: #7f8c8d;
        margin-top: 20px;
    }
</style>

</head>
<body>
@include('menu')
<!-- <a href="{{ route('admin.products.index') }}" class="back-link">Quay lại danh sách</a> -->

<h1>{{ $product->name }}</h1>

<div class="product-info">
    <p>Giá: {{ number_format($product->price) }} VND</p>
    <p>Tồn kho: {{ $product->quantity }}</p>
    <p>Mô tả: {{ $product->description }}</p>

    @if ($product->image)
        <img src="{{ asset('uploads/' . $product->image) }}" alt="Ảnh sản phẩm">
    @else
        <p class="no-image">Không có ảnh</p>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
