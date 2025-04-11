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
            <li>{{ $product->name }} - {{ $product->price }} VNĐ
            <a href="/products/{{ $product->id }}/edit">Chỉnh sửa</a>
            <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
            @if ($product->image)
    <img src="{{ asset('uploads/' . $product->image) }}" width="150" alt="Ảnh sản phẩm">
@else
    <span>Không có ảnh</span>
@endif
<a href="{{ route('products.show', $product->id) }}">Xem chi tiết</a>

    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá không?')">Xoá</button>
</form>

            </li>
        @endforeach
        

    </ul>
</body>
</html>
