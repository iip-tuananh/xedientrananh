@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
@endsection
@section('content')

<div class="section-main section-main--index">
    <div class="container">
    <div class="row">
        <div class="col-lg-cus">
            <div class="main-menu mainMenujs">	</div>
        </div>
        <div class="col-lg block-slider">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12  p-0 left-slider" id="left-slider">
                <div class="home-slider" id="home-slider">
                    <div class="slider-owl owl-carousel ">
                        @foreach($banners as $banner)
                            <div class="slider-item">
                                <div class="slide--image">
                                    <a href="/collections/all" title="ALt banner 1">
                                        <picture>
                                            <source media="(max-width: 767px)" srcset="{{ $banner->image->path ?? '' }}" />
                                            <source media="(min-width: 768px)" srcset="{{ $banner->image->path ?? '' }}" />
                                            <img src="{{ $banner->image->path ?? '' }}" alt="ALt banner 1"/>
                                        </picture>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 right-banner">
                <div id="group-banner-right">
                    @foreach($smallBanners as $smallBanner)
                        <div class="box-banner effect-shine">
                            <a href="/" aria-label="banner top 1">
                                <picture>
                                    <source class="lazyload" media="(max-width: 991px)" data-srcset="{{ $smallBanner->image->path ?? '' }}"
                                            srcset="{{ $smallBanner->image->path ?? '' }}" />
                                    <source class="lazyload" media="(min-width: 992px)" data-srcset="{{ $smallBanner->image->path ?? '' }}"
                                            srcset="{{ $smallBanner->image->path ?? '' }}" />
                                    <img class="lazyload" data-src="{{ $smallBanner->image->path ?? '' }}" alt="banner top 1"
                                         src="{{ $smallBanner->image->path ?? '' }}" />
                                </picture>
                            </a>
                        </div>
                    @endforeach

                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<main class="wrapperMain_content">
    <section class="home-category">

        @if(@$bannerGroups[0] && $bannerGroups[0]->galleries->count())
            <div class="container">
                <div class="list-item">
                    @foreach($bannerGroups[0]->galleries as $bannerGallery)
                        <div class="category-item col-lg col-md-6 col-6">
                            <div class="category-item--inner">
                                <div class="category-item--image">
                                    <a href="/collections/all" aria-label="">
                                        <img class="lazyload" data-src="{{ $bannerGallery->image->path ?? '' }}"
                                             src="{{ $bannerGallery->image->path ?? '' }}"
                                             alt="">
                                    </a>
                                </div>
                                <div class="category-item--title">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </section>

    @foreach($categorySpecialFlashsale as $cateFlash)
        <section class="home-collection-1">
            <div class="container container-pd-parent">
                <div class="wrapper-content row-mg-parent">
                    <div class="box-listprod">
                        <div class="section-heading pd-right">
                            <h2 class="hTitle"><a href="/collections/onsale">{{ $cateFlash->name }}</a></h2>
                            <div class="box-countdown flip-js-countdown">
                                <div class="auto-due soon"
                                     data-end="2024-5-30T10:00:00"
                                     data-start="2024-5-30T10:00:00"
                                     data-face="slot"
                                     data-format="d,h,m,s"
                                     data-labels-days="Dia,Ngày"
                                     data-labels-hours="Hora,Giờ"
                                     data-labels-minutes="Minuto,Phút"
                                     data-labels-seconds="Segundo,Giây">
                                    <span id="label-due"></span>
                                    <div id="soon-espa"></div>
                                </div>
                            </div>
                        </div>
                        <div class="listProduct-row owl-carousel owlCarousel-style owlCarousel-dfex icon-arrow">
                            @foreach($cateFlash->products as $product)
                                @include('site.products.product_item', ['product' => $product])
                            @endforeach
                        </div>
                        <div class="box-link">
                            <a href="/collections/onsale" class="button">
                                Xem tất cả SẢN PHẨM KHUYẾN MÃI
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                        <circle class="st0" cx="16" cy="16" r="13"/>
                                    <polyline class="st0" points="14,11.8 18.2,16 14,20.2 "/>
                    </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach



{{--    <section class="home-coupon coupon-initial ">--}}
{{--    <div class="container">--}}
{{--        <div class="title-coupon">--}}
{{--            <h2>Khuyến mãi dành cho bạn</h2>--}}
{{--        </div>--}}
{{--        <div class="listCoupon">--}}
{{--            <div class="col-12 col-md-6 col-xl-3 coupon-item">--}}
{{--                <div class="coupon-item__inner">--}}
{{--                <div class="coupon-item__left">--}}
{{--                    <div class="cp-img boxlazy-img">--}}
{{--                        <span class="boxlazy-img__insert">--}}
{{--                        <img class="lazyload" data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_1_img.png?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_1_img.png?v=162" alt="Miễn phí vận chuyển">--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="coupon-item__right">--}}
{{--                    <button type="button" class="cp-icon"--}}
{{--                        data-toggle="popover" data-container="body"	data-placement="bottom"--}}
{{--                        data-popover-content="#cp-tooltip-1"	data-class="coupon-popover" title="Miễn phí vận chuyển ">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve">--}}
{{--                            <g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,0C114.511,0,0,114.496,0,256c0,141.489,114.496,256,256,256c141.489,0,256-114.496,256-256    C512,114.511,397.504,0,256,0z M256,476.279c-121.462,0-220.279-98.817-220.279-220.279S134.538,35.721,256,35.721    S476.279,134.538,476.279,256S377.462,476.279,256,476.279z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,203.609c-9.864,0-17.86,7.997-17.86,17.86v146.456c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86V221.47    C273.86,211.606,265.864,203.609,256,203.609z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,126.214c-9.864,0-17.86,7.997-17.86,17.86v21.433c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86v-21.433    C273.86,134.211,265.864,126.214,256,126.214z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <div class="cp-top">--}}
{{--                        <h3>Miễn phí vận chuyển</h3>--}}
{{--                        <p>Đơn hàng từ 300k</p>--}}
{{--                    </div>--}}
{{--                    <div class="cp-bottom">--}}
{{--                        <div class="cp-bottom-detail">--}}
{{--                            <p>Mã: <strong>A87TYRT55</strong></p>--}}
{{--                            <p>HSD: 10/04/2022</p>--}}
{{--                        </div>--}}
{{--                        <div class="cp-bottom-btn">--}}
{{--                            <button class="cp-btn button" data-coupon="A87TYRT55">Sao chép mã</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-xl-3 coupon-item">--}}
{{--                <div class="coupon-item__inner">--}}
{{--                <div class="coupon-item__left">--}}
{{--                    <div class="cp-img boxlazy-img">--}}
{{--                        <span class="boxlazy-img__insert">--}}
{{--                        <img class="lazyload" data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_2_img.png?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_2_img.png?v=162" alt="Giảm 20%">--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="coupon-item__right">--}}
{{--                    <button type="button" class="cp-icon"--}}
{{--                        data-toggle="popover" data-container="body"	data-placement="bottom"--}}
{{--                        data-popover-content="#cp-tooltip-2"	data-class="coupon-popover" title="Giảm 20% ">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve">--}}
{{--                            <g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,0C114.511,0,0,114.496,0,256c0,141.489,114.496,256,256,256c141.489,0,256-114.496,256-256    C512,114.511,397.504,0,256,0z M256,476.279c-121.462,0-220.279-98.817-220.279-220.279S134.538,35.721,256,35.721    S476.279,134.538,476.279,256S377.462,476.279,256,476.279z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,203.609c-9.864,0-17.86,7.997-17.86,17.86v146.456c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86V221.47    C273.86,211.606,265.864,203.609,256,203.609z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,126.214c-9.864,0-17.86,7.997-17.86,17.86v21.433c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86v-21.433    C273.86,134.211,265.864,126.214,256,126.214z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <div class="cp-top">--}}
{{--                        <h3>Giảm 20%</h3>--}}
{{--                        <p>Đơn hàng từ 200k</p>--}}
{{--                    </div>--}}
{{--                    <div class="cp-bottom">--}}
{{--                        <div class="cp-bottom-detail">--}}
{{--                            <p>Mã: <strong>QH5G8J0Y</strong></p>--}}
{{--                            <p>HSD: 05/05/2022</p>--}}
{{--                        </div>--}}
{{--                        <div class="cp-bottom-btn">--}}
{{--                            <button class="cp-btn button" data-coupon="QH5G8J0Y">Sao chép mã</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-xl-3 coupon-item">--}}
{{--                <div class="coupon-item__inner">--}}
{{--                <div class="coupon-item__left">--}}
{{--                    <div class="cp-img boxlazy-img">--}}
{{--                        <span class="boxlazy-img__insert">--}}
{{--                        <img class="lazyload" data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_3_img.png?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_3_img.png?v=162" alt="Giảm 50k">--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="coupon-item__right">--}}
{{--                    <button type="button" class="cp-icon"--}}
{{--                        data-toggle="popover" data-container="body"	data-placement="bottom"--}}
{{--                        data-popover-content="#cp-tooltip-3"	data-class="coupon-popover" title="Giảm 50k ">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve">--}}
{{--                            <g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,0C114.511,0,0,114.496,0,256c0,141.489,114.496,256,256,256c141.489,0,256-114.496,256-256    C512,114.511,397.504,0,256,0z M256,476.279c-121.462,0-220.279-98.817-220.279-220.279S134.538,35.721,256,35.721    S476.279,134.538,476.279,256S377.462,476.279,256,476.279z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,203.609c-9.864,0-17.86,7.997-17.86,17.86v146.456c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86V221.47    C273.86,211.606,265.864,203.609,256,203.609z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,126.214c-9.864,0-17.86,7.997-17.86,17.86v21.433c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86v-21.433    C273.86,134.211,265.864,126.214,256,126.214z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <div class="cp-top">--}}
{{--                        <h3>Giảm 50k</h3>--}}
{{--                        <p>Đơn hàng từ 500k</p>--}}
{{--                    </div>--}}
{{--                    <div class="cp-bottom">--}}
{{--                        <div class="cp-bottom-detail">--}}
{{--                            <p>Mã: <strong>FT45YUO8H</strong></p>--}}
{{--                            <p>HSD: 10/05/2022</p>--}}
{{--                        </div>--}}
{{--                        <div class="cp-bottom-btn">--}}
{{--                            <button class="cp-btn button" data-coupon="FT45YUO8H">Sao chép mã</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-xl-3 coupon-item">--}}
{{--                <div class="coupon-item__inner">--}}
{{--                <div class="coupon-item__left">--}}
{{--                    <div class="cp-img boxlazy-img">--}}
{{--                        <span class="boxlazy-img__insert">--}}
{{--                        <img class="lazyload" data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_4_img.png?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_4_img.png?v=162" alt="Giảm 10%">--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="coupon-item__right">--}}
{{--                    <button type="button" class="cp-icon"--}}
{{--                        data-toggle="popover" data-container="body"	data-placement="bottom"--}}
{{--                        data-popover-content="#cp-tooltip-4"	data-class="coupon-popover" title="Giảm 10% ">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve">--}}
{{--                            <g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,0C114.511,0,0,114.496,0,256c0,141.489,114.496,256,256,256c141.489,0,256-114.496,256-256    C512,114.511,397.504,0,256,0z M256,476.279c-121.462,0-220.279-98.817-220.279-220.279S134.538,35.721,256,35.721    S476.279,134.538,476.279,256S377.462,476.279,256,476.279z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,203.609c-9.864,0-17.86,7.997-17.86,17.86v146.456c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86V221.47    C273.86,211.606,265.864,203.609,256,203.609z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            <g xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g>--}}
{{--                                    <path d="M256,126.214c-9.864,0-17.86,7.997-17.86,17.86v21.433c0,9.864,7.997,17.86,17.86,17.86s17.86-7.997,17.86-17.86v-21.433    C273.86,134.211,265.864,126.214,256,126.214z"></path>--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <div class="cp-top">--}}
{{--                        <h3>Giảm 10%</h3>--}}
{{--                        <p>Đơn hàng từ 100k</p>--}}
{{--                    </div>--}}
{{--                    <div class="cp-bottom">--}}
{{--                        <div class="cp-bottom-detail">--}}
{{--                            <p>Mã: <strong>A789UYT</strong></p>--}}
{{--                            <p>HSD: 20/05/2022</p>--}}
{{--                        </div>--}}
{{--                        <div class="cp-bottom-btn">--}}
{{--                            <button class="cp-btn button" data-coupon="A789UYT">Sao chép mã</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </section>--}}



    @foreach($categorySpecial as $cateSpecial)
        <section class="home-collection-2">
            <div class="container container-pd-parent">
                <div class="section-heading pd-right">
                    <h2 class="hTitle"><a href="/collections/dien-thoai">{{ $cateSpecial->name }}</a></h2>
                </div>
                <div class="listProduct-row">
                    <div class="owl-carousel owlCarousel-style owlCarousel-dfex icon-arrow">
                        @foreach($cateSpecial->products as $product)
                            @include('site.products.product_item', ['product' => $product])
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach



{{--    <section class="home-categorize home-cate-feature">--}}
{{--    <div class="container container-pd0">--}}
{{--        <div class="wrapbox row">--}}
{{--            <div class="section-heading">--}}
{{--                <h2 class="hTitle"><a href="#">DANH MỤC NỔI BẬT</a></h2>--}}
{{--            </div>--}}
{{--            <div class="wrapbox-right col-lg-12 col-md-12 col-12">--}}
{{--                <div class="listCategorize row">--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_1_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_1_img.jpg?v=162"--}}
{{--                            alt="Điện thoại" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Điện thoại</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/collections/all" aria-label="Điện thoại" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_2_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_2_img.jpg?v=162"--}}
{{--                            alt="Laptop" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Laptop</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/collections/all" aria-label="Laptop" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_3_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_3_img.jpg?v=162"--}}
{{--                            alt="Tablet" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Tablet</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/collections/all" aria-label="Tablet" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_4_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_4_img.jpg?v=162"--}}
{{--                            alt="Đồng hồ th&#244;ng minh" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Đồng hồ thông minh</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/collections/all" aria-label="Đồng hồ th&#244;ng minh" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_5_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_5_img.jpg?v=162"--}}
{{--                            alt="Ốp lưng điện thoại" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Ốp lưng điện thoại</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/collections/all" aria-label="Ốp lưng điện thoại" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_6_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_6_img.jpg?v=162"--}}
{{--                            alt="Chuột m&#225;y t&#237;nh" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Chuột máy tính</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/collections/all" aria-label="Chuột m&#225;y t&#237;nh" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_7_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_7_img.jpg?v=162"--}}
{{--                            alt="M&#224;ng h&#236;nh m&#225;y t&#237;nh" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Màng hình máy tính</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="M&#224;ng h&#236;nh m&#225;y t&#237;nh" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_8_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_8_img.jpg?v=162"--}}
{{--                            alt="Loa bluetooth" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Loa bluetooth</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="Loa bluetooth" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_9_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_9_img.jpg?v=162"--}}
{{--                            alt="Tai nghe" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Tai nghe</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="Tai nghe" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_10_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_10_img.jpg?v=162"--}}
{{--                            alt="Sạc dự ph&#242;ng" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Sạc dự phòng</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="Sạc dự ph&#242;ng" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_11_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_11_img.jpg?v=162"--}}
{{--                            alt="Thiết bị mạng" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Thiết bị mạng</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="Thiết bị mạng" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_12_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_12_img.jpg?v=162"--}}
{{--                            alt="B&#224;n ph&#237;m m&#225;y t&#237;nh" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Bàn phím máy tính</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="B&#224;n ph&#237;m m&#225;y t&#237;nh" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_13_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_13_img.jpg?v=162"--}}
{{--                            alt="C&#225;p sạc" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Cáp sạc</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="C&#225;p sạc" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col7-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_14_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/cate_feature_14_img.jpg?v=162"--}}
{{--                            alt="M&#225;y in" class="lazyload">--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3>Máy in</h3>--}}
{{--                        </div>--}}
{{--                        <a href="/" aria-label="M&#225;y in" class="item-link"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </section>--}}



    @if(@$bannerGroups[1] && $bannerGroups[1]->galleries->count())
        <section class="home-group-banner">
            <div class="container">
                <h2 class="d-none">Group banner</h2>
                <div class="row banner__inner">
                    @foreach($bannerGroups[1]->galleries as $bannerGallery)
                        <div class="col-lg-3 col-md-6 col-6 banner__inner--block">
                            <div class="banner__inner--img effect-shine">
                                <a href="/" aria-label="banner 1">
                                    <img class="lazyload" data-src="{{ $bannerGallery->image->path ?? '' }}"
                                         src="{{ $bannerGallery->image->path ?? '' }}"
                                         alt="banner 1">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif




    @foreach($productCategories as $productCate)
        <section class="home-collection-3">
            <div class="container container-pd0">
                <div class="wraper--content">
                    <div class="wraper--content__left">
                        <div class="section-heading pd-right">
                            <h2 class="hTitle"><a href="#">{{ $productCate->name }}</a></h2>
                        </div>
                        <div class="wraper--content__rowProduct owl-carousel owlCarousel-style icon-arrow">
                            @foreach($productCate->products->chunk(3) as $productChunk)
                                <div class="row-product">
                                    @foreach($productChunk as $product)
                                        <div class="product-loop product-horizontal" data-id="108698715{{ $product->id }}">
                                            <div class="product-inner" data-proid="1039990487" id="_loop_1">
                                                <div class="proloop-image">
                                                    @if($product->base_price > 0)
                                                        <div class="pro-sale"><span>-{{ $product->percent_discount }}%</span></div>
                                                    @endif
                                                    <div class="gift product_gift_label d-none" data-id="1039990487">
                                                        <img class="lazyload" data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png" src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png" alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img">
                                                            <picture>
                                                                <source media="(max-width: 480px)" data-srcset="{{ $product->image->path ?? '' }}"
                                                                        srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)" data-srcset="{{ $product->image->path ?? '' }}"
                                                                        srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop " data-src="{{ $product->image->path ?? '' }}"
                                                                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                     alt=" {{ $product->name }} "  />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <a href="/products/dong-ho-thong-minh-smartwatch-dz09" class="proloop-link quickview-product" data-handle="/products/dong-ho-thong-minh-smartwatch-dz09" title="{{ $product->name }}" ></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <h3><a href="/products/dong-ho-thong-minh-smartwatch-dz09" class="quickview-product" data-handle="/products/dong-ho-thong-minh-smartwatch-dz09">{{ $product->name }}</a></h3>
                                                    @if($product->base_price > 0)
                                                        <p class="proloop--price on-sale">
                                                            <span class="price">{{ number_format($product->price) }}₫</span>
                                                            <span class="price-del">{{ number_format($product->base_price) }}₫</span>
                                                            <span class="pro-percent">-{{ $product->percent_discount }}%</span>
                                                        </p>
                                                    @else
                                                        <p class="proloop--price ">
                                                            <span class="price">{{ number_format($product->price) }}₫</span>
                                                        </p>
                                                    @endif


                                                    <div class="proloop-actions" data-vrid="1086987155">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit" class="btn-proloop-cart add-to-cart  btn-addcart-view " onclick="HRT.All.addCartProdItem('1086987155')" >
                                                                    <span class="btnadd">  Thêm vào giỏ </span>
                                                                    <span class="btnico" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Thêm vào giỏ">
                                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <g transform="translate(0 512) scale(.1 -.1)">
                                                    <path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
                                                    <path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
                                                </g>
                                            </svg>
                                        </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus" onclick="HRT.All.minusQtyProdItem('1086987155')">
                                                                        <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9" x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text" readonly="" name="proloop-quantity" value="">
                                                                    <button class="qty-btn proloop-plus" onclick="HRT.All.plusQtyProdItem('1086987155')">
                                                                        <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1" height="17"></rect>
                                                                            <rect x="1" y="9" width="17" height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="actions-icon">
                                        <span class="btnico" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Thêm vào giỏ" onclick="HRT.All.addCartProdItem('1086987155')">
                                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <g transform="translate(0 512) scale(.1 -.1)">
                                                    <path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
                                                    <path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
                                                </g>
                                            </svg>
                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endforeach

    @if(@$bannerGroups[2] && $bannerGroups[2]->galleries->count())
        <section class="home-banner">
            <div class="container">
                <h2 class="d-none">Group banner</h2>
                <div class="row banner__inner">
                    @foreach($bannerGroups[2]->galleries as $bannerGallery)
                        <div class="col-lg-6 col-md-12 col-12 banner__inner--block">
                            <div class="banner__inner--img effect-shine">
                                <a href="collections/all" aria-label="home banner 1">
                                    <img class="lazyload" data-src="{{ $bannerGallery->image->path ?? '' }}"
                                         src="{{ $bannerGallery->image->path ?? '' }}"
                                         alt="home banner 1">
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

    @endif

    @if($posts->count())
        <section class="home-blogs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-12">
                        <div class="left-news">
                            <div class="section-heading d-flex justify-content-between align-items-center">
                                <h2 class="hTitle"><a href="/blogs/all">Bài Viết Mới Nhất</a></h2>
                                <div class="more-news">
                                    <a href="/blogs/all">Xem thêm</a>
                                </div>
                            </div>
                            @php
                                $postFirst = $posts->first();
                                $postsSecond  = $posts->slice(1)->values();
                            @endphp
                            <div class="row wrapper-content">

                                <div class="wrap-left col-lg-6">
                                    <article class="article-item">
                                        <div class="article-item__block flow-zoom">
                                            <div class="article-item__image">
                                                <div class="art-image">
                                                    <a href="/blogs/news/diem-qua-cac-loai-tivi-co-mat-tren-thi-truong-hien-nay"
                                                       title="{{ $postFirst->name }}"
                                                       aria-label="{{ $postFirst->name }}">
                                                        <picture>
                                                            <source media="(max-width: 480px)" data-srcset="{{ $postFirst->image->path ?? '' }}"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="/>
                                                            <source media="(min-width: 481px) and (max-width:767px)" class="lazyload"
                                                                    data-srcset="{{ $postFirst->image->path ?? '' }}"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="/>
                                                            <source media="(min-width: 768px)" class="lazyload"
                                                                    data-srcset="{{ $postFirst->image->path ?? '' }}"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="/>
                                                            <img class="lazyload" data-src="{{ $postFirst->image->path ?? '' }}"
                                                                 alt="{{ $postFirst->name }}"
                                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="/>
                                                        </picture>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="article-item__detail">
                                                <h3 class="art-title"><a href="/blogs/news/diem-qua-cac-loai-tivi-co-mat-tren-thi-truong-hien-nay">{{ $postFirst->name }}</a></h3>
                                                <div class="art-meta">
                                    <span class="art-date">
                                    <time datetime="2022-11-11">{{ \Illuminate\Support\Carbon::parse($postFirst->created_at)->format('d/m/Y') }}</time>
                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>

                                <div class="wrap-right col-lg-6">
                                    @foreach($postsSecond as $post)
                                        <article class="article-item">
                                            <div class="article-item__block flow-zoom">
                                                <div class="article-item__image">
                                                    <div class="art-image">
                                                        <a href="/blogs/news/may-loc-khong-khi-la-gi-cac-cong-nghe-hien-dai-cua-may-loc-khong-khi"
                                                           title="{{ $post->name }}"
                                                           aria-label="{{ $post->name }}">
                                                            <img class="lazyload"
                                                                 data-src="{{ $post->image->path ?? '' }}"
                                                                 alt="{{ $post->name }}"
                                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="article-item__detail">
                                                    <h3 class="art-title"><a href="/blogs/news/may-loc-khong-khi-la-gi-cac-cong-nghe-hien-dai-cua-may-loc-khong-khi">
                                                            {{ $post->name }}</a></h3>
                                                    <div class="art-meta">
                                    <span class="art-date">
                                    <time  datetime="2022-06-27">{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y') }}</time>
                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 cpl-12">
                        <div class="right-banner">
                            <a href="/collections/all" class="banner-hover-effect" aria-label="FLYCAM DJI CHÍNH HÃNG">
                                <img class="lazyload" data-src="//theme.hstatic.net/200000516791/1001206835/14/home_collection_3_banner.jpg?v=162"
                                     src="//theme.hstatic.net/200000516791/1001206835/14/home_collection_3_banner.jpg?v=162"
                                     alt="FLYCAM DJI CHÍNH HÃNG">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


{{--    <section class="home-categorize home-cate-trend">--}}
{{--    <div class="container container-pd0">--}}
{{--        <div class="wrapbox row">--}}
{{--            <div class="wrapbox-left col-lg-2 col-md-12 col-12">--}}
{{--                <div class="wrapbox--content">--}}
{{--                <p class="title-box">Xu hướng tìm kiếm</p>--}}
{{--                <a href="/collections/all" class="btn-box button">Xem thêm</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="wrapbox-right col-lg-10 col-md-12 col-12">--}}
{{--                <div class="listCategorize row">--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="Điện thoại">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_1_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_1_img.jpg?v=162"--}}
{{--                            alt="Điện thoại" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Điện thoại	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="Laptop">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_2_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_2_img.jpg?v=162"--}}
{{--                            alt="Laptop" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Laptop	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="M&#225;y t&#237;nh để b&#224;n">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_3_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_3_img.jpg?v=162"--}}
{{--                            alt="M&#225;y t&#237;nh để b&#224;n" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Máy tính để bàn	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="Tablet">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_4_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_4_img.jpg?v=162"--}}
{{--                            alt="Tablet" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Tablet	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="Đồng hồ th&#244;ng minh">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_5_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_5_img.jpg?v=162"--}}
{{--                            alt="Đồng hồ th&#244;ng minh" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Đồng hồ thông minh	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="M&#224;ng h&#236;nh">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_6_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_6_img.jpg?v=162"--}}
{{--                            alt="M&#224;ng h&#236;nh" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Màng hình	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="Phụ kiện">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_7_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_7_img.jpg?v=162"--}}
{{--                            alt="Phụ kiện" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Phụ kiện	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col8-cus">--}}
{{--                    <div class="item-icon">--}}
{{--                        <div class="item-img boxlazy-img">--}}
{{--                            <span class="boxlazy-img__insert">--}}
{{--                            <a href="/" aria-label="Thiết bị th&#244;ng minh">--}}
{{--                            <img data-src="//theme.hstatic.net/200000516791/1001206835/14/categorize_8_img.jpg?v=162" src="//theme.hstatic.net/200000516791/1001206835/14/categorize_8_img.jpg?v=162"--}}
{{--                            alt="Thiết bị th&#244;ng minh" class="lazyload">--}}
{{--                            </a>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="item-title">--}}
{{--                            <h3><a href="/">Thiết bị thông minh	</a></h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </section>--}}
</main>
@endsection
@push('script')
@endpush
