<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid d-flex align-items-center">
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route ('home')}}">Trang chủ người dùng</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">Danh sách sản phẩm</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.categories.index') }}">Danh sách danh mục</a></li>
                <li><a class="dropdown-item" href="{{route('admin.products.create') }}">Thêm sản phẩm mới</a></li>
                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>


                <!-- <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Đăng xuất</button>
                    </form>
                </li> -->

            </ul>
        </div>
<!--
        <div style="flex-grow: 1; text-align: center;">
            <a class="navbar-brand" href="{{route('home')}}" style="display: inline-block; width: 30%;">
                <img src="{{asset ('img/logo-01-01.png') }}" alt="Logo">
            </a>
        </div> -->

        <div style="width: 40px;"></div> </div>
</nav>

<style>
    body {
        padding-top: 100px; /* đẩy nội dung xuống dưới thanh navbar */
    }

    .navbar .container-fluid {
        display: flex; /* Đảm bảo container-fluid là flex container */
        justify-content: flex-start; /* Bắt đầu các phần tử từ bên trái */
    }

    .navbar .dropdown {
        margin-right: 20px; /* Thêm một chút khoảng cách bên phải dropdown */
    }

    .navbar-brand {
        /* Loại bỏ các thuộc tính căn giữa tuyệt đối */
        position: static;
        transform: none;
        display: block; /* Để width 30% có hiệu lực */
        margin: 0 auto; /* Căn giữa logo trong container 30% */
    }

    .navbar-brand img {
        width: 30%;
        /* height: auto;
        max-height: 30px; */
    }
</style>
