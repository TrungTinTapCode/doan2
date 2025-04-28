
@section('content')
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
@endsection
