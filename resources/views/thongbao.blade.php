<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrCeutics - THÔNG BÁO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
@include('header')

<style>
    .thong-bao-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 20px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      display: flex;
      flex-wrap: wrap;
    }

    .thong-bao-img {
      position: relative;
      flex: 0 0 300px;
    }

    .thong-bao-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .ngay-thang {
      position: absolute;
      top: 10px;
      left: 10px;
      background: #666;
      color: white;
      padding: 5px 10px;
      font-weight: bold;
      border-radius: 2px;
      font-size: 14px;
      text-align: center;
    }

    .thong-bao-body {
      padding: 20px;
      flex: 1;
    }

    .btn-xem-them {
      border: 1px solid #aaa;
      background: white;
      padding: 5px 15px;
      text-decoration: none;
      color: #333;
      font-weight: 500;
    }

    .btn-xem-them:hover {
      background: #eee;
    }
    .banner-container {
      width: 100%;
      height: 400px; /* Bạn có thể thay đổi chiều cao tùy ý */
      overflow: hidden;
      position: relative;
    }

    .banner-container img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* Giữ tỉ lệ và cắt phần thừa */
    }
  </style>
</head>
<body>

  <div class="container-fluid p-0">
    <div class="banner-container">
      <img src="{{asset('img/banner thông báo.jpg')}}" alt="Banner">
    </div>
  </div>

<!--
<div class="container-fluid p-0">
    <img src="/doan2/resources/img/banner thông báo.jpg" alt="Banner" class="img-fluid w-100">
  </div> -->


  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="thong-bao-card">
          <div class="thong-bao-img">
            <div class="ngay-thang">11<br>Th3</div>
            <img src="{{asset('img/THONGBAO.png')}}" alt="Thông báo">
          </div>
          <div class="thong-bao-body">
            <h5 class="fw-bold">THÔNG BÁO CHƯƠNG TRÌNH SALE 30/4 - 1/5 </h5>
            <p>Chào mừng đại lễ kỉ niệm 50 năm ngày giải phóng miền Nam thống nhất Đất nước - Drceutics sale 30% cho tổng hóa đơn </p>
            <!-- <a href="#" class="btn-xem-them">Xem thêm</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="thong-bao-card">
          <div class="thong-bao-img">
            <div class="ngay-thang">11<br>Th3</div>
            <img src="{{asset('img/THONGBAO.png')}}" alt="Thông báo">
          </div>
          <div class="thong-bao-body">
            <h5 class="fw-bold">THÔNG BÁO CHƯƠNG TRÌNH RA MẮT SẢN PHẨM MỚI</h5>
            <p>GENTLE OLIVE SOOTHING MICELLAR WATER - Nước tẩy trang</p>
            <!-- <a href="#" class="btn-xem-them">Xem thêm</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="thong-bao-card">
          <div class="thong-bao-img">
            <div class="ngay-thang">11<br>Th3</div>
            <img src="{{asset('img/THONGBAO.png')}}" alt="Thông báo">
          </div>
          <div class="thong-bao-body">
            <h5 class="fw-bold">THÔNG BÁO CHƯƠNG TRÌNH ĐỔI BAO BÌ</h5>
            <p>THÔNG BÁO: Một số sản phẩm của DrCeutics sẽ thay đổi bao bì hoàn toàn mới, bắt mắt hơn và phù hợp hơn với giá trị sản phẩm </p>
            <!-- <a href="#" class="btn-xem-them">Xem thêm</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
</body>
</html>

