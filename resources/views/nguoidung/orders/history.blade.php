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
</head>
<body>
@include('header')
<h2 class="text-2xl font-bold mb-4">Lịch Sử Đơn Hàng</h2>
    
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
                    <strong>Tổng tiền:</strong> {{ number_format($order->total) }}đ
                </div>
            </div>
        @endforeach
    @else
        <p>Chưa có đơn hàng nào.</p>
    @endif
@include('footer')
</body>
</html>