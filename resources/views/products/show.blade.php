<h1>{{ $product->name }}</h1>
<p>Giá: {{ $product->price }} VND</p>
<p>Mô tả: {{ $product->description }}</p>

@if ($product->image)
    <img src="{{ asset('uploads/' . $product->image) }}" width="200" alt="Ảnh sản phẩm">
@else
    <p>Không có ảnh</p>
@endif

<a href="{{ route('products.index') }}">Quay lại danh sách</a>
