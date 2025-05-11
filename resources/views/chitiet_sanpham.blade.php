<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .product-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #ffffff, #f0f0f0);
            position: relative;
            overflow: hidden;
        }

        .product-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(240, 240, 240, 0.5));
            z-index: 0;
        }

        .product-image {
            flex: 1;
            padding: 20px;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
        }

        .product-info {
            flex: 1;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .product-title {
            font-size: 2.5rem;
            color: #555;
            margin-bottom: 20px;
            border-bottom: 3px solid #555;
            padding-bottom: 10px;
        }

        .product-description {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
            margin-top: 20px;
        }

        .certificate-icon {
            width: 50px;
            height: 50px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
            }

            .product-title {
                font-size: 1.8rem;
            }
        }

        .product-gia {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .add-to-cart {
            background-color: rgb(105, 105, 105);
            /* màu cam nổi bật */
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Loại bỏ margin-left cố định */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .add-to-cart:hover {
            background-color: rgb(121, 121, 121);
            /* đậm hơn khi hover */
            transform: translateY(-2px);
        }

        .add-to-cart:active {
            background-color: rgb(196, 196, 196);
            transform: translateY(0);
        }

        .add-to-cart:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(130, 130, 130, 0.4);
        }

        /* Khung chứa toàn bộ đánh giá */
        div>h4 {
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Mỗi bình luận */
        div>div.mb-2 {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 10px;
        }

        /* Tên khách hàng */
        div>div.mb-2 strong {
            color: #0d6efd;
        }

        /* Thời gian đăng bình luận */
        div>div.mb-2 small {
            color: #6c757d;
            font-style: italic;
        }

        /* Form textarea */
        form textarea {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
        }

        /* Nút gửi đánh giá */
        form button[type="submit"] {
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: bold;
        }

        /* Đoạn "Đăng nhập để đánh giá" */
        p>a[href*="login"] {
            color: blue;
        }

        p > a[href*="login"] {
            color:rgb(61, 61, 61); /* Màu xanh dương, bạn có thể thay đổi */
            font-weight: bold; /* Làm đậm chữ */
            text-decoration: none; /* Loại bỏ gạch chân mặc định */
            padding: 8px 15px; /* Thêm padding xung quanh link */
            border-radius: 5px; /* Bo tròn nhẹ góc */
            background-color: #f8f9fa; /* Màu nền nhạt */
            border: 1px solid #dee2e6; /* Viền mỏng */
            transition: background-color 0.3s ease, color 0.3s ease; /* Hiệu ứng chuyển màu mượt mà */
        }

        p > a[href*="login"]:hover {
            background-color: #e9ecef; /* Màu nền nhạt hơn khi hover */
            color:rgb(0, 0, 0); /* Màu chữ đậm hơn khi hover */
        }

        button[type="submit"].btn-primary {
        background-color:rgb(0, 103, 171) !important; /* Màu xanh lá cây */
        border-color:rgb(0, 103, 171) !important;
    }

    button[type="submit"].btn-primary:hover {
        background-color:rgb(0, 124, 206)  !important; /* Màu xanh lá cây đậm hơn khi hover */
        border-color:rgb(0, 124, 206)  !important;
    }
    </style>
</head>

<body>
    @include('header')
    <div class="product-container">
        <div class="product-image">
            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info">
            <h1 class="product-title">{{ $product->name }} - @if ($product->volume){{ $product->volume }} @endif</h1>
            <div class="product-description">
                <p>{{ $product->description }}</p>
            </div>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="product-gia">
                    <h1> {{ $product->price }}đ</h1>
                </div>
                <br>
                <button type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </form>

            <div>
                <h4>Đánh giá sản phẩm:</h4>
                @foreach($product->comments as $comment)
                    <div class="mb-2">
                        <strong>{{ $comment->customer->name }}</strong>:
                        {{ $comment->content }} <br>
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>
            @if(auth()->guard('customer')->check())
                <form method="POST" action="{{ route('comments.store', $product->id) }}">
                    @csrf
                    <textarea name="content" class="form-control" rows="3" required></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Gửi đánh giá</button>
                </form>
            @else
            <br>
                <p><a href="{{ route('nguoidung.login') }}">Đăng nhập để đánh giá</a></p>
            @endif
        </div>
    </div>

    @include('footer')
</body>

</html>
