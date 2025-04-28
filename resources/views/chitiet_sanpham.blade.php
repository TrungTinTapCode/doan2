<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css') }}">
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
            background-color:rgb(105, 105, 105); /* màu cam nổi bật */
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-left: 345px;
            margin-bottom: 20px;
        }

        .add-to-cart:hover {
            background-color:rgb(121, 121, 121); /* đậm hơn khi hover */
            transform: translateY(-2px);
        }

        .add-to-cart:active {
            background-color:rgb(196, 196, 196);
            transform: translateY(0);
        }

        .add-to-cart:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(130, 130, 130, 0.4);
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
                    <h1> <?= ($product['price']) ?>đ</h1>
                </div>
                <br>
                <button type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>
                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

            </form>

        </div>
    </div>
    @include('footer')
</body>

</html>
