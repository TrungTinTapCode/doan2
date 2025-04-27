<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
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
        margin-bottom: 10px;
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

    form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 700px;
    }

    label {
        font-weight: 600;
        margin-top: 15px;
        display: block;
        color: #34495e;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 12px 14px;
        margin-top: 6px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color: #3498db;
        background-color: #fff;
        outline: none;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .mb-3 {
        margin-top: 15px;
    }

    button[type="submit"] {
        width: 100%;
        background-color:rgb(31, 31, 31);
        color: white;
        font-weight: bold;
        border: none;
        padding: 14px;
        margin-top: 20px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color:rgb(85, 85, 85);
    }

    .text-danger {
        color: #e74c3c;
        margin-top: 5px;
        font-size: 14px;
    }

    ul {
        padding-left: 20px;
        margin-bottom: 20px;
        color: #c0392b;
    }
</style>

</head>
<body>
@include('menu')
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
    <!-- <a href="{{ route('admin.products.index') }}">Quay lại danh sách sản phẩm</a> -->
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
    <label>Dung tích (VD: 500ml, 250g):</label><br>
<input type="text" name="volume" value="{{ old('volume', $product->volume ?? '') }}"><br><br>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
