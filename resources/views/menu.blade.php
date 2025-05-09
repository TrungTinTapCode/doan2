<div class="sidebar fixed-top bg-light">
    <ul class="nav flex-column pt-5">
        <li>
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset ('img/logo-01-01.png') }}" alt="Logo" height="100" width="80%" align="center">
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route ('home')}}">
                <i class="bi bi-house-door me-2"></i> Trang chủ người dùng
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.orders.index') }}">
                <i class="bi bi-list-task me-2"></i> Danh sách đơn hàng
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.products.index') }}">
                <i class="bi bi-box-seam me-2"></i> Danh sách sản phẩm
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <i class="bi bi-tags me-2"></i> Danh sách danh mục
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.products.create') }}">
                <i class="bi bi-plus-square me-2"></i> Thêm sản phẩm mới
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.comments.index') }}">
                <i class="bi bi-plus-square me-2"></i> Quản lý bình luận
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.register') }}">
                <i class="bi bi-plus-square me-2"></i> Thêm tài khoản admin
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-box-arrow-left me-2"></i> Đăng xuất
            </a>
        </li>
    </ul>
</div>

<div class="content">
    @yield('content') {{-- Nơi nội dung trang của bạn sẽ hiển thị --}}
</div>
<style>
   body {
    margin-left: 250px; /* Khoảng cách bên trái để nhường chỗ cho sidebar */
    padding-top: 60px; /* Đảm bảo nội dung không bị che bởi sidebar cố định */
    transition: margin-left 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà (tùy chọn) */
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 230px; /* Độ rộng của sidebar */
    background-color: #f8f9fa; /* Màu nền sidebar (có thể tùy chỉnh) */
    border-right: 1px solid #e0e0e0; /* Đường viền bên phải */
    padding-top: 0px; /* Loại bỏ khoảng cách phía trên */
    z-index: 1000; /* Đảm bảo sidebar ở trên các phần tử khác */
    overflow-y: auto; /* Cho phép cuộn nếu nội dung sidebar quá dài */
}

.sidebar .nav {
    padding: 0.5rem;
}

.sidebar .nav-item .nav-link {
    padding: 0.75rem 1rem;
    color: #333;
    border-radius: 0.25rem;
    transition: background-color 0.15s ease;
}

.sidebar .nav-item .nav-link:hover {
    background-color: #e9ecef;
}

.sidebar .nav-item .nav-link i {
    font-size: 1rem;
    vertical-align: middle;
}

/* Стиль cho phần content để nó không bị sidebar che khuất */
.content {
    padding: 15px;
}

/* Điều chỉnh nếu bạn có một header cố định */
nav.fixed-top {
    left: 240px; /* Đẩy header sang phải bằng độ rộng sidebar */
    transition: left 0.3s ease;
}
.sidebar .navbar-brand {
    display: block; /* Đảm bảo nó là một block-level element để có thể căn giữa */
    text-align: center; /* Căn giữa nội dung bên trong (trong trường hợp có text) */
    width: 80%; /* Giữ nguyên độ rộng bạn đã đặt */
    margin: 0 auto; /* Căn giữa block-level element theo chiều ngang */
}

.sidebar .navbar-brand img {
    max-width: 100%; /* Đảm bảo ảnh không vượt quá kích thước container */
    height: auto;
    display: block; /* Loại bỏ khoảng trắng thừa dưới ảnh */
    margin: 0 auto; /* Căn giữa ảnh theo chiều ngang trong .navbar-brand */
}
</style>
