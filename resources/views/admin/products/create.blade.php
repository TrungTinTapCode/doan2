<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h1>Thêm sản phẩm mới</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a href="{{ route('admin.products.index') }}">Quay lại danh sách sản phẩm</a>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name"><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price"><br><br>

    <label>Ảnh sản phẩm:</label><br>
    <input type="file" name="image"><br><br>
    <label for="category_id">Danh mục:</label>

    <select name="category_id" id="category_id" required>
    <option value="">-- Chọn danh mục --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
    </select>
    <div class="mb-3">
    <label for="quantity" class="form-label">Số lượng</label>
    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}">
    @error('quantity')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

    <button type="submit">Thêm</button>

</form>

</body>
</html>
