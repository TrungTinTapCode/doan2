<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    <!-- Bootstrap 5 CSS -->
    <style>
        .table th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    font-weight: bold;
    text-align: left;
}

.table td {
    vertical-align: middle;
}

.table img {
    border-radius: 4px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}

.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #138496;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #5a6268;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

.d-flex {
    gap: 0.5rem; /* Khoảng cách giữa các nút hành động */
}
#search-form {
    width: 300px; /* Điều chỉnh độ rộng mong muốn của thanh tìm kiếm */
    margin-left: auto; /* Đẩy form sang bên phải */
    margin-bottom: 20px; /* Thêm khoảng cách bên dưới thanh tìm kiếm */
}

#search-form .input-group {
    display: flex; /* Sử dụng flexbox để sắp xếp input và button */
}

#search-form .form-control {
    flex-grow: 1; /* Cho phép input field chiếm phần lớn không gian */
    border-radius: 0.2rem 0 0 0.2rem; /* Bo tròn góc bên trái */
    font-size: 0.9rem; /* Giảm kích thước font chữ */
    padding: 0.375rem 0.75rem; /* Giảm padding */
}

#search-form .btn {
    border-radius: 0 0.2rem 0.2rem 0; /* Bo tròn góc bên phải */
    font-size: 0.9rem; /* Giảm kích thước font chữ */
    padding: 0.375rem 0.75rem; /* Giảm padding */
}
    </style>


</head>
<body>
@include('menu')

<div class="container">
        <h1><b>DANH SÁCH SẢN PHẨM</b></h1>

        <form action="{{ route('admin.products.index') }}" method="GET" class="mb-4" id="search-form">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm..." value="{{ request('keyword') }}">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Dung tích</th>
                        <th>Giá tiền</th>
                        <th>Tồn kho</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    Không có ảnh
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->volume ?? 'N/A' }}</td>
                            <td>{{ number_format($product->price) }} VNĐ</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-secondary">Chỉnh sửa</a>
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info text-white">Xem chi tiết</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá không?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
