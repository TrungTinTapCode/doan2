<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
@include('header')


<style>

  </style>


  <div class="container">
    <h1>Đơn Hàng của bạn</h1>

    <!-- Danh sách sản phẩm -->
    <div class="product-list">
      <div class="product">
        <img src="https://via.placeholder.com/100" alt="Mỹ phẩm Drceutics">
        <div class="product-info">
          <h3>Mỹ phẩm Drceutics</h3>
          <p>Giá: 500,000 VND</p>

          <label for="quantity">Số lượng:</label>
          <input type="number" id="quantity" value="1" min="1">

        </div>
      </div>
    </div>

    <!-- Form thông tin giao hàng -->
    <div class="form-section">
      <h3>Thông Tin Giao Hàng</h3>
      <label for="address">Địa chỉ giao hàng <span class="required">*</span>:</label>
      <input type="text" id="address" placeholder="Nhập địa chỉ giao hàng">

      <label for="phone">Số điện thoại giao hàng <span class="required">*</span>:</label>
      <input type="tel" id="phone" placeholder="Nhập số điện thoại giao hàng">

      <label for="notes">Ghi chú (tùy chọn):</label>
      <textarea id="notes" rows="4" placeholder="Nhập ghi chú nếu có..."></textarea>

      <button type="button" onclick="submitOrder()">Xác Nhận Đặt Hàng</button>
    </div>
  </div>

  <script>
    function submitOrder() {
      const address = document.getElementById('address').value;
      const phone = document.getElementById('phone').value;

      // Kiểm tra bắt buộc
      if (!address || !phone) {
        alert("Địa chỉ giao hàng và số điện thoại là bắt buộc!");
        return;
      }

      // Thực hiện các bước xử lý đơn hàng
      alert("Đơn hàng của bạn đã được xác nhận! Cảm ơn bạn đã mua hàng.");
    }
  </script>




@include('footer')
</body>
</html>

