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

    <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tên sản phẩm:</label><br>
        <input type="text" name="name" value="{{ $product->name }}"><br><br>

        <label>Mô tả:</label><br>
        <textarea name="description">{{ $product->description }}</textarea><br><br>

        <label>Giá (VNĐ):</label><br>
        <input type="number" name="price" value="{{ $product->price }}"><br><br>
        <select name="category_id">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
