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
    <style>
        .flip-js-countdown .soon-target { display:flex; gap:.5rem; }
        .flip-js-countdown .cd-box { display:flex; flex-direction:column; align-items:center; }
        .flip-js-countdown .cd-num {
            display:inline-block; min-width:2.2rem; padding:.25rem .45rem;
            border-radius:.5rem; background:#ffd400; text-align:center; font-weight:700;
        }
        .flip-js-countdown .cd-lbl { margin-top:.2rem; font-size:.75rem; opacity:.85; }
    </style>

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
                                    <a href="" title="ALt banner 1">
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
                                    <a href="" aria-label="">
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
{{--                            <div class="box-countdown flip-js-countdown">--}}
{{--                                <div class="auto-due soon"--}}
{{--                                     data-end="2024-5-30T10:00:00"--}}
{{--                                     data-start="2024-5-30T10:00:00"--}}
{{--                                     data-face="slot"--}}
{{--                                     data-format="d,h,m,s"--}}
{{--                                     data-labels-days="Dia,Ngày"--}}
{{--                                     data-labels-hours="Hora,Giờ"--}}
{{--                                     data-labels-minutes="Minuto,Phút"--}}
{{--                                     data-labels-seconds="Segundo,Giây">--}}
{{--                                    <span id="label-due"></span>--}}
{{--                                    <div id="soon-espa"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="box-countdown flip-js-countdown">
                                <div class="auto-due"
                                     data-end="{{ $cateFlash->end_date }}"
                                     data-labels-days="Ngày"
                                     data-labels-hours="Giờ"
                                     data-labels-minutes="Phút"
                                     data-labels-seconds="Giây">
                                    <span class="label-due"></span> &nbsp;
                                    <div class="soon-target"></div>
                                </div>
                            </div>
                        </div>
                        <div class="listProduct-row owl-carousel owlCarousel-style owlCarousel-dfex icon-arrow">
                            @foreach($cateFlash->products as $product)
                                <div class="product-loop" data-id="{{ $product->id }}">
                                    @include('site.products.product_item', ['product' => $product])
                                </div>
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



    @foreach($categorySpecial as $cateSpecial)
        <section class="home-collection-2">
            <div class="container container-pd-parent">
                <div class="section-heading pd-right">
                    <h2 class="hTitle"><a href="/collections/dien-thoai">{{ $cateSpecial->name }}</a></h2>
                </div>
                <div class="listProduct-row">
                    <div class="owl-carousel owlCarousel-style owlCarousel-dfex icon-arrow">
                        @foreach($cateSpecial->products as $product)
                            <div class="product-loop" data-id="{{ $product->id }}">
                                @include('site.products.product_item', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach



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
        <section class="home-collection-2">
            <div class="container container-pd-parent">
                <div class="section-heading pd-right">
                    <h2 class="hTitle"><a href="/collections/dien-thoai">{{ $productCate->name }}</a></h2>
                </div>
                <div class="listProduct-row">
                    <div class="owl-carousel owlCarousel-style owlCarousel-dfex icon-arrow">
                        @foreach($productCate->products as $product)
                            <div class="product-loop" data-id="{{ $product->id }}">
                                @include('site.products.product_item', ['product' => $product])
                            </div>
                        @endforeach
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
                    <div class="col-lg-12 col-md-12 col-12">
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
                                    <time>{{ \Illuminate\Support\Carbon::parse($postFirst->created_at)->format('d/m/Y') }}</time>
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
                                    <time>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y') }}</time>
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
                </div>
            </div>
        </section>
    @endif

</main>
@endsection
@push('scripts')
    <script>
        (function () {
            // Parse "YYYY-MM-DD[ T]HH:mm:ss" (local) hoặc "YYYY-MM-DD" (=> 23:59:59)
            function parseLocalEnd(raw) {
                if (!raw) return null;
                var s = String(raw).trim();

                // Có timezone (Z hoặc +/-): để Date tự xử lý absolute time
                if (/[zZ]|[+\-]\d{2}:?\d{2}$/.test(s)) {
                    var dAbs = new Date(s);
                    return isNaN(dAbs) ? null : dAbs;
                }

                // Chỉ ngày
                if (/^\d{4}-\d{1,2}-\d{1,2}$/.test(s)) {
                    var a = s.split("-");
                    return new Date(+a[0], +a[1]-1, +a[2], 23, 59, 59); // local 23:59:59
                }

                // Ngày + giờ (có ' ' hoặc 'T')
                var m = /^(\d{4})-(\d{1,2})-(\d{1,2})[ T](\d{1,2}):(\d{1,2})(?::(\d{1,2}))?$/.exec(s);
                if (m) {
                    return new Date(+m[1], +m[2]-1, +m[3], +m[4], +m[5], +(m[6]||0)); // local
                }
                return null;
            }

            function pad2(n) { n = Math.floor(Math.max(0, n)); return (n < 10 ? '0' : '') + n; }

            function startOne(wrapper) {
                var endRaw = wrapper.getAttribute('data-end');
                var end    = parseLocalEnd(endRaw);
                var label  = wrapper.querySelector('.label-due') || wrapper.querySelector('#label-due');
                var target = wrapper.querySelector('.soon-target') || wrapper.querySelector('#soon-espa');

                if (!end || isNaN(end.getTime())) {
                    if (label) label.textContent = 'Thời gian không hợp lệ';
                    return;
                }
                if (!target) {
                    target = document.createElement('div');
                    target.className = 'soon-target';
                    wrapper.appendChild(target);
                }

                // Lấy label từ data-* (nếu có)
                function lbl(attr, fallback) {
                    var v = wrapper.getAttribute(attr);
                    if (!v) return fallback;
                    // Nếu dạng "Dia,Ngày" thì lấy phần sau cùng
                    var parts = v.split(',');
                    return (parts[parts.length-1] || fallback).trim();
                }
                var Ld = lbl('data-labels-days', 'Ngày');
                var Lh = lbl('data-labels-hours', 'Giờ');
                var Lm = lbl('data-labels-minutes', 'Phút');
                var Ls = lbl('data-labels-seconds', 'Giây');

                // Dựng DOM cho 4 ô
                target.innerHTML =
                    '<div class="cd-box"><span class="cd-num" data-u="d">00</span><span class="cd-lbl">'+Ld+'</span></div>'+
                    '<div class="cd-box"><span class="cd-num" data-u="h">00</span><span class="cd-lbl">'+Lh+'</span></div>'+
                    '<div class="cd-box"><span class="cd-num" data-u="m">00</span><span class="cd-lbl">'+Lm+'</span></div>'+
                    '<div class="cd-box"><span class="cd-num" data-u="s">00</span><span class="cd-lbl">'+Ls+'</span></div>';

                var $d = target.querySelector('.cd-num[data-u="d"]');
                var $h = target.querySelector('.cd-num[data-u="h"]');
                var $m = target.querySelector('.cd-num[data-u="m"]');
                var $s = target.querySelector('.cd-num[data-u="s"]');

                function render() {
                    var now  = new Date();
                    var diff = end - now;

                    if (diff <= 0) {
                        diff = 0;
                        clearInterval(timer);
                        if (label) label.textContent = 'Ưu đãi kết thúc';
                    } else {
                        if (label) label.textContent = 'Kết thúc sau: ';
                    }

                    var totalSec = Math.floor(diff / 1000);
                    var days     = Math.floor(totalSec / 86400);
                    var hours    = Math.floor((totalSec % 86400) / 3600);
                    var minutes  = Math.floor((totalSec % 3600) / 60);
                    var seconds  = totalSec % 60;

                    // Nếu muốn ngày có thể >99, vẫn cứ hiển thị đầy đủ (không cắt)
                    $d.textContent = String(days).padStart(2, '0');
                    $h.textContent = pad2(hours);
                    $m.textContent = pad2(minutes);
                    $s.textContent = pad2(seconds);
                }

                render();
                var timer = setInterval(render, 1000);
            }

            function initCountdowns() {
                var nodes = document.querySelectorAll('.flip-js-countdown .auto-due');
                if (!nodes.length) return;
                for (var i = 0; i < nodes.length; i++) startOne(nodes[i]);
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initCountdowns);
            } else {
                initCountdowns();
            }

            // Nếu bạn render DOM động (Ajax/Angular), gọi lại: initCountdowns();
        })();
    </script>

@endpush
