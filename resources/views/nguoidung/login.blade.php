<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
            width: 500px;
            height: 500px;
            object-fit: contain;
        }
    </style>
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
                        <a class="nav-link disabled text-black fs-6" href="#">Đăng nhập</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row w-100 align-items-center">
            <div class="col-md-8">
                <div class="carousel-container">
                    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/bg-slide3.webp') }}" class="d-block w-100" alt="Ảnh 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/bg-slide4.webp') }}" class="d-block w-100" alt="Ảnh 2">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Trước</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Tiếp</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex justify-content-center">
                <div class="login-container">
                    <div class="mb-4 text-center">
                        <img src="{{ asset('img/logo-01-01.png') }}" class="logo mb-2" alt="Drceutics Logo">
                        <h5 class="text-dark">ĐĂNG NHẬP</h5>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-lg focus-primary rounded-0" name="username" id="username" placeholder="Tên đăng nhập">
                            <label for="username">Tên đăng nhập</label>
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-lg focus-primary rounded-0" name="password" id="password" placeholder="Mật khẩu">
                            <label for="password">Mật khẩu</label>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn bg-black text-white rounded-0 fs-5" type="submit">Đăng nhập</button>
                        </div>

                        <nav class="navbar navbar-expand-sm bg-light navbar-light rounded mb-3">
                            <div class="container-fluid">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <a class="nav-link disabled text-black fs-6" href="#">Chưa có tài khoản?</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link-secondary fs-6" href="{{ route('nguoidung.register') }}">Đăng ký</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if(session('success'))
                        <div id="success-alert" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function () {
                                const successAlert = document.getElementById('success-alert');
                                if (successAlert) {
                                    successAlert.style.transition = 'opacity 0.5s ease';
                                    successAlert.style.opacity = '0';
                                    setTimeout(() => successAlert.remove(), 500);
                                }
                            }, 3000);
                        </script>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
