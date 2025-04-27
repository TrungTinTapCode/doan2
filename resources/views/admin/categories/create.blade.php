<!DOCTYPE html>
<html>
<head>
    <title>Thêm danh mục mới</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        color: #333;
        text-transform: uppercase;
        font-size: 28px;
    }

    .container {
        max-width: 600px;
        background: #ffffff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 200px;
    }

    form .form-label {
        font-weight: 600;
        color: #555;
    }

    form input.form-control {
        border-radius: 8px;
        padding: 10px;
        border: 1px solid #ced4da;
    }

    .text-danger {
        font-size: 14px;
        margin-top: 5px;
    }

    button.btn-primary {
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    button.btn-primary:hover {
        background-color: #0056b3;
    }

    a.btn-secondary {
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 8px;
        margin-left: 10px;
        transition: background-color 0.3s ease;
    }

    a.btn-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }
</style>

</head>

<body class="p-4">
@include('menu')
    <div class="container">
        <h1>Thêm danh mục mới</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
