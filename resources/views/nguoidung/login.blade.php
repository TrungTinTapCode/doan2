<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
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
                    <a class="nav-link disabled text-black fs-6" href="">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- form -->
<div class="container mt-5 text-center">
    <h2>Đăng nhập</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="text" class="form-control form-control-lg focus-primary rounded-0" 
                    name="username" id="username" placeholder="Tên đăng nhập" />
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <input type="password" class="form-control form-control-lg focus-primary rounded-0" 
                    name="password" id="password" placeholder="Mật khẩu">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mt-3">
                <button class="btn d-grid bg-black text-white rounded-0 fs-5 align-items-center" 
                    style="width: 100%;" type="submit">Đăng nhập</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <nav class="navbar navbar-expand-sm bg-light navbar-light">
                    <div class="container-fluid">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link disabled text-black fs-6" href="#">
                                    Chưa có tài khoản?
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary fs-6" href="{{ route('home') }}">
                                    Đăng ký
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        @if(session('error'))
            <div class="row justify-content-center mt-3">
                <div class="col-md-4">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
    </form>
</div>
</body>
</html>