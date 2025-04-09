<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
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

    <form action="/products" method="POST">
        @csrf
        <label>Tên sản phẩm:</label><br>
        <input type="text" name="name"><br><br>

        <label>Mô tả:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Giá (VNĐ):</label><br>
        <input type="number" name="price"><br><br>

        <button type="submit">Thêm</button>
    </form>
</body>
</html>
