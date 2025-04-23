<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{route('nguoidung.login')}}">
    @csrf
    <input type="text" name="username" placeholder="Tên đăng nhập">
    <input type="password" name="password" placeholder="Mật khẩu">
    <button type="submit">Đăng nhập</button>
    <p>Chưa có tài khoản? <a href="{{ route('nguoidung.register') }}">Đăng ký ngay</a></p>
</form>

</body>
</html>