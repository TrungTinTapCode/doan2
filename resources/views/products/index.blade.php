<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }} VNĐ</li>
        @endforeach
    </ul>
</body>
</html>
