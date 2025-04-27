<!DOCTYPE html>
<html>
<head>
    <title>Danh sách danh mục</title>
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
            max-width: 900px;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }

        a.btn-success {
            font-weight: 600;
            border-radius: 8px;
        }

        a.btn-success:hover {
            background-color: #27ae60;
        }

        a {
            font-weight: 600;
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: #21618c;
        }

        table.table {
            margin-top: 20px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            text-align: center;
            vertical-align: middle;
        }

        table thead {
            background-color: #3498db;
            color: white;
        }

        .btn-warning {
            border-radius: 6px;
            font-weight: 600;
        }

        .btn-danger {
            border-radius: 6px;
            font-weight: 600;
        }

        form {
            display: inline-block;
            margin-left: 10px;
        }
    </style>

</head>
<body>
@include('menu')
<div class="container mt-4">
    <h1>Danh sách danh mục</h1>
    <!-- <a href="{{ route('admin.products.index') }}">Quay lại danh sách sản phẩm</a> <BR></BR> -->
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Thêm mới</a>

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
                    <a href="{{ route('admin.categories.edit', $cate->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.categories.destroy', $cate->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xoá không?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
