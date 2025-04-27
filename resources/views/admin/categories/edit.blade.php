<!DOCTYPE html>
<html>
<head>
    <title>Sửa danh mục</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        background-color: #f5f7fa;
        padding: 40px 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #34495e;
        font-weight: bold;
        text-transform: uppercase;
    }

    .container {
        max-width: 600px;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #2c3e50;
    }

    input.form-control {
        border-radius: 8px;
        height: 45px;
        border: 1px solid #ccc;
    }

    input.form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    .btn-secondary {
        margin-left: 10px;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
    }

    small.text-danger {
        margin-top: 5px;
        display: block;
    }
</style>

</head>
<body>
@include('menu')
<div class="container mt-4">
    <h1>Sửa danh mục</h1>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
