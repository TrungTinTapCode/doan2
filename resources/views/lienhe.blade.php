<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrCeutics - LIÊN HỆ VỚI CHÚNG TÔI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
@include('nguoidung.header')
<style>

    .support-section {
      background: url('{{ asset('img/lienhe.jpg') }}') no-repeat center center;
      background-size: cover;
      height: 500px;
      padding: 80px 0;
      position: relative;
    }

    .support-overlay {
      background-color: rgba(221, 221, 221, 0.57);
      padding: 40px 20px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      height: 100%;
      transition: transform 0.3s ease;
    }

    .support-overlay:hover {
      transform: translateY(-5px);
    }

    .support-icon {
      font-size: 48px;
      color: #000;
      margin-bottom: 20px;
    }

    .btn-custom {
      background-color: #555;
      color: white;
      padding: 10px 24px;
      margin-top: 20px;
      border: none;
    }

    .btn-custom:hover {
      background-color: rgb(56, 56, 56) ;
      color: white;
    }
  </style>





<div class="support-section">
    <div class="container">
      <div class="row g-4">
        <!-- Hotline -->
        <div class="col-md-6">
          <div class="support-overlay">
            <div class="support-icon">
              <i class="bi bi-telephone-inbound"></i>
            </div>
            <h3>Hotline</h3>
            <p>Nếu bạn quan tâm DRCEUTICS, hãy nhấc máy lên và gọi</p>
            <a href="tel:+84987654321">
                <button class="btn btn-custom">(+84) 901 288 810</button>
            </a>
          </div>
        </div>

        <!-- Messenger -->
        <div class="col-md-6">
          <div class="support-overlay">
            <div class="support-icon">
              <i class="bi bi-chat-dots-fill"></i>
            </div>
            <h3>Fanpage</h3>
            <p>Đôi khi bạn cần hỗ trợ, đừng lo lắng chúng tôi ở đây vì bạn.</p>
            <a href="https://www.facebook.com/DrCeutics.VN">
                <button class="btn btn-custom">Kết nối với chúng tôi</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  @include('nguoidung.footer')
</body>
</html>

