<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('admin.products.create') }}">
    <button type="button">Thêm sản phẩm</button>
    <a href="{{ route('admin.categories.index') }}">
    <button type="button">Quản lý danh mục</button>
</a>
</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong> -@if ($product->volume)
                                                            {{ $product->volume }}
                                                        @endif
                {{ $product->price }} VNĐ
                - Tồn kho: {{ $product->quantity }}

                <br>

                @if ($product->image)
                    <img src="{{ asset('uploads/' . $product->image) }}" width="150" alt="Ảnh sản phẩm">
                @else
                    <span>Không có ảnh</span>
                @endif

                <br>

                <a href="{{ route('admin.products.edit', $product->id) }}">Chỉnh sửa</a>|
                <a href="{{ route('admin.products.show', $product->id) }}">Xem chi tiết</a>

                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá không?')">Xoá</button>
</form>


                <hr>
            </li>
        @endforeach
    </ul>

</body>
</html>
