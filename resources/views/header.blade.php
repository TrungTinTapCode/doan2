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

            <!-- Thanh tìm kiếm + biểu tượng người dùng + giỏ hàng -->
            <div class="d-flex align-items-center gap-3">
                <!-- Tìm kiếm -->
                <form class="position-relative" action="{{ route('search-nguoidung') }}" method="GET" style="max-width: 280px;">
                    <input class="form-control rounded-pill px-4 shadow-sm" type="search" placeholder="Tìm kiếm..." name="keyword">
                    <button type="submit" class="btn position-absolute top-50 end-0 translate-middle-y me-2" style="border: none; background: transparent;">
                        <i class="bi bi-search text-secondary"></i>
                    </button>
                </form>

                <!-- Người dùng -->
                <!-- <div class="dropdown">
                    <a href="#" class="text-dark dropdown-toggle d-flex align-items-center" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li><a class="dropdown-item" href="{{ route('admin.login') }}">Quản lý</a></li>
                        <li><a class="dropdown-item" href="{{ route('nguoidung.hoso') }}">Người dùng</a></li>
                    </ul>
                </div> -->
                <!-- Người dùng -->
                @if(Auth::guard('customer')->check())
                <!-- Nếu người dùng đã đăng nhập -->
                <a href="{{ route('nguoidung.hoso') }}" class="text-dark d-flex align-items-center">
                    <i class="bi bi-person-circle fs-4"></i>
                </a>
                @else <!-- Nếu người dùng chưa đăng nhập -->
                <div class="dropdown">
                    <button class="btn text-dark dropdown-toggle border-0" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li><a class="dropdown-item" href="{{ route('admin.login') }}">Quản lý</a></li>
                        <li><a class="dropdown-item" href="{{ route('nguoidung.login') }}">Người dùng</a></li>
                    </ul>
                </div>
                @endif
                
                <!-- Giỏ hàng -->
                <a href="{{ asset('cart') }}" class="text-dark d-flex align-items-center">
                    <i class="bi bi-cart fs-4"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    input[type="search"]::-webkit-search-cancel-button {
        -webkit-appearance: none;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>