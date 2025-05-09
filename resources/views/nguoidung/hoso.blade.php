<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Của Tôi</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffafa;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container-fluid {
            padding: 0;
        }

        .sidebar {
            background-color: white;
            border-right: 1px solid #f0f0f0;
            overflow: visible;
            padding: 20px 15px;
        }

        .main-content {
            background-color: #fffefe;
            padding: 25px 30px;
        }

        .main-content hr {
            border-color: #f0f0f0;
            margin: 15px 0 25px 0;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar i {
            color: #ccc;
            font-size: 20px;
        }

        .edit-link {
            color: #888;
            text-decoration: none;
            font-size: 0.85rem;
        }

        .edit-icon {
            color: #888;
            margin-right: 3px;
        }

        .menu-item {
            color: #333;
            text-decoration: none;
            padding: 8px 0;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
        }

        .menu-item:hover {
            color: #081fee;
        }

        .menu-icon {
            width: 24px;
            color: #0066ff;
            margin-right: 10px;
            font-size: 1.2rem;
            text-align: center;
        }

        .sub-menu {
            list-style: none;
            padding-left: 34px;
            margin-bottom: 15px;
        }

        .sub-menu li {
            padding: 6px 0;
        }

        .sub-menu a {
            color: #333333;
            text-decoration: none;
            font-size: 0.92rem;
        }

        .active {
            color: #1811ec !important;
        }

        .page-title {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .form-row {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .form-label {
            width: 20%;
            text-align: right;
            padding-right: 20px;
            color: #333;
            font-size: 0.95rem;
        }

        .form-field {
            width: 80%;
        }

        .form-control {
            max-width: 500px;
            padding: 10px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #1cd8e9;
        }

        .add-link,
        .change-link {
            color: #0066ff;
            text-decoration: none;
            margin-left: 10px;
        }

        .gender-options {
            display: flex;
        }

        .radio-container {
            display: flex;
            align-items: center;
            margin-right: 25px;
        }

        .radio-container input[type="radio"] {
            margin-right: 8px;
        }

        .date-selects {
            display: flex;
        }

        .date-select {
            width: 150px;
            margin-right: 10px;
            padding: 8px 12px;
            border: 1px solid #e0e0e0;
            border-radius: 2px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23888' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 14px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .save-button {
            background-color: #2d05f8;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 3px;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .profile-pic-area {
            margin-left: 20%;
            width: 120px;
            text-align: center;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #f5f5f5;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-btn {
            width: 100%;
            background-color: white;
            border: 1px solid #ddd;
            color: #333;
            padding: 6px;
            font-size: 0.85rem;
            border-radius: 2px;
            cursor: pointer;
        }

        .file-info {
            color: #888;
            font-size: 0.75rem;
            text-align: center;
            margin-top: 5px;
        }

        .sale-badge {
            background-color: #ee4d2d;
            color: white !important;
            border-radius: 4px;
            padding: 8px 10px;
        }

        .sale-badge .menu-icon {
            color: white !important;
        }

        .new-tag {
            background-color: #ee4d2d;
            color: white;
            font-size: 0.7rem;
            border-radius: 2px;
            padding: 1px 4px;
            margin-left: 5px;
        }

        .blue-icon {
            color: #0066ff;
        }

        .form-content {
            padding-top: 20px;
        }
    </style>
</head>

<body>
    @include('header')
    <div class="container-fluid">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-3 col-lg-2 sidebar border-end border-4">
                <div class="d-flex mb-4">
                    <div class="user-avatar me-3">
                        <i class="bi bi-person"></i>
                    </div>
                    <div>
                        <!-- <div>Nguyen Van A</div> -->
                        <div>{{ Auth::guard('customer')->user()->name }}</div>
                        <a href="#" class="edit-link">
                            <i class="bi bi-pencil edit-icon"></i>Sửa Hồ Sơ
                        </a>
                    </div>
                </div>

                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="bi bi-bell blue-icon"></i></span>
                    Thông Báo
                </a>

                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="bi bi-person-circle blue-icon"></i></span>
                    Tài Khoản Của Tôi
                </a>

                <ul class="sub-menu">
                    <li><a href="#" class="active">Hồ Sơ</a></li>
                    <li><a href="#">Ngân Hàng</a></li>
                    <li><a href="#">Địa Chỉ</a></li>
                    <li><a href="#">Đổi Mật Khẩu</a></li>
                    <li><a href="#">Cài Đặt Thông Báo</a></li>
                    <li><a href="#">Những Thiết Lập Riêng Tư</a></li>
                </ul>

                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="bi bi-file-text blue-icon"></i></span>
                    Đơn Mua
                </a>

                <a href="#" class="menu-item">
                    <span class="menu-icon"><i class="bi bi-ticket-perforated blue-icon"></i></span>
                    Kho Voucher
                </a>

            </div>

            <!-- Main Content -->
            <div class="col-6 col-lg-8 main-content">
                <h4 class="page-title">Hồ Sơ Của Tôi</h4>
                <p class="page-subtitle">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                <hr>

                <div class="form-content">
                    <div class="form-row">
                        <div class="form-label">Tên đăng nhập</div>
                        <div class="form-field">{{ Auth::guard('customer')->user()->username }}</div>
                        <!-- <div class="form-field">Nuyenvana123</div> -->
                    </div>

                    <div class="form-row">
                        <div class="form-label">Tên</div>
                        <div class="form-field"> {{ Auth::guard('customer')->user()->name }}</div>
                        <!-- <div class="form-field">
                            <input type="text" class="form-control">
                        </div> -->
                    </div>

                    <div class="form-row">
                        <div class="form-label">Email</div>
                        <div class="form-field">
                            {{ Auth::guard('customer')->user()->email }}
                            <a href="#" class="add-link">Đổi email</a>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-label">Số điện thoại</div>
                        <div class="form-field">
                            {{ Auth::guard('customer')->user()->phone }}

                            <a href="#" class="change-link">Thay Đổi</a>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-label">Giới tính</div>
                        <div class="form-field">
                            <div class="gender-options">
                                <label class="radio-container">
                                    <input type="radio" name="gender"> Nam
                                </label>
                                <label class="radio-container">
                                    <input type="radio" name="gender"> Nữ
                                </label>
                                <label class="radio-container">
                                    <input type="radio" name="gender"> Khác
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-label">Ngày sinh</div>
                        <div class="form-field">
                            <div class="date-selects">
                                <select class="date-select">
                                    <option>Ngày</option>
                                </select>
                                <select class="date-select">
                                    <option>Tháng</option>
                                </select>
                                <select class="date-select">
                                    <option>Năm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('nguoidung.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Đăng xuất</button>
                </form>
            </div>
            <div class="col-3 col-lg-1">
                <div class="row mt-4 mb-4">
                    <div class="col-10">
                        <div class="d-flex">
                            <div class="profile-pic-area text-center">
                                <div class="profile-pic">
                                    <i class="bi bi-person" style="font-size: 40px; color: #ccc;"></i>
                                </div>
                                <button class="upload-btn">Chọn Ảnh</button>
                                <div class="file-info mt-2">
                                    <div>Dung lượng file tối đa 1 MB</div>
                                    <div>Định dạng:.JPEG, .PNG</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label"></div>
                    <div class="form-field">
                        <button class="save-button">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5.3 JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    @include('footer')
</body>

</html>