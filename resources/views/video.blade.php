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
    <link rel="stylesheet" href="{{asset('./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">

</head>
<body>
@include('header')

<div class="container mt-5">
    <h4 class="mb-4">VIDEO</h4>
    <div class="row">
      <!-- Video 1 -->
      <div class="col-md-6 mb-4">
        <div class="ratio ratio-16x9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/rjNKlQJEL-U?si=mMkbWX_y_jnlajea" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <p class="mt-2">
          Nhận xét của PGS. TS. BS cao cấp NGUYỄN DUY HƯNG – Tổng thư kí Hội da liễu Việt Nam về sản phẩm Retinol 0.5% của nhà DrCeutics.
        </p>
      </div>

      <!-- Video 2 -->
      <div class="col-md-6 mb-4">
        <div class="ratio ratio-16x9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/n0WR5Gu6bxE?si=W0TGb1lV0Lu7UNHA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <p class="mt-2">
          Serum B5 phục hồi da Dexpanthenol 10% + Centella Extract + HA DrCeutics.
        </p>
      </div>
    </div>




    <div class="row2">
      <!-- Video 1 -->
      <div class="col-md-6 mb-4">
        <div class="ratio ratio-16x9">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/0F4fWHKZ-kY?si=2SPFJgXuwzd1YwXM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>        </div>
        <p class="mt-2">
          Nhận xét của PGS. TS. BS cao cấp NGUYỄN DUY HƯNG – Tổng thư kí Hội da liễu Việt Nam về sản phẩm Retinol 0.5% của nhà DrCeutics.
        </p>
      </div>
    </div>
  </div>



  @include('footer')
</body>
</html>

