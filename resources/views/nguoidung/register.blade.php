<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('nguoidung.register') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Họ tên">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="phone" placeholder="Số điện thoại">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mật khẩu">
    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">

    <button type="submit">Đăng ký</button>
</form>


</body>
</html>