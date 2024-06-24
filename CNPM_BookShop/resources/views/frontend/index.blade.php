@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Trang chủ')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach ($banners as $banner)
            <div class="hero__items set-bg" data-setbg="{{ $banner->photo }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>SIÊU KHUYỄN MÃI</h6>
                                <h2>{{ $banner->title }}</h2>
                                <p>{!! $banner->description !!}</p>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<section class="banner spad">

</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Tất Cả</li>
                    <li data-filter=".new-arrivals">Sản phẩm nổi bật</li>
                    <li data-filter=".hot-sales">Sản phẩm bán chạy</li>

                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @if ($product_lists)
                @foreach ($product_lists as $key => $product)
                    <div class="col-lg-2 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{ $product->cat_id }}">
                        <div class="product__item">
                            @php
                                $photo = explode(',', $product->photo);
                            @endphp
                            <div class="product__item__pic set-bg" data-setbg="{{ $photo[0] }}">
                                <span class="label">{{ $product->condition }}</span>
                                <ul class="product__hover">
                                    <li><a href="{{ route('add-to-wishlist', $product->slug) }}"><img
                                                src="{{ asset('frontend/img/icon/heart.png') }}" alt=""></a>
                                    </li>
                                    <li><a href="{{ route('product-detail', $product->slug) }}"><img
                                                src="{{ asset('frontend/img/icon/search.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $product->title }}</h6>
                                <a href="{{ route('add-to-cart', $product->slug) }}" class="add-cart">+Thêm vào giỏ</a>
                                <div class="rating">
                                    @foreach ($product['getReview'] as $data)
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($data->rate >= $i)
                                                <i class="fa fa-star"></i>
                                                {{-- <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> --}}
                                                @else
                                                <i class="fa fa-star-o"></i>
                                                @endif
                                                @endfor
                                            @endforeach
                                </div>
                                @php
                                    $discount = $product->price - ($product->price * $product->discount) / 100;
                                @endphp
                                <h5>{{ number_format($discount), 2 }}VNĐ</h5>
                                <div class="product__color__select">
                                    <label for="pc-1">
                                        <input type="radio" id="pc-1">
                                    </label>
                                    <label class="active black" for="pc-2">
                                        <input type="radio" id="pc-2">
                                    </label>
                                    <label class="grey" for="pc-3">
                                        <input type="radio" id="pc-3">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- Product Section End -->


 <!-- Instagram Section Begin -->
 <section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    <div class="instagram__pic__item set-bg" data-setbg="frontend/img/instagram/instagram-1.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="frontend/img/instagram/instagram-2.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="frontend/img/instagram/instagram-3.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="frontend/img/instagram/instagram-4.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="frontend/img/instagram/instagram-5.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="frontend/img/instagram/instagram-6.jpg"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2>Mạng Xã Hội</h2>
                    <p>Had Fashion giúp bạn hoàn thành routine chăm sóc da mụn với 5 bước cơ bản, bằng các sản phẩm ở mức giá bình dân dễ tiếp cận.</p>
                    <h3>#DA-Books</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Bài viết</span>
                    <h2>Những bài viết có thể bạn quan tâm</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($posts)
                @foreach ($posts as $key => $post)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ $post->photo }}"></div>
                            <div class="blog__item__text">
                                <span><img src="img/icon/calendar.png" alt="">
                                    {{ $post->created_at->format('d,M,Y') }}</span>
                                <h5>{{ $post->title }}</h5>
                                <a href="{{ route('blog.detail', $post->slug) }}">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</section>
<!-- Latest Blog Section End -->
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    var $topContainer = $('.mix');
    var $filter = $('.filter__controls')

    // filter items on button click
    $filter.each(function() {
        $filter.on('click', 'a', function() {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({
                filter: filterValue
            });
        });

    });

    // init Isotope
    $(window).on('load', function() {
        var $grid = $topeContainer.each(function() {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine: 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });
</script>
@endpush
