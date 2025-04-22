<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>{{ $product->name }}</h1>
<p>Giá: {{ $product->price }} VND</p>
<p>Tồn kho: {{ $product->quantity }}</p>
<p>Mô tả: {{ $product->description }}</p>

@if ($product->image)
    <img src="{{ asset('uploads/' . $product->image) }}" width="200" alt="Ảnh sản phẩm">
@else
    <p>Không có ảnh</p>
@endif

<a href="{{ route('products.index') }}">Quay lại danh sách</a>

</body>
</html>