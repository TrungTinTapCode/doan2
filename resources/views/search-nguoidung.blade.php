@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <form class="d-flex mb-4" action="{{ route('search-nguoidung') }}" method="GET" style="max-width: 400px; margin: auto;">
        <div class="input-group">
            <input type="search" name="keyword" class="form-control border border-secondary rounded-start-4" 
                   placeholder="Tìm kiếm..." aria-label="Search" value="{{ $keyword ?? '' }}" />
            <button type="submit" class="btn btn-secondary rounded-end-4">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>

    <h2 class="mt-4">Kết quả tìm kiếm cho: "{{ $keyword }}"</h2>

    @if ($products->count() > 0)
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                    <img src="{{ asset('img/no-image.png') }}" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">Chi tiết</a>
                        <button class="btn btn-success btn-sm add-to-cart" data-id="{{ $product->id }}">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(['keyword' => $keyword])->links() }}
        </div>
    @else
        <div class="alert alert-info mt-3">
            Không tìm thấy sản phẩm nào phù hợp với từ khoá "{{ $keyword }}".
        </div>
    @endif
</div>
@endsection