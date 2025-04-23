
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẢN PHẨM - DrCeutics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('./Css/bootstrap-icons-1.11.3/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/sanpham.css')}}">


</head>
<body>
@include('header')
<div class="banner">
  <div id="demo" class="carousel slide" data-bs-ride="carousel" style="cursor: pointer;">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="6"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="7"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="8"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/bn1.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn2.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn3.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 3">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn4.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 4">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn5.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 5">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn6.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 6">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn7.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 7">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn8.jpg')}}" class="d-block w-100" style="height: 42rem;" alt="Slide 8">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bn9.jpg')}}" class="d-block w-100" style="height: 45rem;" alt="Slide 9">
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>


<section class="py-5 bg-light">
  <div class="container">
    <div class="td1">
      <span>SẢN PHẨM NỔI BẬT</span>
    </div>

    <div class="row g-4">
    @foreach ($products as $product)
  <div class="col-md-4">
    <a href="{{ route('sanpham.show', $product->id) }}" class="text-decoration-none text-dark">
      <div class="card shadow rounded-3 h-100 text-center p-3">
        <img src="{{ asset('uploads/' . $product->image) }}" class="img-fluid mx-auto" style="height: 250px; object-fit: contain;" alt="{{ $product->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }} - @if ($product->volume){{ $product->volume }} @endif</h5>
          <p class="fw-bold">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
        </div>
      </div>
    </a>
  </div>
@endforeach

    </div>

  </div>
</section>


@include('footer')
</body>
</html>

