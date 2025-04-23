<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa sản phẩm</title>
</head>
<body>
    <h1>Chỉnh sửa sản phẩm</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Tên sản phẩm:</label><br>
        <input type="text" name="name" value="{{ $product->name }}"><br><br>

        <label>Mô tả:</label><br>
        <textarea name="description">{{ $product->description }}</textarea><br><br>
        <label>Ảnh sản phẩm:</label><br>
        <input type="file" name="image"><br><br>
        <label>Giá (VNĐ):</label><br>
        <input type="number" name="price" value="{{ $product->price }}"><br><br>
        <select name="category_id">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>
<br><br>

<label>
    <input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
    Sản phẩm nổi bật
</label>
<br>
<label>Dung tích (VD: 500ml, 250g):</label><br>
<input type="text" name="volume" value="{{ old('volume', $product->volume ?? '') }}"><br><br>

</select>
<div class="mb-3">
    <label for="quantity" class="form-label">Số lượng</label>
    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">

    @error('quantity')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
