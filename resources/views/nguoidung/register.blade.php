<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link link-secondary fs-6" href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-black fs-6" href="#">/</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-black fs-6" href="">Đăng ký</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- form -->
<div class="container mt-5 text-center">
    <h2>Đăng ký</h2>
    
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    
    <form action="{{ route('nguoidung.register.post') }}" method="POST">
    @csrf
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="text" name="name" id="name" 
                    class="form-control form-control-lg focus-primary rounded-0" 
                    placeholder="Họ và tên" value="{{ old('name') }}">
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="text" name="username" id="username" 
                    class="form-control form-control-lg focus-primary rounded-0" 
                    placeholder="Tên đăng nhập" value="{{ old('username') }}">
                @error('username')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="text" name="phone" id="phone" 
                    class="form-control form-control-lg focus-primary rounded-0" 
                    placeholder="Số điện thoại" value="{{ old('phone') }}">
                @error('phone')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="email" name="email" id="email" 
                    class="form-control form-control-lg focus-primary rounded-0" 
                    placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="password" name="password" id="password" 
                    class="form-control form-control-lg focus-primary rounded-0" 
                    placeholder="Mật khẩu">
                @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="password" name="password_confirmation" id="password_confirmation" 
                    class="form-control form-control-lg focus-primary rounded-0" 
                    placeholder="Nhập lại mật khẩu">
                @error('password_confirmation')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <button class="btn d-grid bg-black text-white rounded-0 fs-5 align-items-center" 
                    style="width: 100%;" type="submit">Đăng ký</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <nav class="navbar navbar-expand-sm bg-light navbar-light">
                    <div class="container-fluid">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link disabled text-black fs-6" href="#">Có tài khoản?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary fs-6" href="{{ route('nguoidung.login') }}">Đăng nhập</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </form>
</div>


</body>
</html>