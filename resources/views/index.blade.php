<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrCeutics - HOME</title>
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
    <!-- Content -->

    <div class="banner">
    <div id="demo" class="carousel slide" data-bs-ride="carousel" style="cursor: pointer;">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/Dr_BannerSlide_VitaminC (1).jpg') }}" alt="Event" class="d-block" style="width:100%; height: 42rem;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/Dr_BannerSlide_BHA (2).jpg') }}" alt="Event2" class="d-block" style="width:100%; height: 42rem;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset ('img/Dr_BannerSlide_B510 (3).jpg') }}" alt="Story" class="d-block" style="width:100%; height: 42rem;">
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

        <div class="in4">
            <div class="tieude1">
            <div class="td1">
                <span>TẠI SAO NÊN CHỌN DrCEUTICS?</span>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-md-5" id="hinh1">
                <!-- Nội dung cột bên trái -->
                <img src="{{asset('img/KH1.jpg')}}" alt="" width="100%">
                </div>

                <div class="col-md-5" id="nd1">
                <!-- Nội dung cột bên phải -->
                <h3><b>KHOA HỌC – AN TOÀN – HIỆU QUẢ</b></h3><hr style="height: 5px; border-radius:5px">
                <h4>LÀM ĐẸP DỰA TRÊN KHOA HỌC</h4>
                    <p>Các sản phẩm DrCeutics được phát triển đều dựa trên những vấn đề thực tế nhất từ tập khách hàng lớn nhằm đem đến giải pháp hữu hiệu trên cơ sở khoa học</p>
                <br>
                <h4> THIẾT KẾ AN TOÀN</h4>
                  <p>Nồng độ hoạt chất tối ưu và công thức tối giản là những tiêu chuẩn để sản phẩm đạt hiệu quả cao và thích ứng tốt với làn da.
                    <br>Sản phẩm không chứa cồn, hương liệu, chất tạo màu nhân tạo, paraben, không thử nghiệm trên động vật.
                    </p>
                <br>
                <h4>SẢN PHẨM HIỆU QUẢ</h4>
                    <p>Tính hiệu quả của một sản phẩm đến từ thành phần chất lượng, hoạt tính phù hợp với từng vấn đề về da.
                    <br>Sản phẩm của DrCeutics còn đặc biệt quan tâm đển dạng bào chế với pH phù hợp để sản phẩm vừa hiệu quả vừa an toàn.</p>
                </div>
            </div>
        </div>

        </div>





        <div class="spnoibat">
    <div class="container text-center my-5">
        <div class="td2">
            <span class="section-title">SẢN PHẨM NỔI BẬT</span>
        </div>

        <div id="carouselProduct" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i = 0;
                @endphp
                @foreach ($featuredProducts->chunk(3) as $chunk)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">
                            @foreach ($chunk as $product)
                                <div class="col-md-4">
                                    <a href="{{ route('sanpham.show', $product->id) }}">
                                        @if ($product->image)
                                            <img src="{{ asset('uploads/' . $product->image) }}" class="d-block mx-auto product-img" alt="{{ $product->name }}" width="100%">
                                        @else
                                            <img src="{{ asset('img/default-product.png') }}" class="d-block mx-auto product-img" alt="No Image" width="100%">
                                        @endif
                                        <p class="mt-3">{{ $product->name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>

            @if ($featuredProducts->count() > 3)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
                </button>
            @endif
        </div>
    </div>
</div>


        <div class="chatluong">
            <div class="tieude3">
            <div class="td3">
                <span>SẢN PHẨM CHẤT LƯỢNG QUỐC TẾ NGAY TRÊN ĐẤT VIỆT</span>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
            <div class="col-md-6" id="nd2">
                <!-- Nội dung cột bên phải -->
                <!-- <h3><b>KHOA HỌC – AN TOÀN – HIỆU QUẢ</b></h3><hr style="height: 5px; border-radius:5px"> -->
                <h3>THÀNH PHẦN CAO CẤP</h3>
                    <p>Thành phần có nguồn gốc rõ ràng từ các nhà cung cấp Châu Âu, Mỹ với bề dày lịch sử trong ngành nguyên liệu nhằm đảm bảo tính an toàn, thân thiện với làn da cũng như môi trường.</p>
                <br>
                <h3>CÔNG THỨC HIỆN ĐẠI</h3>
                  <p>Các sản phẩm được tạo ra đều dựa trên những nghiên cứu khoa học và thực nghiệm từ khách hàng sử dụng. Các cải tiến mới nhất về dạng bào chế của thành phần đảm bảo đem đến một thiết kế thông minh và ưu việt nhất cho làn da.</p>
                <br>
                <h3>QUY TRÌNH SẢN XUẤT ĐẠT TIÊU CHUẨN CAO</h3>
                    <p>Quy trình sản xuất được kiểm tra nghiêm ngặt ở tất cả các khâu. Tất cả các lô đều gửi mẫu kiểm tra đến các phòng thí nghiệm độc lập, số liệu rõ ràng, độ chính xác cao.</p>
                </div>



                <div class="col-md-4" id="hinh1">
                <!-- Nội dung cột bên trái -->
                <img src="{{asset('img/sp chất lượng ngay đất Việt.jpg')}}" alt="" width="120%">
                </div>


            </div>
        </div>

        </div>




        <section class="blog-section">
  <div class="container">
  <div class="td4">
                <span>BLOG</span>
            </div>
    <div class="row g-4">

      <!-- Blog item 1 -->
      <div class="col-md-4">
        <div class="card blog-card h-100">
          <div class="position-relative">
            <img src="{{asset('img/THONGBAO.png')}}" class="card-img-top" alt="Blog Image 1">
            <div class="blog-date">
              11<br>Th3
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">THÔNG BÁO CHƯƠNG TRÌNH MARKETING ĐỂ QUẢNG BÁ SẢN PHẨM</h5>
            <p class="card-text text-muted">
              THÔNG BÁO (V/v chương trình Marketing để quảng bá sản phẩm) Kính gửi: Quý khách hàng, Quý đại lý và [...]
            </p>
          </div>
        </div>
      </div>

      <!-- Blog item 2 -->
      <div class="col-md-4">
        <div class="card blog-card h-100">
          <div class="position-relative">
            <img src="{{asset('img/THONGBAO.png')}}" class="card-img-top" alt="Blog Image 2">
            <div class="blog-date">
              23<br>Th12
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">THÔNG BÁO CHƯƠNG TRÌNH MARKETING ĐỂ QUẢNG BÁ SẢN PHẨM</h5>
            <p class="card-text text-muted">
              THÔNG BÁO (V/v chương trình Marketing để quảng bá sản phẩm) Kính gửi: Quý khách hàng, Quý đại lý và [...]
            </p>
          </div>
        </div>
      </div>

      <!-- Blog item 3 -->
      <div class="col-md-4">
        <div class="card blog-card h-100">
          <div class="position-relative">
            <img src="{{asset('img/THONGBAO.png')}}" class="card-img-top" alt="Blog Image 3">
            <div class="blog-date">
              08<br>Th8
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">THÔNG BÁO ĐIỀU CHỈNH MÙI HƯƠNG SẢN PHẨM NIACINAMIDE 10% + ALPHA ARBUTIN</h5>
            <p class="card-text text-muted">
              THÔNG BÁO (V/v điều chỉnh mùi hương sản phẩm Niacinamide 10% + Alpha Arbutin 2% Body Lotion) [...]
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


@include('footer')
</body>
</html>
