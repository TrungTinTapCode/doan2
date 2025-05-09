<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>

.container {
    max-width: 500px; 
    padding: 50px; 
    font-size: 18px; 
}

input.form-control {
    padding: 16px; 
    font-size: 18px;
}

button.btn-dark {
    font-size: 18px; 
    padding: 16px; 
}

.text-danger {
    font-size: 14px;
    font-weight: normal; 
    margin-top: 4px; 
}
</style>
@include('menu')
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

<div class="container p-4 bg-white rounded shadow-lg text-center" style="max-width: 400px;">
    <h2 class="fw-bold text-dark">Đăng ký tài khoản Admin</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.register.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Họ và Tên">
            @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
            @error('username')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
            @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu">
            @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark w-100 py-2">Đăng ký</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>