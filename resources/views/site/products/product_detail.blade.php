@extends('site.layouts.master')
@section('title')

@endsection
@section('description')

@endsection
@section('image')

@endsection

@section('css')
@endsection

@section('content')
    <style>
        .product-variants { margin-top: .5rem; }
        .variant-label { font-weight: 600; margin-bottom: .25rem; }

        .variant-list {
            list-style: none; padding: 0; margin: .25rem 0 0;
            display: flex; flex-wrap: wrap; gap: .5rem;
        }

        .variant-chip {
            display: inline-flex; align-items: center; justify-content: center;
            padding: .5rem .9rem; min-width: 44px; min-height: 36px;
            border: 1px solid #e5e7eb; border-radius: 999px;
            background: #fff; color: #111827; font-weight: 500;
            cursor: pointer; user-select: none;
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease, border-color .18s ease;
        }

        .variant-chip:hover { transform: translateY(-1px); box-shadow: 0 2px 8px rgba(0,0,0,.06); }
        .variant-chip:focus { outline: none; box-shadow: 0 0 0 3px rgba(59,130,246,.25); }

        .variant-chip.is-active {
            background: #111827; color: #fff; border-color: #111827;
            box-shadow: 0 4px 14px rgba(17,24,39,.22);
        }
        .variant-chip.is-active::after {
            content: "✓"; font-size: .85em; margin-left: .45rem; line-height: 1;
        }

        /* (tuỳ chọn) trạng thái disable nếu cần:
        .variant-chip.is-disabled { opacity: .45; cursor: not-allowed; filter: grayscale(.2); }
        */

    </style>
    <div class="mainBody-theme-container mainBody-modalshow mainBody-product  layoutProduct_scroll ">

        <main class="wrapperMain_content" ng-controller="productDetailPage">


            <script>
                var currentId = 1039990830;
            </script>

            <div class="layout-productDetail layout-pageProduct" id="product-detail">
                <div class="breadcrumb-shop">
                    <div class="container">
                        <div class="breadcrumb-list  ">
                            <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="{{ route('front.home-page') }}" target="_self" itemprop="item"><span
                                            itemprop="name">Trang chủ</span></a>
                                    <meta itemprop="position" content="1"/>
                                </li>


                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="{{ route('front.show-product-category', $product->category->slug) }}" target="_self" itemprop="item"><span itemprop="name">{{ $product->category->name ?? '' }}</span></a>
                                    <meta itemprop="position" content="2"/>
                                </li>

                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
				<span itemprop="item"
                      content="https://techgo.myharavan.com/products/android-tivi-sony-4k-43-inch-kd-43x75-vn3">
					<span itemprop="name">{{ $product->name }}</span>
				</span>
                                    <meta itemprop="position" content="3"/>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                <section class="productDetail-information productDetail_style__01">
                    <div class="container container-pd0">


                        <style>
                            /* đảm bảo vùng ảnh là mốc định vị */
                            #quickview-sliderproduct {
                                position: relative;
                            }

                            /* đặt thanh nav ở giữa theo trục dọc, phủ toàn chiều ngang */
                            #quickview-sliderproduct .owl-nav {
                                position: absolute;
                                top: 50%;
                                left: 0;
                                right: 0;
                                transform: translateY(-50%);
                                display: flex;
                                justify-content: space-between;
                                padding: 0 8px;              /* khoảng cách mép ảnh */
                                pointer-events: none;        /* nav container không bắt click */
                                z-index: 5;
                            }

                            /* nút prev/next: to, rõ, dễ bấm */
                            #quickview-sliderproduct .owl-nav button.owl-prev,
                            #quickview-sliderproduct .owl-nav button.owl-next {
                                pointer-events: auto;        /* chỉ nút mới bắt click */
                                width: 44px;
                                height: 44px;
                                border-radius: 999px;
                                border: 1px solid rgba(255,255,255,0.35);
                                background: rgba(0,0,0,0.55);
                                color: #fff;
                                font-size: 22px;             /* cỡ mũi tên ‹ › */
                                line-height: 1;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                box-shadow: 0 4px 10px rgba(0,0,0,0.25);
                                transition: transform .18s ease, background .18s ease, opacity .18s ease;
                            }

                            /* hover/focus */
                            #quickview-sliderproduct .owl-nav button.owl-prev:hover,
                            #quickview-sliderproduct .owl-nav button.owl-next:hover,
                            #quickview-sliderproduct .owl-nav button.owl-prev:focus,
                            #quickview-sliderproduct .owl-nav button.owl-next:focus {
                                background: rgba(0,0,0,0.85);
                                transform: scale(1.06);
                                outline: none;
                            }

                            /* trạng thái disabled */
                            #quickview-sliderproduct .owl-nav button.disabled {
                                opacity: .35;
                                cursor: default;
                                transform: none;
                            }

                            /* mobile: thu gọn một chút */
                            @media (max-width: 767.98px) {
                                #quickview-sliderproduct .owl-nav button.owl-prev,
                                #quickview-sliderproduct .owl-nav button.owl-next {
                                    width: 36px;
                                    height: 36px;
                                    font-size: 18px;
                                }
                            }




                            /* khối thumb cơ bản */
                            #quickview-thumbproduct .product-thumb__item {
                                display: block;
                                position: relative;
                                border-radius: 8px;
                                overflow: hidden;
                                transition: box-shadow .18s ease, transform .12s ease;
                            }

                            #quickview-thumbproduct .product-thumb__item img {
                                display: block;
                                width: 100%;
                                height: 72px;         /* bạn có thể chỉnh 60–80px */
                                object-fit: cover;
                                border-radius: inherit;
                            }

                            /* viền khi đang được chọn */
                            #quickview-thumbproduct .owl-item.current .product-thumb__item {
                                box-shadow: 0 0 0 1px var(--primary, #022775), 0 2px 8px rgba(0,0,0,.12);
                            }

                            /* hover nhẹ cho item chưa chọn */
                            #quickview-thumbproduct .owl-item:not(.current):hover .product-thumb__item {
                                box-shadow: 0 0 0 2px rgba(255,255,255,.5);
                                transform: translateY(-1px);
                            }

                            /* nếu muốn dùng viền thật thay vì box-shadow (có thể gây nhảy layout) */
                            /*
                            #quickview-thumbproduct .owl-item.current img {
                              outline: 2px solid var(--primary, #e21b1b);
                              outline-offset: -2px;
                              border-radius: 8px;
                            }
                            */


                            #quickview-thumbproduct .product-thumb__item {
                                display:block; border-radius:8px; overflow:hidden;
                                transition: box-shadow .18s ease, transform .12s ease;
                            }
                            #quickview-thumbproduct .product-thumb__item img {
                                width:100%; height:72px; object-fit:cover; border-radius:inherit;
                            }
                            /* ô đang chọn */
                            #quickview-thumbproduct .owl-item.current .product-thumb__item {
                                box-shadow: 0 0 0 1px var(--primary, #022775), 0 2px 8px rgba(0,0,0,.12);
                            }

                            #quickview-thumbproduct .product-thumb {
                                padding-bottom: 10px;
                                padding-top: 10px;
                            }

                            #quickview-thumbproduct.owl-carousel .owl-stage { margin-left:10px !important; }

                        </style>
                        <div class="productDetail--main">
                            <div class="productDetail--gallery">
                                <div class="product-container-gallery">
                                    <div class="wrapbox-gallery">

                                        <div class="wrapbox-image">

                                            <ul class="quickview-sliderproduct owl-carousel" id="quickview-sliderproduct">

{{--                                                <li class="product-gallery" data-image="<% img %>" ng-repeat="img in variant.thumb track by $index"--}}

{{--                                                >--}}
{{--                                                    <a class="gallery-item" data-image="<% img %>">--}}
{{--                                                        <img ng-src="<% img %>" alt="">--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}

                                            </ul>
                                            <ul class="quickview-sliderthumb  owl-carousel" id="quickview-thumbproduct" style="margin-top: 10px">

{{--                                                <li class="product-thumb" data-image="<% img %>" ng-repeat="img in variant.thumb track by $index"--}}
{{--                                                >--}}
{{--                                                    <a class="product-thumb__item" href="javascript:void(0);">--}}
{{--                                                        <img ng-src="<% img %>" alt="">--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}



                                            </ul>

                                        </div>


{{--                                        <div class="wrapbox-image">--}}

{{--                                            <div class="product-gallery" id="quickview-sliderproduct">--}}
{{--                                                <img ng-src="<% (variant && variant.image && variant.image.path) ? variant.image.path : '' %>"--}}
{{--                                                     alt="{{ $product->name }}">--}}
{{--                                            </div>--}}

{{--                                        </div>--}}

                                        @if($product->base_price > 0)
                                            <div class="product-percent">
                                                <span class="pro-sale">-{{$product->percent_discount}}%<br> OFF </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>























                            <div class="productDetail--content">
                                <div class="wrapbox-inner">
                                    <div class="wrapbox-detail">
                                        <div class="product-heading">
                                            <h1>{{ $product->name }}</h1>

                                            <span class="pro-soldold">SKU:

									<strong><% variant.sku  %></strong>

								</span>

                                            <span class="pro-soldold">Tình trạng:

									<strong><% variant.status ? 'Còn hàng' : 'Hết hàng' %></strong>

								</span>
                                            <span class="pro-vendor">Hãng sản xuất:
                                                <strong><a title="Show vendor" href="#">{{ $product->manufacturer->name ?? '' }}</a></strong></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="col-lg-8 col-md-12 col-12 p-0 wrapbox-left">
                                            <div class="wrapbox-detail">
                                                <div class="product-price " id="price-preview">
                                                    <span class="pro-title">Giá: </span>
                                                    <span class="pro-price">{{ formatCurrency($product->price) }}₫</span>


                                                    @if($product->base_price > 0)
                                                        <del>{{ formatCurrency($product->base_price) }}₫</del>
                                                        <span class="pro-percent">-{{$product->percent_discount}}%</span>
                                                    @endif

                                                </div>

                                                @if($product->variants->count())
                                                    <?php
                                                        $variants = $product->variants;
                                                     ?>
{{--                                                    <div class="product-variants">--}}
{{--                                                        Phân loại:--}}
{{--                                                        <ul>--}}
{{--                                                            @foreach($variants as $variant)--}}
{{--                                                                <li ng-click="getVariant({{ $variant->id }})"> {{ $variant->name }}</li>--}}
{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}

{{--                                                    </div>--}}

                                                    <div class="product-variants">
                                                        <div class="variant-label">Phân loại:</div>
                                                        <ul class="variant-list" role="listbox" aria-label="Phân loại sản phẩm">
                                                            @foreach($variants as $v)
                                                                <li class="variant-chip"
                                                                    role="option"
                                                                    ng-class="{'is-active': selectedVariantId == {{ $v->id }} }"
                                                                    tabindex="0"
                                                                    ng-click="selectVariant({{ $v->id }})"
                                                                    ng-keydown="keySelect($event, {{ $v->id }})">
                                                                    {{ $v->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>



                                                @endif


                                                <div class="addcart-area btn-zero d-none">
                                                    <a href="a.html" class=" btn-product-contact button dark">
                                                        Liên hệ
                                                    </a>
                                                </div>
                                                <div class="product-actions ">
                                                    <div class="select-actions d-none d-lg-block clearfix">
                                                        <div class="quantity-area">
                                                            <div class="quantity-title">Số lượng:</div>
                                                            <button type="button" onclick="HRT.All.minusQuantity()"
                                                                    class="qty-btn">
                                                                <svg focusable="false" class="icon icon--minus "
                                                                     viewBox="0 0 10 2" role="presentation">
                                                                    <path d="M10 0v2H0V0z"></path>
                                                                </svg>
                                                            </button>
                                                            <input type="text" id="quantity" name="quantity" value="1"
                                                                   min="1" class="quantity-input">
                                                            <button type="button" onclick="HRT.All.plusQuantity()"
                                                                    class="qty-btn">
                                                                <svg focusable="false" class="icon icon--plus "
                                                                     viewBox="0 0 10 10" role="presentation">
                                                                    <path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="addcart-area">
{{--                                                            <button type="button" id="add-to-cart"--}}
{{--                                                                    class=" add-to-cartProduct button dark btn-addtocart addtocart-modal"--}}
{{--                                                                    ng-click="addToCart({{ $product->id }})"--}}
{{--                                                                    name="add">--}}
{{--                                                                Thêm vào giỏ--}}
{{--                                                            </button>--}}




                                                            <button type="button" id="buy-now" ng-click="buyNow({{ $product->id }})"
                                                                    class="  button dark btn-buynow btnred addtocart-modal"
                                                                    name="add">
                                                                Mua ngay
                                                            </button>

                                                            <button type="button" id="add-to-cart"
                                                                    class=" add-to-cartProduct button dark btn-addtocart addtocart-modal"
                                                                    ng-click="tragop({{ $product->id }})"
                                                                    name="add">
                                                                Trả góp duyệt hồ sơ online
                                                            </button>

{{--                                                            <button type="button"--}}
{{--                                                                    class="  button dark btn-buynow btnred addtocart-modal" ng-click="addToCompareList({{ $product->id }})"--}}
{{--                                                                    name="add">--}}
{{--                                                               Thêm vào so sánh--}}
{{--                                                            </button>--}}



                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-toshare">
                                                    <span>Chia sẻ: </span>
                                                    <a href="http://www.facebook.com/sharer/sharer.php?u=https://techgo.myharavan.com/products/android-tivi-sony-4k-43-inch-kd-43x75-vn3"
                                                       target="_blank" class="share-facebook">
                                                        <i class="fa fa-facebook"></i>
                                                        <span class="ico-tooltip">Facebook</span>
                                                    </a>
                                                    <a href="https://m.me/108520260558644" target="_blank" rel="noreferrer"
                                                       aria-label="messenger" class="share-messenger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 28 28">
                                                            <g fill="none" fill-rule="evenodd">
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g transform="translate(-293.000000, -708.000000) translate(180.000000, 144.000000) translate(16.000000, 16.000000) translate(0.000000, 548.000000) translate(61.000000, 0.000000) translate(36.000000, 0.000000)">
                                                                                        <circle cx="14" cy="14" r="14"
                                                                                                fill="#0084FF"/>
                                                                                        <path fill="#FFF"
                                                                                              d="M14.848 15.928l-1.771-1.9-3.457 1.9 3.802-4.061 1.815 1.9 3.414-1.9-3.803 4.061zM14.157 7.2c-3.842 0-6.957 2.902-6.957 6.481 0 2.04 1.012 3.86 2.593 5.048V21.2l2.368-1.308c.632.176 1.302.271 1.996.271 3.842 0 6.957-2.902 6.957-6.482S17.999 7.2 14.157 7.2z"/>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="ico-tooltip">Messenger</span>
                                                    </a>
                                                    <a href="https://twitter.com/intent/tweet?text=optional%20promo%20text%20https://techgo.myharavan.com/products/android-tivi-sony-4k-43-inch-kd-43x75-vn3"
                                                       target="_blank" class="share-twitter">
                                                        <i class="fa fa-twitter"></i>
                                                        <span class="ico-tooltip">Twitter</span>
                                                    </a>
                                                    <a href="http://pinterest.com/pin/create/link/?url=https://techgo.myharavan.com&amp;media=https://product.hstatic.net/200000516791/product/product_7_4_57634087626f4b14b9553f4ffd30fd41_cd5cce1eb29c400dbed69fe9fd086ffc.png&amp;description=Android%20Tivi%20Sony%204K%2043%20inch%20KD-43X75%20VN3"
                                                       target="_blank" class="share-pinterest">
                                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                        <span class="ico-tooltip">Pinterest</span>
                                                    </a>
                                                    <a class="share-link" onclick="HRT.Product.copyLinkProduct()">
                                                        <i class="fa fa-link" aria-hidden="true"></i>
                                                        <span class="ico-tooltip">Sao chép url</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-12 p-0 wrapbox-right">
                                            <div class="wrapbox-detail">
                                                <div class="d-flex flex-wrap product-deliverly">
                                                    <div class="col-lg-12 col-md-6 col-12 deliverly-inner">
                                                        <div class="title-deliverly">
                                                            <span>Chính sách bán hàng</span>
                                                        </div>
                                                        <div class="infoList-deliverly">


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="//theme.hstatic.net/200000516791/1001206835/14/product_deliverly_1_ico.png?v=162"
                                                             src="//theme.hstatic.net/200000516791/1001206835/14/product_deliverly_1_ico.png?v=162"
                                                             alt="Cam kết 100% ch&#237;nh h&#227;ng"/>
													</span>
                                                                Cam kết 100% chính hãng
                                                            </div>


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="//theme.hstatic.net/200000516791/1001206835/14/product_deliverly_2_ico.png?v=162"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="Miễn ph&#237; giao h&#224;ng"/>
													</span>
                                                                Miễn phí giao hàng
                                                            </div>


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="//theme.hstatic.net/200000516791/1001206835/14/product_deliverly_3_ico.png?v=162"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="Hỗ trợ 24/7"/>
													</span>
                                                                Hỗ trợ 24/7
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6 col-12 deliverly-inner">
                                                        <div class="title-deliverly">
                                                            <span>Thông tin thêm</span>
                                                        </div>
                                                        <div class="infoList-deliverly">


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="//theme.hstatic.net/200000516791/1001206835/14/product_deliverly_4_ico.png?v=162"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="Ho&#224;n tiền
111%
nếu h&#224;ng giả"/>
													</span>
                                                                Hoàn tiền
                                                                111%
                                                                nếu hàng giả
                                                            </div>


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="//theme.hstatic.net/200000516791/1001206835/14/product_deliverly_5_ico.png?v=162"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="Mở hộp
kiểm tra
nhận h&#224;ng"/>
													</span>
                                                                Mở hộp
                                                                kiểm tra
                                                                nhận hàng
                                                            </div>


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="//theme.hstatic.net/200000516791/1001206835/14/product_deliverly_6_ico.png?v=162"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="Đổi trả trong
7 ng&#224;y"/>
													</span>
                                                                Đổi trả trong
                                                                7 ngày
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="productDetailjs productDetail--box box-detail-app" id="detail-product">
                                <div class="product-app combo-info mg-top d-none">
                                    <h3 class="combo-info--title">THƯỜNG ĐƯỢC MUA CÙNG</h3>
                                </div>
                            </div>


                            <style>
                                .product-tabs {
                                    border: 1px solid #ddd;
                                    border-radius: 6px;
                                    overflow: hidden;
                                    background: #fff;
                                    /*font-family: sans-serif;*/
                                }

                                .tab-header {
                                    display: flex;
                                    margin: 0;
                                    padding: 0;
                                    list-style: none;
                                    border-bottom: 2px solid #eee;
                                    background: #f9f9f9;
                                }

                                .tab-header li {
                                    flex: 1;
                                    padding: 12px 20px;
                                    text-align: center;
                                    cursor: pointer;
                                    font-weight: 600;
                                    color: #555;
                                    transition: all 0.3s;
                                }

                                .tab-header li:hover {
                                    background: #eee;
                                }

                                .tab-header li.active {
                                    background: #fff;
                                    color: #000;
                                    border-bottom: 2px solid #007bff;
                                }

                                .tab-content {
                                    display: none;
                                    padding: 20px;
                                    animation: fadeIn 0.3s ease-in-out;
                                }

                                .tab-content.active {
                                    display: block;
                                }

                                @keyframes fadeIn {
                                    from { opacity: 0; transform: translateY(5px); }
                                    to { opacity: 1; transform: translateY(0); }
                                }

                            </style>

                            <style>
                                /* Card tổng thể */
                                .specs-card{
                                    background:#fff;
                                    border:1px solid #e5e7eb;
                                    border-radius:12px;
                                    padding:20px;
                                    box-shadow:0 4px 14px rgba(0,0,0,.04);
                                }

                                /* Nhóm */
                                .spec-group + .spec-group{ margin-top:22px; padding-top:18px; border-top:1px dashed #e5e7eb; }
                                .spec-heading{
                                    font-size:14px;
                                    font-weight:800;
                                    letter-spacing:.6px;
                                    color:#111827;
                                    margin:0 0 10px;
                                    position:relative;
                                    text-transform:uppercase;
                                }
                                .spec-heading::before{
                                    content:"";
                                    position:absolute; left:-10px; top:50%;
                                    width:6px; height:6px; border-radius:50%; background:#111827; transform:translateY(-50%);
                                }

                                /* Danh sách thông số */
                                .spec-list{ display:block; }
                                .spec-row{
                                    display:flex; align-items:center; gap:12px;
                                    padding:10px 0;
                                    border-bottom:1px solid #f1f5f9;
                                }
                                .spec-row:last-child{ border-bottom:none; }

                                /* Nhãn – Giá trị – Dot leaders */
                                .spec-key{
                                    color:#111827; font-weight:600; white-space:nowrap;
                                }
                                .spec-dots{
                                    flex:1; height:1px;
                                    background:repeating-linear-gradient(to right, #d1d5db 0 6px, transparent 6px 12px);
                                    align-self:center;
                                }
                                .spec-val{
                                    color:#111827; font-weight:500; text-align:right; white-space:nowrap;
                                }

                                /* Responsive: hàng dài sẽ xuống dòng gọn gàng */
                                @media (max-width: 576px){
                                    .spec-row{ flex-wrap:wrap; gap:6px; }
                                    .spec-key{ width:100%; }
                                    .spec-dots{ display:none; }
                                    .spec-val{ width:100%; text-align:left; opacity:.9; }
                                }

                                /* căn cho nhiều badge vẫn đúng cột giá trị */
                                .spec-val-multi{
                                    display:flex;
                                    flex-wrap:wrap;
                                    justify-content:flex-end; /* khớp kiểu canh phải của cột giá trị */
                                    gap:6px;
                                }

                                /* chip/badge cho từng giá trị */
                                .spec-badge{
                                    display:inline-flex; align-items:center;
                                    padding:2px 8px;
                                    border:1px solid #e5e7eb;
                                    background:#f6f8fa;
                                    border-radius:999px;
                                    font-weight:600;
                                    white-space:nowrap;
                                }

                                /* mobile: đưa về trái cho dễ đọc */
                                @media (max-width:576px){
                                    .spec-val-multi{ justify-content:flex-start; }
                                }

                            </style>
                            <div class="product-tabs productDetail--box box-detail-description product-description mg-top">
                                <ul class="tab-header">
                                    <li class="active" data-tab="tab-description">Mô tả sản phẩm</li>
                                    <li data-tab="tab-specs">Thông số kỹ thuật</li>
                                </ul>

                                <div class="tab-content active" id="tab-description">
                                    <div class="description-content expandable-toggle opened">
                                        {!! $product->body !!}

                                    </div>
                                </div>
                                <div class="tab-content" id="tab-specs">
                                    <div class="box-title"><h2>Thông số kỹ thuật</h2></div>
                                    <div class="specs-card">
                                        @foreach($attributes as $group)
                                            <section class="spec-group">
                                                <h3 class="spec-heading">{{ mb_strtoupper($group['name']) }}</h3>

                                                <div class="spec-list">
                                                    @foreach($group['items'] as $item)
                                                        <div class="spec-row">
                                                            <span class="spec-key">{{ $item['label'] }}:</span>
                                                            <span class="spec-dots" aria-hidden="true"></span>

                                                            @if(!empty($item['values']) && count($item['values']) > 1)
                                                                <span class="spec-val spec-val-multi">
                                                                    @foreach($item['values'] as $v)
                                                                        <span class="spec-badge">{{ $v }}</span>
                                                                    @endforeach
                                                                </span>
                                                            @else
                                                                <span class="spec-val">{{ $item['values'][0] ?? '' }}</span>
                                                            @endif
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </section>
                                        @endforeach
                                    </div>

                                    </div>
                                </div>
                            </div>




{{--                            <div class="productDetail--box box-detail-description">--}}
{{--                                <div class="product-description mg-top">--}}
{{--                                    <div class="box-title"><h2>Mô tả sản phẩm</h2></div>--}}
{{--                                    <div class="description-content expandable-toggle opened">--}}

{{--                                        <div class="description-productdetail">--}}
{{--                                            <p><strong>Đặc điểm nổi bật</strong></p>--}}
{{--                                            <ul>--}}
{{--                                                <li><p>Tivi Sony có độ phân giải 4K hiển thị hình ảnh sắc nét gấp 4 lần Full--}}
{{--                                                        HD</p></li>--}}
{{--                                                <li><p>Công nghệ 4K X-Reality PRO tự động nâng cấp hình ảnh lên 4K sắc--}}
{{--                                                        nét</p></li>--}}
{{--                                                <li><p>Công nghệ&nbsp;Triluminos Pro tái hiện dải màu rộng, màu sắc rực rỡ,--}}
{{--                                                        tự nhiên</p></li>--}}
{{--                                                <li><p>Cảnh hành động nhanh mượt mà hơn nhờ công nghệ Motionflow XR 800</p>--}}
{{--                                                </li>--}}
{{--                                                <li><p>Thiết kế loa bất đối xứng X-Balanced Speaker cho âm thanh chất lượng--}}
{{--                                                        cao</p></li>--}}
{{--                                                <li><p>Công nghệ&nbsp;Room compensation tối ưu hóa âm thanh trong phòng theo--}}
{{--                                                        vị trí ngồi</p></li>--}}
{{--                                                <li><p>Chia sẻ nội dung từ điện thoại lên màn hình TV qua&nbsp;Chromecast,--}}
{{--                                                        Apple Airplay</p></li>--}}
{{--                                            </ul>--}}
{{--                                            <div> </div>--}}
{{--                                            <h2>Thông số sản phẩm</h2>--}}
{{--                                            <table id="tblGeneralAttribute" border="1" cellspacing="0"--}}
{{--                                                   style="background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:100%"--}}
{{--                                                   class="mce-item-table table table-bordered">--}}
{{--                                                <tbody style="box-sizing: border-box;">--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        Model--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        <table>--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>KD-43X75</td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        <table>--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>Nhà sản xuất</td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        Sony--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        <table>--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>Xuất xứ</td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        Việt Nam--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        Năm ra mắt--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        2021--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        Thời gian bảo hành--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        24 tháng--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        Loại Tivi--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        Android Tivi--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        Kích thước màn hình--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        43 inch--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        Độ phân giải--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        4K (3840 x 2160) Pixels--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr style="box-sizing:border-box" class="row-info">--}}
{{--                                                    <td style="background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%">--}}
{{--                                                        Công nghệ xử lí hình ảnh--}}
{{--                                                    </td>--}}
{{--                                                    <td style="border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%">--}}
{{--                                                        X1 4K Processor, Direct LED Frame Dimming, HLG, Motionflow XR 200,--}}
{{--                                                        HDR10, Auto Mode, 4K X-Reality PRO--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                        </div>--}}
{{--                                        <div class="description-btn">--}}
{{--                                            <button class="expandable-content_toggle js_expandable_content">--}}
{{--                                                <span class="expandable-content_toggle-icon"></span>--}}
{{--                                                <span class="expandable-content_toggle-text">Xem thêm nội dung</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                    </div>
                </section>

                <!-- related -->
                <section class="productDetail-related">
                    <div class="container container-pd0">
                        <div class="productRelated-title">
                            <h2>Sản phẩm liên quan</h2>
                        </div>


                        <div class="productRelated-content">
                            <div class="listProduct-related listProduct-row owlCarousel-dfex owl-carousel owlCarousel-style icon-arrow"
                                 id="owlProduct-related">

                                @foreach($productLienquan as $productLq)
                                    <div class="product-loop">
                                        <div class="product-inner"  id="listProdRelated_loop_{{$productLq->id}}">
                                            <div class="proloop-image">

                                                <div class="product--image">

                                                    <div class="lazy-img first-image">
                                                        <picture>
                                                            @php
                                                                $variant = $productLq->variants[0];
                                                                $img1 = @$variant->image->path ?? '';
                                                                $img2 = @$variant->galleries[0]->image->path ?? (@$variant->image->path ?? '');
                                                            @endphp
                                                            <source media="(max-width: 480px)"
                                                                    data-srcset="{{ $img1 }}"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                            <source media="(min-width: 481px)"
                                                                    data-srcset="{{ $img1 }}"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                            <img class="lazyload img-loop "
                                                                 data-src="{{ $img1 }}"
                                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                 alt=" {{ $productLq->name }} "/>
                                                        </picture>
                                                    </div>
                                                    <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                        <picture>
                                                            <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="{{ $img2 }}"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                            <source media="(min-width:768px)"
                                                                    data-srcset="{{ $img2 }}"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                            <img class="lazyload img-loop "
                                                                 data-src="{{ $img2 }}"
                                                                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                 alt=" {{ $productLq->name }} "/>
                                                        </picture>
                                                    </div>
                                                </div>
                                                <a href="{{ route('front.show-product-detail', $productLq->slug) }}"
                                                   class="proloop-link quickview-product"
                                                   data-handle=""
                                                   title=" {{ $productLq->name }}"></a>
                                            </div>
                                            <div class="proloop-detail">
                                                <div class="proloop--top">
                                                    <p class="proloop--vendor"><a title="Show vendor"
                                                                                  href="#"> {{ $productLq->category->name ?? '' }}</a>
                                                    </p>
                                                </div>
                                                <h3><a href="{{ route('front.show-product-detail', $productLq->slug) }}"
                                                       class="quickview-product"
                                                       data-handle=""> {{ $productLq->name }}</a></h3>
                                                <div class="proloop--variant">

                                                </div>

                                                <div class="proloop--price on-sale d-flex">

                                                    <div class="price-box">
                                                        <span class="price">{{ formatCurrency($productLq->price) }}₫</span>

                                                        @if($productLq->base_price > 0)
                                                            <span class="price-del">{{ formatCurrency($productLq->base_price) }}₫</span>
                                                        @endif
                                                    </div>
                                                    @if($productLq->base_price > 0)
                                                        <span class="pro-sale">-{{ $productLq->percent_discount }}%</span>
                                                    @endif

                                                </div>
                                                <div class="proloop-actions" data-vrid="1086987930"
                                                     data-handle="android-tivi-sony-4k-43-inch-kd-43x8050h-vn3">
                                                    <div class="proloop-actions__inner">
                                                        <div class="actions-primary">
                                                            <button type="button" class="btn-proloop-cart add-to-cart  "
                                                                    ng-click="addToCart({{ $productLq->id }}, {{ $productLq->variants[0]->id }})"  >
							<span class="btnico" title="Thêm vào giỏ">
								<svg class="btnico-first" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                                <span class="btnadd">  Thêm vào giỏ </span>
                                                            </button>

                                                        </div>
                                                        <div class="actions-boxqty d-flex">
                                                            <div class="actions-icon">
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987930')" title="Thêm vào giỏ">
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
                        </div>

                    </div>
                </section>




                <!-- genneral -->
                <section class="productDetail-toolbar d-sm-block d-lg-none" id="product-toolbar">
                    <div class="productToolbar-addcart">
                        <div class="container">
                            <div class="product-actions">
                                <div class="block-quantity quantity-selector ">
                                    <input type="button" value="-" onclick="HRT.All.minusQuantity()" class="qty-btn">
                                    <input type="text" id="quantity-bottom" name="quantity" value="1" min="1"
                                           class="quantity-number">
                                    <input type="button" value="+" onclick="HRT.All.plusQuantity()" class="qty-btn">
                                </div>
                                <div class="block-addcart">
                                    <button type="button" id="add-to-cartBottom" ng-click="buyNow({{ $product->id }})"
                                            class=" add-to-cartProduct btnred button dark btn-addtocart addtocart-modal"
                                            name="add">
                                        Mua ngay
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            </div>



            <script>
                $(document).ready(function () {


                });
            </script>

            <div class="d-none">
                <div class="cpi-tooltip__info" id="cp-tooltip-1">
                    <div class="popover-content__coupon">
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Mã</div>
                            <div class="dfex-txt--2"><b> A87TYRT55</b> <span class="cpi-trigger"
                                                                             data-coupon-index="coupon-item__1"
                                                                             data-coupon="A87TYRT55"></span></div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Hạn sử dụng</div>
                            <div class="dfex-txt--2">10/04/2022</div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--3">
                                <ul>
                                    <li>Dành cho đơn hàng từ 300k</li>
                                    <li>Mỗi khách hàng được sử dụng tối đa 1 lần.</li>
                                    <li>Sao chép mã và nhập mã khuyến mãi ở trang thanh toán</li>
                                </ul>
                            </div>
                        </div>
                        <div class="dfex-txt dfex-bkg dfex-none">
                            <div class="dfex-txt--cta">
                                <button class="btn-popover btn-popover-code" data-coupon="A87TYRT55">Sao chép mã</button>
                                <button class="btn-popover btn-popover-close">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cpi-tooltip__info" id="cp-tooltip-2">
                    <div class="popover-content__coupon">
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Mã</div>
                            <div class="dfex-txt--2"><b> QH5G8J0Y</b> <span class="cpi-trigger"
                                                                            data-coupon-index="coupon-item__2"
                                                                            data-coupon="QH5G8J0Y"></span></div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Hạn sử dụng</div>
                            <div class="dfex-txt--2">05/05/2022</div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--3">
                                <ul>
                                    <li>Dành cho đơn hàng từ 200k</li>
                                    <li>Mỗi khách hàng được sử dụng tối đa 1 lần.</li>
                                    <li>Sao chép mã và nhập mã khuyến mãi ở trang thanh toán</li>
                                </ul>
                            </div>
                        </div>
                        <div class="dfex-txt dfex-bkg dfex-none">
                            <div class="dfex-txt--cta">
                                <button class="btn-popover btn-popover-code" data-coupon="QH5G8J0Y">Sao chép mã</button>
                                <button class="btn-popover btn-popover-close">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cpi-tooltip__info" id="cp-tooltip-3">
                    <div class="popover-content__coupon">
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Mã</div>
                            <div class="dfex-txt--2"><b> FT45YUO8H</b> <span class="cpi-trigger"
                                                                             data-coupon-index="coupon-item__3"
                                                                             data-coupon="FT45YUO8H"></span></div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Hạn sử dụng</div>
                            <div class="dfex-txt--2">10/05/2022</div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--3">
                                <ul>


                                    <li>Sao chép mã và nhập mã khuyến mãi ở trang thanh toán</li>
                                </ul>
                            </div>
                        </div>
                        <div class="dfex-txt dfex-bkg dfex-none">
                            <div class="dfex-txt--cta">
                                <button class="btn-popover btn-popover-code" data-coupon="FT45YUO8H">Sao chép mã</button>
                                <button class="btn-popover btn-popover-close">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cpi-tooltip__info" id="cp-tooltip-4">
                    <div class="popover-content__coupon">
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Mã</div>
                            <div class="dfex-txt--2"><b> A789UYT</b> <span class="cpi-trigger"
                                                                           data-coupon-index="coupon-item__4"
                                                                           data-coupon="A789UYT"></span></div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--1">Hạn sử dụng</div>
                            <div class="dfex-txt--2">20/05/2022</div>
                        </div>
                        <div class="dfex-txt dfex-bkg">
                            <div class="dfex-txt--3">
                                <ul>
                                    <li>Sao chép mã và nhập mã khuyến mãi ở trang thanh toán</li>


                                </ul>
                            </div>
                        </div>
                        <div class="dfex-txt dfex-bkg dfex-none">
                            <div class="dfex-txt--cta">
                                <button class="btn-popover btn-popover-code" data-coupon="A789UYT">Sao chép mã</button>
                                <button class="btn-popover btn-popover-close">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-coupon--backdrop"></div>
        </main>

    </div>

@endsection

@push('scripts')
    <script>
        document.querySelectorAll(".tab-header li").forEach(tab => {
            tab.addEventListener("click", function() {
                // Xóa active trên tất cả tabs
                document.querySelectorAll(".tab-header li").forEach(t => t.classList.remove("active"));
                document.querySelectorAll(".tab-content").forEach(c => c.classList.remove("active"));

                // Thêm active cho tab đang click
                this.classList.add("active");
                document.getElementById(this.dataset.tab).classList.add("active");
            });
        });
    </script>


    <script>
        app.controller('productDetailPage', function ($rootScope, $scope, $interval, $timeout, compareItemSync, cartItemSync) {
            $scope.variant = @json($variantDefault);

            $scope.variants = @json($product->variants);
            $scope.selectedVariantId = ($scope.variant && $scope.variant.id) ? $scope.variant.id : null;

            // $scope.getVariant = function (variantId) {
            //     var v = ($scope.variants || []).find(function (item) {
            //         return item.id == variantId;
            //     });
            //
            //     if (v) {
            //         $scope.variant = angular.copy(v);
            //     }
            //
            //     console.log($scope.variant)
            // }



            $scope.keySelect = function (e, id) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    $scope.selectVariant(id);
                }
            };

            // click thêm sp vào list so sánh
            $scope.addToCompareList = function (productId) {
                url = "{{route('compare.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', productId);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': 1
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function () {
                                compareItemSync.items = response.compareItems;
                                compareItemSync.count = response.count;
                            }, 1000);
                        } else {
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.toastr('Thao tác thất bại !');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }


            $scope.addToCart = function (productId, variantId) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                url = "{{route('cart.add.item', ['productId' => 'productId', 'variantId' => 'variantId'])}}";
                url = url.replace('productId', productId);
                url = url.replace('variantId', variantId);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': 1
                    },
                    success: function (response) {
                        if (response.success) {
                            $interval.cancel($rootScope.promise);
                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            toastr.success('Đã thêm sản phẩm vào giỏ hàng');

                        }
                    },
                    error: function () {
                        jQuery.toast('Thao tác thất bại !')
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.buyNow = function (productId) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                url = "{{route('cart.add.item', ['productId' => 'productId', 'variantId' => 'variantId'])}}";
                url = url.replace('productId', productId);
                url = url.replace('variantId', $scope.selectedVariantId);
                console.log(productId)
                console.log($scope.selectedVariantId)
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': currentVal
                    },
                    success: function (response) {
                        if (response.success) {
                            $interval.cancel($rootScope.promise);
                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            toastr.success('Đã thêm sản phẩm vào giỏ hàng');
                            window.location.href = "{{ route('cart.index') }}";

                        }
                    },
                    error: function () {
                        jQuery.toast('Thao tác thất bại !')
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.tragop = function (productId) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                url = "{{route('cart.add.item', ['productId' => 'productId', 'variantId' => 'variantId'])}}";
                url = url.replace('productId', productId);
                url = url.replace('variantId', $scope.selectedVariantId);
                console.log(productId)
                console.log($scope.selectedVariantId)
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        'qty': currentVal
                    },
                    success: function (response) {
                        if (response.success) {
                            $interval.cancel($rootScope.promise);
                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            window.location.href = "{{ route('cart.finance') }}";

                        }
                    },
                    error: function () {
                        jQuery.toast('Thao tác thất bại !')
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            //

// Đặt ở scope global (hoặc trong object của bạn)

            var $main  = $('#quickview-sliderproduct');
            var $thumb = $('#quickview-thumbproduct');
            var DUR = 500;

            function ensureInit(){
                if (!$main.data('owl.carousel')) {
                    $main.owlCarousel({
                        items:1, nav:true, dots:true, loop:false, smartSpeed:1000,
                        responsive:{0:{dots:true},768:{dots:false}}
                    });

                    $thumb.owlCarousel({
                        loop:false, nav:false, dots:false, margin:5, center:false,
                        responsive:{0:{items:5, margin:7},768:{items:6},992:{items:6},1200:{items:6}}
                    });

                    // sync
                    $main.on('changed.owl.carousel', function(e){
                        var i = (e.item && typeof e.item.index === 'number') ? e.item.index : 0;
                        $thumb.trigger('to.owl.carousel', [i, DUR, true]);
                        $thumb.find('.owl-item').removeClass('current').eq(i).addClass('current');
                    });
                    $thumb.on('click', '.owl-item', function(e){
                        e.preventDefault();
                        var i = $(this).index();
                        $thumb.find('.owl-item').removeClass('current'); $(this).addClass('current');
                        $main.trigger('to.owl.carousel', [i, DUR, true]);
                    });
                    $thumb.on('initialized.owl.carousel', function(){
                        $thumb.find('.owl-item').eq(0).addClass('current');
                    });
                }
            }

            // thay toàn bộ slides bằng API của Owl (không để Angular đụng DOM bên trong)
            function setSlides(imgs){
                ensureInit();
                var htmlMain  = (imgs||[]).map(function(src){
                    return '<li class="product-gallery"><a class="gallery-item"><img src="'+src+'" alt=""></a></li>';
                }).join('');
                var htmlThumb = (imgs||[]).map(function(src){
                    return '<li class="product-thumb"><a class="product-thumb__item"><img src="'+src+'" alt=""></a></li>';
                }).join('');

                $main.trigger('replace.owl.carousel',  [htmlMain]).trigger('refresh.owl.carousel');
                $thumb.trigger('replace.owl.carousel', [htmlThumb]).trigger('refresh.owl.carousel');
            }

            function refresh(){
                var imgs = ($scope.variant && $scope.variant.thumb) || [];
                // chạy sau digest để chắc chắn container đã có width > 0
                $timeout(function(){ setSlides(imgs); }, 0);
            }

            // đổi biến thể / đổi mảng ảnh → cập nhật slides
            $scope.$watch('variant.id', function(n, o){ if(n!==o) refresh(); });
            $scope.$watchCollection('variant.thumb', function(){ refresh(); });

            // lần đầu
            $timeout(refresh, 0);

            // hàm của bạn — chỉ set dữ liệu, không đụng Owl
            $scope.getVariant = function (variantId) {
                var v = ($scope.variants || []).find(function (it) { return it.id == variantId; });
                if (v) { $scope.variant = angular.copy(v); refresh(); }
            };

            $scope.selectVariant = function (id) {
                $scope.selectedVariantId = id;
                $scope.getVariant(id);
            };





            // helper: đánh dấu current theo index
            function markThumbCurrent(i){
                var $thumb = $('#quickview-thumbproduct');
                $thumb.find('.owl-item').removeClass('current')
                    .eq(i).addClass('current');
            }

// sau khi KHỞI TẠO hoặc REFRESH hoặc đổi slide -> cập nhật viền
            var $main  = $('#quickview-sliderproduct');
            var $thumb = $('#quickview-thumbproduct');

            $main.on('initialized.owl.carousel.qv refreshed.owl.carousel.qv changed.owl.carousel.qv', function(e){
                var api = $main.data('owl.carousel');
                var idx = (e.item && typeof e.item.index==='number') ? e.item.index
                    : (api ? api.relative(api.current()) : 0);
                markThumbCurrent(idx);
            });

// đảm bảo lần đầu vừa init xong cũng set viền
            $thumb.on('initialized.owl.carousel.qv refreshed.owl.carousel.qv', function(){
                var api = $main.data('owl.carousel');
                var idx = api ? api.relative(api.current()) : 0;
                markThumbCurrent(idx);
            });

        })
    </script>
@endpush
