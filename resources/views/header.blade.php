<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset ('img/logo-01-01.png') }}" alt="Logo" height="100" width="100%">
        </a>

        <!-- Nội dung navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sanpham') }}">SẢN PHẨM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('thongbao')}}">THÔNG BÁO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('lienhe')}}">LIÊN HỆ CHÚNG TÔI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('video')}}">VIDEO</a>
                </li>
            </ul>

            <!-- Thanh tìm kiếm và các nút -->
            <div class="d-flex align-items-center">
                <form class="d-flex position-relative" action="{{ route('search-nguoidung') }}" method="GET" style="max-width: 300px; margin-right: 20px;">
                    <input class="form-control border px-3" type="search" placeholder="Tìm kiếm..." aria-label="Tìm kiếm" name="keyword" style="border-radius: 50px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
                    <button type="submit" class="btn btn-light position-absolute top-50 end-0 translate-middle-y me-2" style="border: none; background-color: transparent;">
                        <i class="bi bi-search text-muted"></i>
                    </button>
                </form>
                <style>
                    /* Tắt dấu "X" mặc định trên các trình duyệt Webkit */
                    input[type="search"]::-webkit-search-cancel-button {
                        -webkit-appearance: none;
                        appearance: none;
                    }
                </style>

                <a href="{{ route('nguoidung.hoso') }}" class="text-dark me-4 d-flex align-items-center" style="color: #333; font-size: 1.2rem;">
                    <i class="bi bi-person-circle fs-4 nav-icon"></i>
                </a>

                <a href="{{asset('cart')}}" class="text-dark d-flex align-items-center" style="color: #333; font-size: 1.2rem;">
                    <i class="bi bi-cart fs-4 nav-icon"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

