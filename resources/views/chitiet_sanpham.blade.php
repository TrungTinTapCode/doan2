<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết </title>
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
            background: linear-gradient(135deg, rgba(255,255,255,0.8), rgba(240,240,240,0.5));
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

    </style>
</head>

<body>
    <div class="product-container">
        <div class="product-image">
            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info">
            <h1 class="product-title">{{ $product->name }} - @if ($product->volume){{ $product->volume }} @endif</h1>
            <div class="product-description">
                <p>{{ $product->description }}</p>
            </div>
            <!-- {{-- 
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                <button type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>
                </form>
            --}} -->
        </div>
    </div>
</body>
</html>

