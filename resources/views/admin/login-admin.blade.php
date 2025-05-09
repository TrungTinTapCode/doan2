<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        body {
            background-color: azure;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-container {
            max-width: 1200px;
            width: 100%;
        }

        .carousel-container {
            width: 100%;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .login-container {
            max-width: 400px;
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
    </style>
</head>

<body>
    <div class="main-container row align-items-center">
        <div class="col-md-8">
            <div class="carousel-container">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/slide1.png') }}" class="d-block w-100" alt="Ảnh 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/slide2.png') }}" class="d-block w-100" alt="Ảnh 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Trước</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Tiếp</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="login-container">
                <div class="mb-4 text-center">
                    <img src="{{ asset('img/logo-01-01.png') }}" class="logo mb-2" alt="Drceutics Logo">
                    <h5 class="text-dark">ĐĂNG NHẬP HỆ THỐNG</h5>
                </div>

                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                        <label for="username">Tên đăng nhập</label>
                        @error('username')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                        <label for="password">Mật khẩu</label>
                        @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>