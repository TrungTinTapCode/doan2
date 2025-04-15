<!DOCTYPE html>
<html>
<head>
    <title>Danh sách danh mục</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>Danh sách danh mục</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Thêm mới</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Tên danh mục</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $cate)
            <tr>
                
                <td>{{ $cate->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('categories.destroy', $cate->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa thật chứ?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
