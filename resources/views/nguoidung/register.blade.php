<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
        body {
            background-color: azure;
            margin: 0;
            padding: 0;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        .logo {
            width: 250px;
        }

        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: contain;
        }

        .form-wrapper {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-wrapper .row {
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Breadcrumb -->
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
                    <a class="nav-link disabled text-black fs-6" href="#">Đăng ký</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Form + Carousel -->
<div class="container">
    <div class="row w-100 align-items-center">
        <!-- Carousel bên trái -->
        <div class="col-md-8">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/bg-slide3.webp') }}" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/bg-slide4.webp') }}" class="d-block w-100" alt="Slide 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

        <!-- Form đăng ký bên phải -->
        <div class="col-md-4 d-flex align-items-center">
            <div class="login-container">
                <div class="mb-4 text-center">
                        <img src="{{ asset('img/logo-01-01.png') }}" class="logo mb-2" alt="Drceutics Logo">
                        <h5 class="text-dark">ĐĂNG KÝ</h5>
                    </div>
                

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('nguoidung.register.post') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-3">
                            <input type="text" name="name" id="name"
                                class="form-control form-control-lg focus-primary rounded-0"
                                placeholder="Họ và tên" value="{{ old('name') }}">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-3">
                            <input type="text" name="username" id="username"
                                class="form-control form-control-lg focus-primary rounded-0"
                                placeholder="Tên đăng nhập" value="{{ old('username') }}">
                            @error('username')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-3">
                            <input type="text" name="phone" id="phone"
                                class="form-control form-control-lg focus-primary rounded-0"
                                placeholder="Số điện thoại" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-3">
                            <input type="email" name="email" id="email"
                                class="form-control form-control-lg focus-primary rounded-0"
                                placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-3">
                            <input type="password" name="password" id="password"
                                class="form-control form-control-lg focus-primary rounded-0"
                                placeholder="Mật khẩu">
                            @error('password')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-3">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control form-control-lg focus-primary rounded-0"
                                placeholder="Nhập lại mật khẩu">
                            @error('password_confirmation')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-4">
                            <button class="btn d-grid bg-black text-white rounded-0 fs-5 w-100" type="submit">
                                Đăng ký
                            </button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center mt-3">
                            <nav class="navbar navbar-expand-sm bg-light navbar-light">
                                <div class="container-fluid">
                                    <ul class="navbar-nav mx-auto">
                                        <li class="nav-item">
                                            <a class="nav-link disabled text-black fs-6" href="#">Có tài khoản?</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-secondary fs-6" href="{{ route('nguoidung.login') }}">
                                                Đăng nhập
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
