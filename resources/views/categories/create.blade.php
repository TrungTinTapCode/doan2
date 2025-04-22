<!DOCTYPE html>
<html>
<head>
    <title>Thêm danh mục mới</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <div class="container">
        <h1>Thêm danh mục mới</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
