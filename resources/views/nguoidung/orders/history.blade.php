<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử</title>
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
    .text-2xl {
        font-size: 2.25rem; /* Điều chỉnh kích thước chữ tiêu đề */
        line-height: 2rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem; /* Tăng khoảng cách dưới tiêu đề */
    }

    .p-4 {
        padding: 1.5rem; /* Tăng khoảng cách bên trong mỗi đơn hàng */
    }

    .border {
    border: 1px solid #e0e0e0; /* Màu đường viền nhẹ nhàng */
    border-radius: 0px; /* Loại bỏ bo tròn góc */
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

    .mb-4 {
        margin-bottom: 1.5rem; /* Tăng khoảng cách giữa các đơn hàng */
    }

    .text-yellow-500 {
        color:rgb(239, 167, 1); /* Màu vàng cam cho trạng thái chờ duyệt */
    }

    .text-green-500 {
        color:rgb(0, 129, 30); /* Màu xanh lá cây cho trạng thái đã duyệt */
    }

    .list-disc {
        list-style-type: disc; /* Kiểu dấu chấm cho danh sách */
    }

    .list-inside {
        padding-left: 1.5rem; /* Thụt lề danh sách chi tiết */
    }

    .mt-2 {
        margin-top: 0.75rem; /* Tăng khoảng cách trên các phần tử */
    }

    /* Thêm bóng đổ nhẹ cho mỗi đơn hàng */
    /* .border {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    } */

    /* Стиль для заголовка "Chi tiết đơn hàng" */
    .mt-2 strong {
        font-weight: 600; /* In đậm tiêu đề */
        color: #333; /* Màu chữ đậm hơn */
    }

    /* Стиль cho các mục trong "Chi tiết đơn hàng" */
    .list-inside li {
        color: #555; /* Màu chữ nhạt hơn cho chi tiết */
        margin-bottom: 0.25rem; /* Khoảng cách nhỏ giữa các mục */
    }

    /* Стиль cho "Tổng tiền" */
    .mt-2:last-child strong {
        font-size: 1.1rem; /* Kích thước chữ lớn hơn cho tổng tiền */
        color:rgb(151, 0, 15); /* Màu đỏ cho tổng tiền */
    }
    .lsdonhang{
        margin-left: 200px;
        margin-right: 200px;
        margin-top: 50px;
    }
    .tongtien{
        font-size: 200px;
        margin-left: 900px;
    }
    </style>
</head>




<body>
@include('header')
<div class="lsdonhang">
<h2 class="text-2xl font-bold mb-4"><b>LỊCH SỬ ĐƠN HÀNG</b></h2>

@if($orders->count())
    @foreach($orders as $order)
        <div class="p-4 border rounded mb-4">
            <div>
                <strong>Mã đơn:</strong> #{{ $order->id }} |
                <strong>Ngày đặt:</strong> {{ $order->date_order->format('d/m/Y H:i') }} |
                <strong>Trạng thái:</strong>
                @if($order->status == 'pending')
                    <span class="text-yellow-500">Chờ duyệt</span>
                @else
                    <span class="text-green-500">Đã duyệt</span>
                @endif
            </div>

            <div class="mt-2">
                <strong>Chi tiết đơn hàng:</strong>
                <ul class="list-disc list-inside">
                    @foreach($order->orderDetails as $detail)
                        <li>{{ $detail->product->name }} - Số lượng: {{ $detail->quantity_order }} - Giá: {{ number_format($detail->price) }}đ</li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-2">
                <strong class="tongtien">Tổng tiền:</strong> {{ number_format($order->total) }}đ
            </div>
        </div>
    @endforeach
@else
    <p>Chưa có đơn hàng nào.</p>
@endif
</div>
@include('footer')
</body>
</html>
