<!-- Header -->
<nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand " href="index.blade.php">
                <img src="{{asset('img/logo-01-01.png')}}" alt="Logo" height="100" width="100%">
            </a>

            <!-- Nút Toggle cho Mobile -->
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <!-- Noi dung navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.blade.php"></i> TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sanpham.php"></i> SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="thongbao.php"></i> THÔNG BÁO</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="blog.php"></i> BLOG</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="lienhe.php"></i> LIÊN HỆ CHÚNG TÔI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="video.php"></i> VIDEO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dst.php"></i><b> DST</b></a>
                    </li>
                </ul>

                <!-- Tìm kiếm và Icon Người dùng, Giỏ hàng -->
                <form class="d-flex mb-2 mb-lg-0 ">
                    <input class="form-control me-4 border border-secondary rounded-4" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                </form>

                <div class="d-flex align-items-center">
                    <a href="./nguoidung.html" class="text-dark me-4"><i
                            class="bi bi-person-circle fs-4 nav-icon"></i></a>
                    <a href="giohang.php" class="text-dark"><i class="bi bi-cart fs-4 nav-icon"></i></a>
                </div>
            </div>
        </div>
    </nav>

