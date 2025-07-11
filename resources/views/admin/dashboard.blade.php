<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
@include('menu')
<body class="bg-light">

    <div class="container-fluid py-4">
        <h3 class="fw-bold mb-4">📊 Dashboard quản trị</h3>

        <!-- Thống kê nhanh -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-2">
                <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                    <div class="bg-danger text-white rounded p-3 text-center shadow-sm">
                        <div class="fs-4">🛍️</div>
                        <div class="fs-5 fw-semibold">{{ $products }}</div>
                        <small>Sản phẩm</small>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-2">
                <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
                    <div class="bg-success text-white rounded p-3 text-center shadow-sm">
                        <div class="fs-4">📦</div>
                        <div class="fs-5 fw-semibold">{{ $orders }}</div>
                        <small>Đơn hàng</small>
                    </div>
                </a>
            </div>
            <!-- Thêm các khối thống kê khác nếu cần -->
        </div>

        <!-- Top sản phẩm doanh thu -->
        <div class="card shadow-sm mb-4">
            <div class="card-header fw-bold">
                🔝 Top 5 sản phẩm có doanh thu cao nhất tháng {{ \Carbon\Carbon::now()->format('m/Y') }}
            </div>
            <div class="card-body">
                <canvas id="topProductsChart" height="120"></canvas>
            </div>
        </div>

        <!-- Biểu đồ doanh thu theo tháng -->
        <div class="card shadow-sm">
            <div class="card-header fw-bold">📈 Biểu đồ doanh thu theo tháng</div>
            <div class="card-body">
                <canvas id="yearlyChart" height="120"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const topProductsCanvas = document.getElementById('topProductsChart');
        if (topProductsCanvas) {
            new Chart(topProductsCanvas.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartLabels, JSON_UNESCAPED_UNICODE) !!},
                    datasets: [{
                        data: {!! json_encode($chartData) !!},
                        backgroundColor: 'rgba(13, 110, 253, 0.7)',
                        borderColor: 'rgba(13, 110, 253, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: val => val.toLocaleString() + ' VND'
                            }
                        }
                    }
                }
            });
        }

        const yearlyCanvas = document.getElementById('yearlyChart');
        if (yearlyCanvas) {
            new Chart(yearlyCanvas.getContext('2d'), {
                type: 'line',
                data: {
                    labels: {!! json_encode(array_map(fn($m) => 'Tháng ' . $m, range(1, 12)), JSON_UNESCAPED_UNICODE) !!},
                    datasets: [{
                        data: {!! json_encode(array_values($yearlySales)) !!},
                        borderColor: '#28a745',
                        fill: false
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: val => val.toLocaleString() + ' VND'
                            }
                        }
                    }
                }
            });
        }
    });
    </script>
</body>
</html>
