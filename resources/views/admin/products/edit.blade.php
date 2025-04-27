<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Reset cơ bản */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            text-transform: uppercase;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background: #f9f9f9;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            background: #fff;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        img {
            display: block;
            margin: 10px 0;
            max-width: 120px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-messages {
            background: #ffe0e0;
            border: 1px solid #ff5c5c;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #cc0000;
        }

        .error-messages ul {
            margin-left: 20px;
            list-style: disc;
        }

    </style>
</head>
<body>
@include('menu')
<div class="container">
    <h1>Chỉnh sửa sản phẩm</h1>

    @if ($errors->any())
        <div class="error-messages">
            <strong>Vui lòng kiểm tra lại:</strong>
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

        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label>Mô tả:</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Ảnh sản phẩm hiện tại:</label><br>
            @if ($product->image)
                <img src="{{ asset('uploads/' . $product->image) }}" alt="Ảnh sản phẩm">
            @endif
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <label>Giá (VNĐ):</label>
            <input type="number" name="price" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label>Danh mục:</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
            <label>Sản phẩm nổi bật (trang chủ)</label>
        </div>

        <div class="form-group">
            <label>Dung tích (VD: 500ml, 250g):</label>
            <input type="text" name="volume" value="{{ old('volume', $product->volume ?? '') }}">
        </div>

        <div class="form-group">
            <label>Số lượng:</label>
            <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}">
            @error('quantity')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Cập nhật sản phẩm</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
