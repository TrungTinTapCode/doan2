<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    <!-- Bootstrap 5 CSS -->


    <style>
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
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
            text-transform: uppercase;
        }

        .button-group {
            text-align: center;
            margin-bottom: 30px;
        }

        .button-group a {
            text-decoration: none;
        }

        .button-group button {
            padding: 11px 18px;
            margin: 0 10px;
            border: none;
            background-color:rgb(147, 0, 0);
            color: white;
            font-size: 13px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-group button:hover {
            background-color:rgb(215, 0, 0);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        strong {
            font-size: 18px;
            color:rgb(0, 128, 255);
        }

        img {
            margin-top: 10px;
            margin-left: 15px;
            border-radius: 6px;
            max-width: 90%;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.05);
        }

        .action-link {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 17px;
            margin-right: 6px;
            margin-top: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .action-link.edit {
            background-color:rgb(177, 177, 177);
            color:black;
        }

        .action-link.edit:hover {
            background-color:rgb(109, 109, 109);
            color: white;
        }

        .action-link.view {
            background-color:rgb(202, 202, 202);
            color:black;
        }

        .action-link.view:hover {
            background-color:rgb(98, 98, 98);
            color:white;
        }

        /* form {
            display: inline;
        }

         form button {
            font-size: 100px;
            padding: 3px 1px;
            border: none;
            border-radius: 4px;
            background-color:rgb(176, 0, 0);
            color: white;
            font-size: 150px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color:rgb(255, 0, 25);
        } */

        hr {
            margin-top: 20px;
            border: none;
            border-top: 1px solid #eee;
        }


        .mt-auto {
            margin-top: auto;
        }

        .mt-auto form { /* Thêm selector cho form bên trong .mt-auto */
            display: flex; /* Áp dụng flexbox cho form */
            justify-content: flex-end; /* Căn các phần tử con về phía bên phải */
            width: 100%; /* Đảm bảo form chiếm toàn bộ chiều rộng */
        }

        .mt-auto form button {
            width: 100%; /* Đảm bảo nút xoá chiếm toàn bộ chiều rộng của form */
        }
        .btn-info {
            background-color: rgb(98, 98, 98) !important; /* Màu xám #6B6B6B */
            border-color: rgb(107, 107, 107) !important; /* Viền màu xám #6B6B6B */
            color: white !important; /* Chữ màu trắng */
        }

        .btn-info:hover {
            background-color: rgb(182, 182, 182) !important; /* Màu xám #6D6D6D khi hover */
            border-color: rgb(180, 180, 180) !important; /* Viền màu xám #6D6D6D khi hover */
            color: black !important;
        }
        .btn-secondary {
            background-color: rgb(0, 123, 255) !important; /* Màu xanh dương */
            border-color: rgb(0, 123, 255) !important; /* Viền màu xanh dương */
            color: white !important; /* Chữ màu trắng */
        }

        .btn-secondary:hover {
            background-color: rgb(0, 103, 207) !important; /* Màu xanh dương đậm hơn khi hover */
            border-color: rgb(0, 103, 207) !important; /* Viền màu xanh dương đậm hơn khi hover */
        }
</style>
</head>
<body>
@include('menu')

<div class="container">
    <h1>Danh sách sản phẩm</h1>
    <!-- <div class="button-group">
        <a href="{{ route('admin.products.create') }}">
            <button type="button">Thêm sản phẩm</button>
        </a>
        <a href="{{ route('admin.categories.index') }}">
            <button type="button">Quản lý danh mục</button>
        </a>
        <a href="{{ route('admin.orders.index') }}">
            <button type="button">Quản lý đơn hàng</button>
        </a>
    </div> -->
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($product->image)
                        <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="Ảnh sản phẩm">
                    @else
                        <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 150px; background-color: #f8f9fa;">
                            Không có ảnh
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            @if ($product->volume)
                                {{ $product->volume }},
                            @endif
                            {{ number_format($product->price) }} VNĐ
                            <br>
                            Tồn kho: {{ $product->quantity }}
                        </p>
                        <div class="mt-auto">
                            <div class="d-flex gap-2 mb-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-secondary w-50">Chỉnh sửa</a>
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info w-50 text-white">Xem chi tiết</a>
                            </div>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xoá không?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger w-100">XÓA SẢN PHẨM</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
