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
                                    <a href="../index.html" target="_self" itemprop="item"><span
                                            itemprop="name">Trang chủ</span></a>
                                    <meta itemprop="position" content="1"/>
                                </li>


                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="../collections/tivi.html" target="_self" itemprop="item"><span itemprop="name">Tivi</span></a>
                                    <meta itemprop="position" content="2"/>
                                </li>

                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
				<span itemprop="item"
                      content="https://techgo.myharavan.com/products/android-tivi-sony-4k-43-inch-kd-43x75-vn3">
					<span itemprop="name">Android Tivi Sony 4K 43 inch KD-43X75 VN3</span>
				</span>
                                    <meta itemprop="position" content="3"/>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                <section class="productDetail-information productDetail_style__01">
                    <div class="container container-pd0">
                        <div class="productDetail--main">
                            <div class="productDetail--gallery">
                                <div class="product-container-gallery">
                                    <div class="wrapbox-gallery">

                                        <div class="wrapbox-image">

                                            <div class="product-gallery">
                                                <img ng-src="<% (variant && variant.image && variant.image.path) ? variant.image.path : '' %>"
                                                     alt="{{ $product->name }}">
                                            </div>

                                        </div>

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

                                            <span class="pro-soldold">Tình trạng:

									<strong><% variant.status ? 'Còn hàng' : 'Hết hàng' %></strong>

								</span>
                                            <span class="pro-vendor">Hãng sản xuất:
                                                <strong><a title="Show vendor" href="../collections/vendorsca3d.html?q=sony">{{ $product->manufacturer->name ?? '' }}</a></strong></span>
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
                                                            <button type="button" id="add-to-cart"
                                                                    class=" add-to-cartProduct button dark btn-addtocart addtocart-modal"
                                                                    ng-click="addToCart({{ $product->id }})"
                                                                    name="add">
                                                                Thêm vào giỏ
                                                            </button>

                                                            <button type="button" id="buy-now"
                                                                    class="  button dark btn-buynow btnred addtocart-modal"
                                                                    name="add">
                                                                Mua ngay
                                                            </button>


                                                            <button type="button"
                                                                    class="  button dark btn-buynow btnred addtocart-modal" ng-click="addToCompareList({{ $product->id }})"
                                                                    name="add">
                                                               Thêm vào so sánh
                                                            </button>



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
                                                             data-src="../../theme.hstatic.net/200000516791/1001206835/14/product_deliverly_1_ico70ea.png?v=162"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="Cam kết 100% ch&#237;nh h&#227;ng"/>
													</span>
                                                                Cam kết 100% chính hãng
                                                            </div>


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="../../theme.hstatic.net/200000516791/1001206835/14/product_deliverly_2_ico70ea.png?v=162"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="Miễn ph&#237; giao h&#224;ng"/>
													</span>
                                                                Miễn phí giao hàng
                                                            </div>


                                                            <div class="deliverly-item">
													<span>
														<img class="lazyload"
                                                             data-src="../../theme.hstatic.net/200000516791/1001206835/14/product_deliverly_3_ico70ea.png?v=162"
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
                                                             data-src="../../theme.hstatic.net/200000516791/1001206835/14/product_deliverly_4_ico70ea.png?v=162"
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
                                                             data-src="../../theme.hstatic.net/200000516791/1001206835/14/product_deliverly_5_ico70ea.png?v=162"
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
                                                             data-src="../../theme.hstatic.net/200000516791/1001206835/14/product_deliverly_6_ico70ea.png?v=162"
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
                                                <div class="product-banner">
                                                    <a href="../collections/all.html">
                                                        <img src="../../theme.hstatic.net/200000516791/1001206835/14/product_banner70ea.jpg?v=162"
                                                             alt="product banner">
                                                    </a>
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

                            <div class="productDetail--box box-detail-coupon">
                                <div class="product-coupon coupon-initial  bgWhite mg-top">
                                    <div class="title-coupon">
                                        <h2>Khuyến mãi dành cho bạn</h2>
                                    </div>
                                    <div class="listCoupon">


                                        <div class="col-12 col-md-6 col-xl-3 coupon-item">
                                            <div class="coupon-item__inner">
                                                <div class="coupon-item__left">
                                                    <div class="cp-img boxlazy-img">
											<span class="boxlazy-img__insert">
												<img class="lazyload"
                                                     data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_1_img.png?v=162"
                                                     src="../../theme.hstatic.net/200000516791/1001206835/14/home_coupon_1_img70ea.png?v=162"
                                                     alt="Miễn phí vận chuyển">
											</span>
                                                    </div>
                                                </div>
                                                <div class="coupon-item__right">
                                                    <button type="button" class="cp-icon"
                                                            data-toggle="popover" data-container="body"
                                                            data-placement="bottom"
                                                            data-popover-content="#cp-tooltip-1" data-class="coupon-popover"
                                                            title="Miễn phí vận chuyển ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                             height="20" viewBox="0 0 20 20">
                                                            <defs>
                                                                <path id="4gg7gqe5ua"
                                                                      d="M8.333 0C3.738 0 0 3.738 0 8.333c0 4.595 3.738 8.334 8.333 8.334 4.595 0 8.334-3.739 8.334-8.334S12.928 0 8.333 0zm0 1.026c4.03 0 7.308 3.278 7.308 7.307 0 4.03-3.278 7.308-7.308 7.308-4.03 0-7.307-3.278-7.307-7.308 0-4.03 3.278-7.307 7.307-7.307zm.096 6.241c-.283 0-.512.23-.512.513v4.359c0 .283.23.513.512.513.284 0 .513-.23.513-.513V7.78c0-.283-.23-.513-.513-.513zm.037-3.114c-.474 0-.858.384-.858.858 0 .473.384.857.858.857s.858-.384.858-.857c0-.474-.384-.858-.858-.858z"/>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g transform="translate(-2808 -4528) translate(2708 80) translate(52 4304) translate(48 144) translate(1.667 1.667)">
                                                                                    <use xlink:href="#4gg7gqe5ua"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </button>

                                                    <div class="cp-top">
                                                        <h3>Miễn phí vận chuyển</h3>
                                                        <p>Đơn hàng từ 300k</p>
                                                    </div>
                                                    <div class="cp-bottom">
                                                        <div class="cp-bottom-detail">
                                                            <p>Mã: <strong>A87TYRT55</strong></p>
                                                            <p>HSD: 10/04/2022</p>
                                                        </div>
                                                        <div class="cp-bottom-btn">
                                                            <button class="cp-btn button" data-coupon="A87TYRT55">Sao chép
                                                                mã
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6 col-xl-3 coupon-item">
                                            <div class="coupon-item__inner">
                                                <div class="coupon-item__left">
                                                    <div class="cp-img boxlazy-img">
											<span class="boxlazy-img__insert">
												<img class="lazyload"
                                                     data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_2_img.png?v=162"
                                                     src="../../theme.hstatic.net/200000516791/1001206835/14/home_coupon_2_img70ea.png?v=162"
                                                     alt="Giảm 20%">
											</span>
                                                    </div>
                                                </div>
                                                <div class="coupon-item__right">
                                                    <button type="button" class="cp-icon"
                                                            data-toggle="popover" data-container="body"
                                                            data-placement="bottom"
                                                            data-popover-content="#cp-tooltip-2" data-class="coupon-popover"
                                                            title="Giảm 20% ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                             height="20" viewBox="0 0 20 20">
                                                            <defs>
                                                                <path id="4gg7gqe5ua"
                                                                      d="M8.333 0C3.738 0 0 3.738 0 8.333c0 4.595 3.738 8.334 8.333 8.334 4.595 0 8.334-3.739 8.334-8.334S12.928 0 8.333 0zm0 1.026c4.03 0 7.308 3.278 7.308 7.307 0 4.03-3.278 7.308-7.308 7.308-4.03 0-7.307-3.278-7.307-7.308 0-4.03 3.278-7.307 7.307-7.307zm.096 6.241c-.283 0-.512.23-.512.513v4.359c0 .283.23.513.512.513.284 0 .513-.23.513-.513V7.78c0-.283-.23-.513-.513-.513zm.037-3.114c-.474 0-.858.384-.858.858 0 .473.384.857.858.857s.858-.384.858-.857c0-.474-.384-.858-.858-.858z"/>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g transform="translate(-2808 -4528) translate(2708 80) translate(52 4304) translate(48 144) translate(1.667 1.667)">
                                                                                    <use xlink:href="#4gg7gqe5ua"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </button>

                                                    <div class="cp-top">
                                                        <h3>Giảm 20%</h3>
                                                        <p>Đơn hàng từ 200k</p>
                                                    </div>
                                                    <div class="cp-bottom">
                                                        <div class="cp-bottom-detail">
                                                            <p>Mã: <strong>QH5G8J0Y</strong></p>
                                                            <p>HSD: 05/05/2022</p>
                                                        </div>
                                                        <div class="cp-bottom-btn">
                                                            <button class="cp-btn button" data-coupon="QH5G8J0Y">Sao chép
                                                                mã
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6 col-xl-3 coupon-item">
                                            <div class="coupon-item__inner">
                                                <div class="coupon-item__left">
                                                    <div class="cp-img boxlazy-img">
											<span class="boxlazy-img__insert">
												<img class="lazyload"
                                                     data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_3_img.png?v=162"
                                                     src="../../theme.hstatic.net/200000516791/1001206835/14/home_coupon_3_img70ea.png?v=162"
                                                     alt="Giảm 50k">
											</span>
                                                    </div>
                                                </div>
                                                <div class="coupon-item__right">
                                                    <button type="button" class="cp-icon"
                                                            data-toggle="popover" data-container="body"
                                                            data-placement="bottom"
                                                            data-popover-content="#cp-tooltip-3" data-class="coupon-popover"
                                                            title="Giảm 50k ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                             height="20" viewBox="0 0 20 20">
                                                            <defs>
                                                                <path id="4gg7gqe5ua"
                                                                      d="M8.333 0C3.738 0 0 3.738 0 8.333c0 4.595 3.738 8.334 8.333 8.334 4.595 0 8.334-3.739 8.334-8.334S12.928 0 8.333 0zm0 1.026c4.03 0 7.308 3.278 7.308 7.307 0 4.03-3.278 7.308-7.308 7.308-4.03 0-7.307-3.278-7.307-7.308 0-4.03 3.278-7.307 7.307-7.307zm.096 6.241c-.283 0-.512.23-.512.513v4.359c0 .283.23.513.512.513.284 0 .513-.23.513-.513V7.78c0-.283-.23-.513-.513-.513zm.037-3.114c-.474 0-.858.384-.858.858 0 .473.384.857.858.857s.858-.384.858-.857c0-.474-.384-.858-.858-.858z"/>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g transform="translate(-2808 -4528) translate(2708 80) translate(52 4304) translate(48 144) translate(1.667 1.667)">
                                                                                    <use xlink:href="#4gg7gqe5ua"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </button>

                                                    <div class="cp-top">
                                                        <h3>Giảm 50k</h3>
                                                        <p>Đơn hàng từ 500k</p>
                                                    </div>
                                                    <div class="cp-bottom">
                                                        <div class="cp-bottom-detail">
                                                            <p>Mã: <strong>FT45YUO8H</strong></p>
                                                            <p>HSD: 10/05/2022</p>
                                                        </div>
                                                        <div class="cp-bottom-btn">
                                                            <button class="cp-btn button" data-coupon="FT45YUO8H">Sao chép
                                                                mã
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6 col-xl-3 coupon-item">
                                            <div class="coupon-item__inner">
                                                <div class="coupon-item__left">
                                                    <div class="cp-img boxlazy-img">
											<span class="boxlazy-img__insert">
												<img class="lazyload"
                                                     data-src="//theme.hstatic.net/200000516791/1001206835/14/home_coupon_4_img.png?v=162"
                                                     src="../../theme.hstatic.net/200000516791/1001206835/14/home_coupon_4_img70ea.png?v=162"
                                                     alt="Giảm 10%">
											</span>
                                                    </div>
                                                </div>
                                                <div class="coupon-item__right">
                                                    <button type="button" class="cp-icon"
                                                            data-toggle="popover" data-container="body"
                                                            data-placement="bottom"
                                                            data-popover-content="#cp-tooltip-4" data-class="coupon-popover"
                                                            title="Giảm 10% ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                             height="20" viewBox="0 0 20 20">
                                                            <defs>
                                                                <path id="4gg7gqe5ua"
                                                                      d="M8.333 0C3.738 0 0 3.738 0 8.333c0 4.595 3.738 8.334 8.333 8.334 4.595 0 8.334-3.739 8.334-8.334S12.928 0 8.333 0zm0 1.026c4.03 0 7.308 3.278 7.308 7.307 0 4.03-3.278 7.308-7.308 7.308-4.03 0-7.307-3.278-7.307-7.308 0-4.03 3.278-7.307 7.307-7.307zm.096 6.241c-.283 0-.512.23-.512.513v4.359c0 .283.23.513.512.513.284 0 .513-.23.513-.513V7.78c0-.283-.23-.513-.513-.513zm.037-3.114c-.474 0-.858.384-.858.858 0 .473.384.857.858.857s.858-.384.858-.857c0-.474-.384-.858-.858-.858z"/>
                                                            </defs>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g transform="translate(-2808 -4528) translate(2708 80) translate(52 4304) translate(48 144) translate(1.667 1.667)">
                                                                                    <use xlink:href="#4gg7gqe5ua"/>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </button>

                                                    <div class="cp-top">
                                                        <h3>Giảm 10%</h3>
                                                        <p>Đơn hàng từ 100k</p>
                                                    </div>
                                                    <div class="cp-bottom">
                                                        <div class="cp-bottom-detail">
                                                            <p>Mã: <strong>A789UYT</strong></p>
                                                            <p>HSD: 20/05/2022</p>
                                                        </div>
                                                        <div class="cp-bottom-btn">
                                                            <button class="cp-btn button" data-coupon="A789UYT">Sao chép
                                                                mã
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


                                <div class="product-loop" data-id="1086987930">
                                    <div class="product-inner" data-proid="1039990831" id="listProdRelated_loop_2">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990831">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="../../product.hstatic.net/200000516791/product/product_26_1_1b7549fe94764bcb951575f748e38477_b65974a23bf444daad18a55f0fc28bab_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="../../product.hstatic.net/200000516791/product/product_26_1_1b7549fe94764bcb951575f748e38477_b65974a23bf444daad18a55f0fc28bab_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="../../product.hstatic.net/200000516791/product/product_26_1_1b7549fe94764bcb951575f748e38477_b65974a23bf444daad18a55f0fc28bab_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Android Tivi Sony 4K 43 inch KD-43X8050H VN3 "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="../../product.hstatic.net/200000516791/product/product_23_2_3821d3c206bc4177808ceaa192bc0a1c_3fb85cc7fbdd46b7a5bc31127154ff28_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="../../product.hstatic.net/200000516791/product/product_23_2_3821d3c206bc4177808ceaa192bc0a1c_3fb85cc7fbdd46b7a5bc31127154ff28_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="../../product.hstatic.net/200000516791/product/product_23_2_3821d3c206bc4177808ceaa192bc0a1c_3fb85cc7fbdd46b7a5bc31127154ff28_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Android Tivi Sony 4K 43 inch KD-43X8050H VN3 "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/android-tivi-sony-4k-43-inch-kd-43x8050h-vn3"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="android-tivi-sony-4k-43-inch-kd-43x8050h-vn3.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/android-tivi-sony-4k-43-inch-kd-43x8050h-vn3"
                                               title="Android Tivi Sony 4K 43 inch KD-43X8050H VN3"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendorsca3d.html?q=sony">Sony</a>
                                                </p>
                                            </div>
                                            <h3><a href="android-tivi-sony-4k-43-inch-kd-43x8050h-vn3.html"
                                                   class="quickview-product"
                                                   data-handle="/products/android-tivi-sony-4k-43-inch-kd-43x8050h-vn3">Android
                                                    Tivi Sony 4K 43 inch KD-43X8050H VN3</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price on-sale d-flex">
                                                <div class="price-box">
                                                    <span class="price">14,350,000₫</span>

                                                    <span class="price-del">16,340,000₫</span>
                                                </div>

                                                <span class="pro-sale">-12%</span>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987930"
                                                 data-handle="android-tivi-sony-4k-43-inch-kd-43x8050h-vn3">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987930')">
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
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987930')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987930')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990831_2 = {
                                            "available": true,
                                            "compare_at_price_max": 1634000000.0,
                                            "compare_at_price_min": 1634000000.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 1634000000.0,
                                            "content": null,
                                            "description": "<p><strong>Đặc điểm nổi bật</strong></p><ul><li><p>Tivi Sony có độ phân giải 4K hiển thị hình ảnh sắc nét gấp 4 lần Full HD</p></li><li><p>Công nghệ 4K X-Reality PRO tự động nâng cấp hình ảnh lên 4K sắc nét</p></li><li><p>Công nghệ&nbsp;Triluminos Pro tái hiện dải màu rộng, màu sắc rực rỡ, tự nhiên</p></li><li><p>Cảnh hành động nhanh mượt mà hơn nhờ công nghệ Motionflow XR 800</p></li><li><p>Thiết kế loa bất đối xứng X-Balanced Speaker cho âm thanh chất lượng cao</p></li><li><p>Công nghệ&nbsp;Room compensation tối ưu hóa âm thanh trong phòng theo vị trí ngồi</p></li><li><p>Chia sẻ nội dung từ điện thoại lên màn hình TV qua&nbsp;Chromecast, Apple Airplay</p></li></ul><div> </div><h2>Thông số sản phẩm</h2><table id=\"tblGeneralAttribute\" border=\"1\" cellspacing=\"0\" style=\"background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:100%\" class=\"mce-item-table table table-bordered\"><tbody style=\"box-sizing: border-box;\"><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Model</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td>KD-43X8050H VN3</td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Nhà sản xuất</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Sony</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Xuất xứ</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Việt Nam</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Năm ra mắt</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">2021</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Thời gian bảo hành</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">24 tháng</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Loại Tivi</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Android Tivi</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Kích thước màn hình</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">43 inch</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Độ phân giải</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">4K (3840 x 2160) Pixels</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Công nghệ xử lí hình ảnh</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">X1 4K Processor, Direct LED Frame Dimming, HLG, Motionflow XR 200, HDR10, Auto Mode, 4K X-Reality PRO</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/product_26_1_1b7549fe94764bcb951575f748e38477_b65974a23bf444daad18a55f0fc28bab.png",
                                            "handle": "android-tivi-sony-4k-43-inch-kd-43x8050h-vn3",
                                            "id": 1039990831,
                                            "images": ["https://product.hstatic.net/200000516791/product/product_26_1_1b7549fe94764bcb951575f748e38477_b65974a23bf444daad18a55f0fc28bab.png", "../../product.hstatic.net/200000516791/product/product_23_2_3821d3c206bc4177808ceaa192bc0a1c_3fb85cc7fbdd46b7a5bc31127154ff28.png", "https://product.hstatic.net/200000516791/product/product_23_3_763a5d83d6854a6581302faface4510d_bb2bb87575a74cf19a658056e58d6b63.png"],
                                            "options": ["Tiêu đề"],
                                            "price": 1435000000.0,
                                            "price_max": 1435000000.0,
                                            "price_min": 1435000000.0,
                                            "price_varies": false,
                                            "tags": [],
                                            "template_suffix": null,
                                            "title": "Android Tivi Sony 4K 43 inch KD-43X8050H VN3",
                                            "type": "Khác",
                                            "url": "/products/android-tivi-sony-4k-43-inch-kd-43x8050h-vn3",
                                            "pagetitle": "Android Tivi Sony 4K 43 inch KD-43X8050H VN3",
                                            "metadescription": "Đặc điểm nổi bậtTivi Sony có độ phân giải 4K hiển thị hình ảnh sắc nét gấp 4 lần Full HDCông nghệ 4K X-Reality PRO tự động nâng cấp hình ảnh lên 4K sắc nétCông nghệ Triluminos Pro tái hiện dải màu rộng, màu sắc rực rỡ, tự nhiênCảnh hành động nhanh mượt mà hơn nhờ công nghệ Motionflow XR 800Thiết kế loa bất đối xứng X-B",
                                            "variants": [{
                                                "id": 1086987930,
                                                "barcode": null,
                                                "available": true,
                                                "price": 1435000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 99.0,
                                                "old_inventory_quantity": 99.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 1634000000.0,
                                                "inventory_management": "haravan",
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": {
                                                    "id": 1250860239,
                                                    "created_at": "0001-01-01T00:00:00",
                                                    "position": 1,
                                                    "product_id": 1039990831,
                                                    "updated_at": "0001-01-01T00:00:00",
                                                    "src": "https://product.hstatic.net/200000516791/product/product_26_1_1b7549fe94764bcb951575f748e38477_b65974a23bf444daad18a55f0fc28bab.png",
                                                    "variant_ids": [1086987930]
                                                }
                                            }],
                                            "vendor": "Sony",
                                            "published_at": "2022-05-20T03:56:47.694Z",
                                            "created_at": "2022-05-20T03:56:48.795Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_2');
                                        var listProdRelated_1039990831_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990831_2.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990831_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990831_2.id)
                                        $.each(listProdRelated_1039990831_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/android-tivi-sony-4k-43-inch-kd-43x8050h-vn3"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                                <div class="product-loop" data-id="1086987933">
                                    <div class="product-inner" data-proid="1039990833" id="listProdRelated_loop_3">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990833">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_8_1_40a8adab1068450fa2c5193e55c449db_d2eb31bffb6f40f4a7990c5383cc235b_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_8_1_40a8adab1068450fa2c5193e55c449db_d2eb31bffb6f40f4a7990c5383cc235b_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_8_1_40a8adab1068450fa2c5193e55c449db_d2eb31bffb6f40f4a7990c5383cc235b_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Google Tivi Sony 4K 50 inch KD-50X80J/S VN3 "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_8_3_de5aa5a17f7941e19996b5e52e091ebc_53258e65e61f43ae840b978a94744d23_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_8_3_de5aa5a17f7941e19996b5e52e091ebc_53258e65e61f43ae840b978a94744d23_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_8_3_de5aa5a17f7941e19996b5e52e091ebc_53258e65e61f43ae840b978a94744d23_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Google Tivi Sony 4K 50 inch KD-50X80J/S VN3 "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3"
                                               title="Google Tivi Sony 4K 50 inch KD-50X80J/S VN3"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendorsca3d.html?q=sony">Sony</a>
                                                </p>
                                            </div>
                                            <h3><a href="google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3.html"
                                                   class="quickview-product"
                                                   data-handle="/products/google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3">Google
                                                    Tivi Sony 4K 50 inch KD-50X80J/S VN3</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price on-sale d-flex">
                                                <div class="price-box">
                                                    <span class="price">19,250,000₫</span>

                                                    <span class="price-del">21,500,000₫</span>
                                                </div>

                                                <span class="pro-sale">-10%</span>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987933"
                                                 data-handle="google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987933')">
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
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987933')" title="Thêm vào giỏ">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                        </div>
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987933')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987933')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990833_3 = {
                                            "available": true,
                                            "compare_at_price_max": 2150000000.0,
                                            "compare_at_price_min": 2150000000.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 2150000000.0,
                                            "content": null,
                                            "description": "<p><strong>Đặc điểm nổi bật</strong></p><ul><li><p>Tivi Sony có độ phân giải 4K hiển thị hình ảnh sắc nét gấp 4 lần Full HD</p></li><li><p>Công nghệ 4K X-Reality PRO tự động nâng cấp hình ảnh lên 4K sắc nét</p></li><li><p>Công nghệ&nbsp;Triluminos Pro tái hiện dải màu rộng, màu sắc rực rỡ, tự nhiên</p></li><li><p>Cảnh hành động nhanh mượt mà hơn nhờ công nghệ Motionflow XR 800</p></li><li><p>Thiết kế loa bất đối xứng X-Balanced Speaker cho âm thanh chất lượng cao</p></li><li><p>Công nghệ&nbsp;Room compensation tối ưu hóa âm thanh trong phòng theo vị trí ngồi</p></li><li><p>Chia sẻ nội dung từ điện thoại lên màn hình TV qua&nbsp;Chromecast, Apple Airplay</p></li></ul><div>&nbsp;</div><h2>Thông số sản phẩm</h2><table id=\"tblGeneralAttribute\" border=\"1\" cellspacing=\"0\" style=\"background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:100%\" class=\"mce-item-table table table-bordered\"><tbody style=\"box-sizing: border-box;\"><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Model</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td><table><tbody><tr><td>KD-50X80J/S</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Nhà sản xuất</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Sony</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Xuất xứ</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Malaysia</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Năm ra mắt</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">2021</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Thời gian bảo hành</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">24 tháng</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Loại Tivi</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td>4K HDR GoogleTV</td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Kích thước màn hình</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">43 inch</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Độ phân giải</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">4K (3840 x 2160) Pixels</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Công nghệ xử lí hình ảnh</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">X1 4K Processor, Direct LED Frame Dimming, HLG, Motionflow XR 200, HDR10, Auto Mode, 4K X-Reality PRO</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/product_8_1_40a8adab1068450fa2c5193e55c449db_d2eb31bffb6f40f4a7990c5383cc235b.png",
                                            "handle": "google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3",
                                            "id": 1039990833,
                                            "images": ["https://product.hstatic.net/200000516791/product/product_8_1_40a8adab1068450fa2c5193e55c449db_d2eb31bffb6f40f4a7990c5383cc235b.png", "../../product.hstatic.net/200000516791/product/product_8_3_de5aa5a17f7941e19996b5e52e091ebc_53258e65e61f43ae840b978a94744d23.png", "../../product.hstatic.net/200000516791/product/product_8_2_cdfa4e6e1fac41dbb9b9e29f433a5cf4_5fae594f6bfc409aae61492b905e6e9e.png", "https://product.hstatic.net/200000516791/product/product_8_4_796f81fdeeb34b71830ed1476593fb3c_f9aff1fcfca8487d9a510e6356a08ad5.png"],
                                            "options": ["Tiêu đề"],
                                            "price": 1925000000.0,
                                            "price_max": 1925000000.0,
                                            "price_min": 1925000000.0,
                                            "price_varies": false,
                                            "tags": ["contact"],
                                            "template_suffix": null,
                                            "title": "Google Tivi Sony 4K 50 inch KD-50X80J/S VN3",
                                            "type": "Khác",
                                            "url": "/products/google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3",
                                            "pagetitle": "Google Tivi Sony 4K 50 inch KD-50X80J/S VN3",
                                            "metadescription": "Đặc điểm nổi bậtBộ xử lý X1 4K HDR, mang đến khả năng tái tạo hình ảnh trung thực, sắc nétCông nghệ Triluminos Pro mở rộng hơn 1 tỉ màu sắc, trải nghiệm chân thậtCông nghệ 4K X-Reality Pro tự động nâng cấp hình ảnh lên 4K, sắc nétCông nghệ chuyển động Motionflow XR 200 cho chuyển động nhanh mượt màThiết kế loa bất đối",
                                            "variants": [{
                                                "id": 1086987933,
                                                "barcode": null,
                                                "available": true,
                                                "price": 1925000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 99.0,
                                                "old_inventory_quantity": 99.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 2150000000.0,
                                                "inventory_management": "haravan",
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": null
                                            }],
                                            "vendor": "Sony",
                                            "published_at": "2022-05-20T03:56:55.315Z",
                                            "created_at": "2022-05-20T03:56:57.15Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_3');
                                        var listProdRelated_1039990833_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990833_3.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990833_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990833_3.id)
                                        $.each(listProdRelated_1039990833_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/google-tivi-sony-4k-50-inch-kd-50x80j-s-vn3"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                                <div class="product-loop" data-id="1086987995">
                                    <div class="product-inner" data-proid="1039990862" id="listProdRelated_loop_4">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990862">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_10_1_d788653ed0204882af4bf1227344a232_e7e2820f4ca54b28b5a26395e9116a84_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_10_1_d788653ed0204882af4bf1227344a232_e7e2820f4ca54b28b5a26395e9116a84_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_10_1_d788653ed0204882af4bf1227344a232_e7e2820f4ca54b28b5a26395e9116a84_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi LG 43 inch 43LM6360PTB "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_8_2_07cde04eaf8e4327bfb1eb7cddddfb70_13f04fa003f240f0b45a5ce31b8ce714_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_8_2_07cde04eaf8e4327bfb1eb7cddddfb70_13f04fa003f240f0b45a5ce31b8ce714_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_8_2_07cde04eaf8e4327bfb1eb7cddddfb70_13f04fa003f240f0b45a5ce31b8ce714_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi LG 43 inch 43LM6360PTB "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/smart-tivi-lg-43-inch-43lm6360ptb"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="smart-tivi-lg-43-inch-43lm6360ptb.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/smart-tivi-lg-43-inch-43lm6360ptb"
                                               title="Smart Tivi LG 43 inch 43LM6360PTB"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendors3617.html?q=lg">LG</a>
                                                </p>
                                            </div>
                                            <h3><a href="smart-tivi-lg-43-inch-43lm6360ptb.html" class="quickview-product"
                                                   data-handle="/products/smart-tivi-lg-43-inch-43lm6360ptb">Smart Tivi LG
                                                    43 inch 43LM6360PTB</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price on-sale d-flex">
                                                <div class="price-box">
                                                    <span class="price">9,850,000₫</span>

                                                    <span class="price-del">10,900,000₫</span>
                                                </div>

                                                <span class="pro-sale">-10%</span>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987995"
                                                 data-handle="smart-tivi-lg-43-inch-43lm6360ptb">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987995')">
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
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987995')" title="Thêm vào giỏ">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                        </div>
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987995')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987995')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990862_4 = {
                                            "available": true,
                                            "compare_at_price_max": 1090000000.0,
                                            "compare_at_price_min": 1090000000.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 1090000000.0,
                                            "content": null,
                                            "description": "<p><strong>Đặc điểm nổi bật</strong></p><ul><li><p>Tận hưởng giải trí với Smart Tivi màn hình kích thước 43\"</p></li><li><p>Phân giải hình ảnh chất lượng chuẩn Full HD (1920 x 1080)</p></li><li><p>Công nghệ Dolby Audio hiện đại giúp lan tỏa âm thanh&nbsp;</p></li><li><p>DTS Virtual:X tiên tiến giả lập âm thanh vòm sống động</p></li><li><p>Trang bị đa dạng cổng kết, hỗ trợ tối đa nhu cầu giải trí</p></li><li><p>Hỗ trợ kết nối Wifi chuẩn, chất lượng đường truyền ổn định</p></li></ul><div> </div><h2>Thông số sản phẩm</h2><table id=\"tblGeneralAttribute\" border=\"1\" cellspacing=\"0\" style=\"background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:100%\" class=\"mce-item-table table table-bordered\"><tbody style=\"box-sizing: border-box;\"><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Model</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td><table><tbody><tr><td>43LM6360PTB.ATV</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Nhà sản xuất</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">LG</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Xuất xứ</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td>Indonesia</td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Năm ra mắt</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">2021</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Thời gian bảo hành</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">24 tháng</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Loại Tivi</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td>Smart Tivi</td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Kích thước màn hình</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">43 inch</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Độ phân giải</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Full HD (1920 x 1080) Pixels</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Công nghệ xử lí hình ảnh</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">X1 4K Processor, Direct LED Frame Dimming, HLG, Motionflow XR 200, HDR10, Auto Mode, 4K X-Reality PRO</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/product_10_1_d788653ed0204882af4bf1227344a232_e7e2820f4ca54b28b5a26395e9116a84.png",
                                            "handle": "smart-tivi-lg-43-inch-43lm6360ptb",
                                            "id": 1039990862,
                                            "images": ["https://product.hstatic.net/200000516791/product/product_10_1_d788653ed0204882af4bf1227344a232_e7e2820f4ca54b28b5a26395e9116a84.png", "../../product.hstatic.net/200000516791/product/product_8_2_07cde04eaf8e4327bfb1eb7cddddfb70_13f04fa003f240f0b45a5ce31b8ce714.png", "https://product.hstatic.net/200000516791/product/product_8_4_977f39fa503d4f0fa8581217cbd7af83_a1e24905010348239ec254e30a97b887.png"],
                                            "options": ["Tiêu đề"],
                                            "price": 985000000.0,
                                            "price_max": 985000000.0,
                                            "price_min": 985000000.0,
                                            "price_varies": false,
                                            "tags": [],
                                            "template_suffix": null,
                                            "title": "Smart Tivi LG 43 inch 43LM6360PTB",
                                            "type": "Khác",
                                            "url": "/products/smart-tivi-lg-43-inch-43lm6360ptb",
                                            "pagetitle": "Smart Tivi LG 43 inch 43LM6360PTB",
                                            "metadescription": "Đặc điểm nổi bậtTận hưởng giải trí với Smart Tivi màn hình kích thước 43\"Phân giải hình ảnh chất lượng chuẩn Full HD (1920 x 1080)Công nghệ Dolby Audio hiện đại giúp lan tỏa âm thanh DTS Virtual:X tiên tiến giả lập âm thanh vòm sống độngTrang bị đa dạng cổng kết, hỗ trợ tối đa nhu cầu giải tríHỗ trợ kết nối Wifi chuẩn,",
                                            "variants": [{
                                                "id": 1086987995,
                                                "barcode": null,
                                                "available": true,
                                                "price": 985000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 996.0,
                                                "old_inventory_quantity": 996.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 1090000000.0,
                                                "inventory_management": "haravan",
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": null
                                            }],
                                            "vendor": "LG",
                                            "published_at": "2022-05-20T03:57:47.13Z",
                                            "created_at": "2022-05-20T03:57:48.419Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_4');
                                        var listProdRelated_1039990862_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990862_4.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990862_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990862_4.id)
                                        $.each(listProdRelated_1039990862_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/smart-tivi-lg-43-inch-43lm6360ptb"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                                <div class="product-loop" data-id="1086987213">
                                    <div class="product-inner" data-proid="1039990503" id="listProdRelated_loop_5">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990503">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/dfdf_206bdd7e839c48fc8e21376a601bf80f_e1fe740d85234f19a7bb444acf2fe9d8_medium.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/dfdf_206bdd7e839c48fc8e21376a601bf80f_e1fe740d85234f19a7bb444acf2fe9d8_large.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/dfdf_206bdd7e839c48fc8e21376a601bf80f_e1fe740d85234f19a7bb444acf2fe9d8_small.jpg"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi LG 43 inch 4K UHD 43UJ632T "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/printed-chiffon-dress_40c3dd1808374bb1a1ed15cb0961b258_8c0f691499e04f6ea1b65ea6a896d27a_medium.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/printed-chiffon-dress_40c3dd1808374bb1a1ed15cb0961b258_8c0f691499e04f6ea1b65ea6a896d27a_large.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/printed-chiffon-dress_40c3dd1808374bb1a1ed15cb0961b258_8c0f691499e04f6ea1b65ea6a896d27a_small.jpg"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi LG 43 inch 4K UHD 43UJ632T "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/smart-tivi-lg-43-inch-4k-uhd-43uj632t"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="smart-tivi-lg-43-inch-4k-uhd-43uj632t.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/smart-tivi-lg-43-inch-4k-uhd-43uj632t"
                                               title="Smart Tivi LG 43 inch 4K UHD 43UJ632T"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendors3617.html?q=lg">LG</a>
                                                </p>
                                            </div>
                                            <h3><a href="smart-tivi-lg-43-inch-4k-uhd-43uj632t.html"
                                                   class="quickview-product"
                                                   data-handle="/products/smart-tivi-lg-43-inch-4k-uhd-43uj632t">Smart Tivi
                                                    LG 43 inch 4K UHD 43UJ632T</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price on-sale d-flex">
                                                <div class="price-box">
                                                    <span class="price">13,400,000₫</span>

                                                    <span class="price-del">14,450,000₫</span>
                                                </div>

                                                <span class="pro-sale">-7%</span>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987213"
                                                 data-handle="smart-tivi-lg-43-inch-4k-uhd-43uj632t">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987213')">
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
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987213')" title="Thêm vào giỏ">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                        </div>
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987213')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987213')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990503_5 = {
                                            "available": true,
                                            "compare_at_price_max": 1445000000.0,
                                            "compare_at_price_min": 1445000000.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 1445000000.0,
                                            "content": null,
                                            "description": "<h5>Màu sắc và độ tương phản đồng nhất từ mọi góc nhìn</h5><p><strong>Smart Tivi 43 inch 4K UHD 43UJ632T</strong><span>&nbsp;</span>với<span>&nbsp;</span>màn hình IPS<span>&nbsp;</span>4K mang đến màu sắc sống động và độ tương phản vô hạn, đảm bảo hình ảnh luôn đồng nhất tại mọi góc nhìn khác nhau.</p><p><br></p><h5>Tăng cường độ tương phản cho trải nghiệm xem HDR</h5><p>Công nghệ HDR Effect của LG sử dụng phương pháp xử lý hình ảnh độc đáo giúp chuyển đổi các nội dung bình thường thành “HDR giả lập”, bằng cách tăng cường độ tương phản để cho trải nghiệm xem giống như HDR.</p><p><br></p><h5>Đắm chìm trong âm thanh sống động</h5><p>Hãy cùng đắm chìm với công nghệ âm thanh vòm giả lập 7 kênh tiên tiến và mới nhất của LG giúp mang lại trải nghiệm thật sự ấn tượng.</p><p><br></p><h2>Thông số sản phẩm</h2><table class=\"table table-bordered mce-item-table\" id=\"tblGeneralAttribute\" style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 100%; min-width: 500px; max-width: 100%; margin-bottom: 20px; border: 1px solid #eeeeee; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px; background-color: #ffffff;\"><tbody style=\"box-sizing: border-box;\"><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Tính năng camera</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Đèn LED flash, tự động lấy nét, chạm lấy nét, nhận diện khuôn mặt, nụ cười, chống rung, ổn định hình ảnh quang học, Auto HDR, panorama</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Model</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Galaxy S7 G930</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Hệ điều hành</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Android 6.0 (Mashmallow)</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Kết nối</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">2G, 3G, 4G, WiFi, Bluetooth v4.0, GPRS/EDGE, NFC, Jack tai nghe 3.5mm</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Tốc độ CPU</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">4x A53@1.586GHz và 4x Exynos M1 @2.60GHz (1-2 core load)/2.29GHz (3-4 core load)</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Kích thước</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">142.4 x 69.6 x 7.9 mm</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Loại màn hình</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Super AMOLED</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Cảm ứng</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Multi-touch</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Độ phân giải màn hình</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">1440 x 2560 pixels</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">RAM</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">4GB</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/dfdf_206bdd7e839c48fc8e21376a601bf80f_e1fe740d85234f19a7bb444acf2fe9d8.jpg",
                                            "handle": "smart-tivi-lg-43-inch-4k-uhd-43uj632t",
                                            "id": 1039990503,
                                            "images": ["https://product.hstatic.net/200000516791/product/dfdf_206bdd7e839c48fc8e21376a601bf80f_e1fe740d85234f19a7bb444acf2fe9d8.jpg", "../../product.hstatic.net/200000516791/product/printed-chiffon-dress_40c3dd1808374bb1a1ed15cb0961b258_8c0f691499e04f6ea1b65ea6a896d27a.jpg", "../../product.hstatic.net/200000516791/product/904a_faf309898c084eb4ba73641fe746fd6e_ccf151fa297f4386b7a9ee89336271d6_f6b6eee257cc422b8b8f8702b370df88.jpg", "../../product.hstatic.net/200000516791/product/e6d5_89d2a37122db4c7382fad30f56055482_fe1103d8f5684b2caa603d78a578a2b7_efdf71cc621d4f4da8cc4d4098d3a9f1.jpg", "../../product.hstatic.net/200000516791/product/-day_8bde7f6301ce41b4a3129da6dd8d9c77_724f7874d90c4abc9b3ea5dc4fde7083_dff81a5d67ae44c8aff53b11442391aa.jpg", "https://product.hstatic.net/200000516791/product/b5ac_8f05b0e04e4a4d3aab3a55d243ac756d_f0186ba012694c07b5ae2b851a3e474e_6a73346069c3409fbcbbf4f139411d46.jpg"],
                                            "options": ["Tiêu đề"],
                                            "price": 1340000000.0,
                                            "price_max": 1340000000.0,
                                            "price_min": 1340000000.0,
                                            "price_varies": false,
                                            "tags": [],
                                            "template_suffix": null,
                                            "title": "Smart Tivi LG 43 inch 4K UHD 43UJ632T",
                                            "type": "Khác",
                                            "url": "/products/smart-tivi-lg-43-inch-4k-uhd-43uj632t",
                                            "pagetitle": "Smart Tivi LG 43 inch 4K UHD 43UJ632T",
                                            "metadescription": "Màu sắc và độ tương phản đồng nhất từ mọi góc nhìnSmart Tivi 43 inch 4K UHD 43UJ632T với màn hình IPS 4K mang đến màu sắc sống động và độ tương phản vô hạn, đảm bảo hình ảnh luôn đồng nhất tại mọi góc nhìn khác nhau.Tăng cường độ tương phản cho trải nghiệm xem HDRCông nghệ HDR Effect của LG sử dụng phương pháp xử lý hì",
                                            "variants": [{
                                                "id": 1086987213,
                                                "barcode": null,
                                                "available": true,
                                                "price": 1340000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 986.0,
                                                "old_inventory_quantity": 986.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 1445000000.0,
                                                "inventory_management": "haravan",
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": null
                                            }],
                                            "vendor": "LG",
                                            "published_at": "2022-05-20T03:41:38.541Z",
                                            "created_at": "2022-05-20T03:41:40.164Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_5');
                                        var listProdRelated_1039990503_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990503_5.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990503_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990503_5.id)
                                        $.each(listProdRelated_1039990503_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/smart-tivi-lg-43-inch-4k-uhd-43uj632t"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                                <div class="product-loop" data-id="1086987996">
                                    <div class="product-inner" data-proid="1039990863" id="listProdRelated_loop_6">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990863">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_24_1_03157cef2f34403faec8ebe605f52653_11ad40e2409a4214b158fedfa7fdea27_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_24_1_03157cef2f34403faec8ebe605f52653_11ad40e2409a4214b158fedfa7fdea27_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_24_1_03157cef2f34403faec8ebe605f52653_11ad40e2409a4214b158fedfa7fdea27_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi NanoCell LG 4K 50 inch 50NANO77TPA "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_24_2_5a46ad80f7bb4e5eb5cab367a40e4335_eba2543624f14dceb7d69ceebfc51e5a_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_24_2_5a46ad80f7bb4e5eb5cab367a40e4335_eba2543624f14dceb7d69ceebfc51e5a_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_24_2_5a46ad80f7bb4e5eb5cab367a40e4335_eba2543624f14dceb7d69ceebfc51e5a_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi NanoCell LG 4K 50 inch 50NANO77TPA "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa"
                                               title="Smart Tivi NanoCell LG 4K 50 inch 50NANO77TPA"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendors3617.html?q=lg">LG</a>
                                                </p>
                                            </div>
                                            <h3><a href="smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa.html"
                                                   class="quickview-product"
                                                   data-handle="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa">Smart
                                                    Tivi NanoCell LG 4K 50 inch 50NANO77TPA</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price on-sale d-flex">
                                                <div class="price-box">
                                                    <span class="price">16,550,000₫</span>

                                                    <span class="price-del">16,990,000₫</span>
                                                </div>

                                                <span class="pro-sale">-3%</span>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987996"
                                                 data-handle="smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987996')">
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
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987996')" title="Thêm vào giỏ">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                        </div>
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987996')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987996')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990863_6 = {
                                            "available": true,
                                            "compare_at_price_max": 1699000000.0,
                                            "compare_at_price_min": 1699000000.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 1699000000.0,
                                            "content": null,
                                            "description": "<p><strong>Đặc điểm nổi bật</strong></p><ul><li><p>Kích thước 43'' thích hợp với phòng khách khoảng 15-20m2</p></li><li><p>Công Nghệ Crystal Display giúp tối ưu màu sắc hiển thị</p></li><li><p><a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.nguyenkim.com/do-phan-giai-man-hinh-hd-fhd-4k-co-y-nghia-nhu-the-nao.html\">Độ phân giải 4K</a>&nbsp;hiển thị hình ảnh sắc nét đến từng chi tiết</p></li><li><p>Bộ xử lý Crystal 4K nâng cao chất lượng hình ảnh hiển thị</p></li><li><p><a href=\"https://www.nguyenkim.com/nhung-cong-nghe-ban-can-biet-truoc-khi-chon-mua-tivi.html\">Công nghệ HDR</a>&nbsp;tiên tiến giúp cải thiện độ sáng vượt trội</p></li><li><p>Trải nghiệm game mượt mà với tính năng Game Enhance</p></li><li><p>Remote Access phát không dây nội dung từ máy tính lên TV</p></li></ul><div> </div><h2>Thông số sản phẩm</h2><table id=\"tblGeneralAttribute\" border=\"1\" cellspacing=\"0\" style=\"background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:100%\" class=\"mce-item-table table table-bordered\"><tbody style=\"box-sizing: border-box;\"><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Model</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td><table><tbody><tr><td>50NANO77TPA</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Nhà sản xuất</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">LG</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Xuất xứ</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Việt Nam</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Năm ra mắt</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">2021</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Thời gian bảo hành</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">24 tháng</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Loại Tivi</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Tivi NanoCell</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Kích thước màn hình</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">50 inch</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Độ phân giải</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">3840 x 2160 Pixels</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Công nghệ xử lí hình ảnh</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Quad Core Processor 4K</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/product_24_1_03157cef2f34403faec8ebe605f52653_11ad40e2409a4214b158fedfa7fdea27.png",
                                            "handle": "smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa",
                                            "id": 1039990863,
                                            "images": ["https://product.hstatic.net/200000516791/product/product_24_1_03157cef2f34403faec8ebe605f52653_11ad40e2409a4214b158fedfa7fdea27.png", "../../product.hstatic.net/200000516791/product/product_24_2_5a46ad80f7bb4e5eb5cab367a40e4335_eba2543624f14dceb7d69ceebfc51e5a.png", "https://product.hstatic.net/200000516791/product/product_27_3_35d9ed8f55bd45b7b1d0df6ee6e8eff7_645f75c9b57c4c699f0b7649721fd115.png"],
                                            "options": ["Tiêu đề"],
                                            "price": 1655000000.0,
                                            "price_max": 1655000000.0,
                                            "price_min": 1655000000.0,
                                            "price_varies": false,
                                            "tags": [],
                                            "template_suffix": null,
                                            "title": "Smart Tivi NanoCell LG 4K 50 inch 50NANO77TPA",
                                            "type": "Khác",
                                            "url": "/products/smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa",
                                            "pagetitle": "Smart Tivi NanoCell LG 4K 50 inch 50NANO77TPA",
                                            "metadescription": "Đặc điểm nổi bậtKích thước 43'' thích hợp với phòng khách khoảng 15-20m2Công Nghệ Crystal Display giúp tối ưu màu sắc hiển thịĐộ phân giải 4K hiển thị hình ảnh sắc nét đến từng chi tiếtBộ xử lý Crystal 4K nâng cao chất lượng hình ảnh hiển thịCông nghệ HDR tiên tiến giúp cải thiện độ sáng vượt trộiTrải nghiệm game mượt",
                                            "variants": [{
                                                "id": 1086987996,
                                                "barcode": null,
                                                "available": true,
                                                "price": 1655000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 99.0,
                                                "old_inventory_quantity": 99.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 1699000000.0,
                                                "inventory_management": "haravan",
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": null
                                            }],
                                            "vendor": "LG",
                                            "published_at": "2022-05-20T03:57:50.799Z",
                                            "created_at": "2022-05-20T03:57:51.874Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_6');
                                        var listProdRelated_1039990863_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990863_6.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990863_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990863_6.id)
                                        $.each(listProdRelated_1039990863_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano77tpa"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                                <div class="product-loop" data-id="1086987997">
                                    <div class="product-inner" data-proid="1039990864" id="listProdRelated_loop_7">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990864">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_28_1_5043e2df20164cd1a4dbca5bb832937f_178c708a80114db18ee385c6f26fa0eb_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_28_1_5043e2df20164cd1a4dbca5bb832937f_178c708a80114db18ee385c6f26fa0eb_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_28_1_5043e2df20164cd1a4dbca5bb832937f_178c708a80114db18ee385c6f26fa0eb_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi NanoCell LG 4K 50 inch 50NANO86TPA "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_23_2_4935dd9b12f34816a287d5453a9be876_1375950e93174ff09f60f8169ce733da_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_23_2_4935dd9b12f34816a287d5453a9be876_1375950e93174ff09f60f8169ce733da_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_23_2_4935dd9b12f34816a287d5453a9be876_1375950e93174ff09f60f8169ce733da_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi NanoCell LG 4K 50 inch 50NANO86TPA "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa"
                                               title="Smart Tivi NanoCell LG 4K 50 inch 50NANO86TPA"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendors3617.html?q=lg">LG</a>
                                                </p>
                                            </div>
                                            <h3><a href="smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa.html"
                                                   class="quickview-product"
                                                   data-handle="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa">Smart
                                                    Tivi NanoCell LG 4K 50 inch 50NANO86TPA</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price on-sale d-flex">
                                                <div class="price-box">
                                                    <span class="price">20,850,000₫</span>

                                                    <span class="price-del">24,900,000₫</span>
                                                </div>

                                                <span class="pro-sale">-16%</span>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987997"
                                                 data-handle="smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987997')">
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
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987997')" title="Thêm vào giỏ">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                        </div>
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987997')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987997')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990864_7 = {
                                            "available": true,
                                            "compare_at_price_max": 2490000000.0,
                                            "compare_at_price_min": 2490000000.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 2490000000.0,
                                            "content": null,
                                            "description": "<p><strong>Đặc điểm nổi bật</strong></p><ul><li><p>Tivi NanoCell LG 4K (3840 x 2160) hiển thị hình ảnh sắc nét, chi tiết</p></li><li><p>Công nghệ NanoCell giúp hình ảnh có màu sắc thuần khiết và tinh tế hơn</p></li><li><p>Bộ xử lý&nbsp;α7 Gen4 Processor 4K phân tích và tối ưu hóa nội dung hiển thị</p></li><li><p>FILMMAKER MODE™&nbsp;truyền tải phim chân thực như dưới góc nhìn đạo diễn</p></li><li><p>Công nghệ Dolby Atmos mang đến không gian âm thanh vòm sống động</p></li><li><p>Công nghệ AI Sound&nbsp;tinh chỉnh âm thanh dựa trên thể loại nội dung đang xem</p></li><li><p>Tivi LG hỗ trợ tìm kiếm bằng giọng nói giúp tìm kiếm nội dung tiện lợi hơn</p></li></ul><div> </div><h2>Thông số sản phẩm</h2><table id=\"tblGeneralAttribute\" border=\"1\" cellspacing=\"0\" style=\"background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:100%\" class=\"mce-item-table table table-bordered\"><tbody style=\"box-sizing: border-box;\"><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Model</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td><table><tbody><tr><td>50NANO86TPA</td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Nhà sản xuất</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">LG</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Xuất xứ</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Indonesia</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Năm ra mắt</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">2021</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Thời gian bảo hành</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">24 tháng</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Loại Tivi</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Tivi NanoCell</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Kích thước màn hình</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">50 inch</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Độ phân giải</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">4K (3840 x 2160) Pixels</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Công nghệ xử lí hình ảnh</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">X1 4K Processor, Direct LED Frame Dimming, HLG, Motionflow XR 200, HDR10, Auto Mode, 4K X-Reality PRO</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/product_28_1_5043e2df20164cd1a4dbca5bb832937f_178c708a80114db18ee385c6f26fa0eb.png",
                                            "handle": "smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa",
                                            "id": 1039990864,
                                            "images": ["https://product.hstatic.net/200000516791/product/product_28_1_5043e2df20164cd1a4dbca5bb832937f_178c708a80114db18ee385c6f26fa0eb.png", "../../product.hstatic.net/200000516791/product/product_23_2_4935dd9b12f34816a287d5453a9be876_1375950e93174ff09f60f8169ce733da.png", "../../product.hstatic.net/200000516791/product/product_23_3_e6936a60b48144ceaad1f53a59872d4a_3f238840af0347e7878d2cecef17a53d.png", "https://product.hstatic.net/200000516791/product/product_27_3_b64ab2ee0acc4c248b7d6c177663bc12_6dff7c9a80db4d77854643f9eafe18d6.png"],
                                            "options": ["Tiêu đề"],
                                            "price": 2085000000.0,
                                            "price_max": 2085000000.0,
                                            "price_min": 2085000000.0,
                                            "price_varies": false,
                                            "tags": [],
                                            "template_suffix": null,
                                            "title": "Smart Tivi NanoCell LG 4K 50 inch 50NANO86TPA",
                                            "type": "Khác",
                                            "url": "/products/smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa",
                                            "pagetitle": "Smart Tivi NanoCell LG 4K 50 inch 50NANO86TPA",
                                            "metadescription": "Đặc điểm nổi bậtTivi NanoCell LG 4K (3840 x 2160) hiển thị hình ảnh sắc nét, chi tiếtCông nghệ NanoCell giúp hình ảnh có màu sắc thuần khiết và tinh tế hơnBộ xử lý α7 Gen4 Processor 4K phân tích và tối ưu hóa nội dung hiển thịFILMMAKER MODE™ truyền tải phim chân thực như dưới góc nhìn đạo diễnCông nghệ Dolby Atmos mang",
                                            "variants": [{
                                                "id": 1086987997,
                                                "barcode": null,
                                                "available": true,
                                                "price": 2085000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 90.0,
                                                "old_inventory_quantity": 90.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 2490000000.0,
                                                "inventory_management": "haravan",
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": null
                                            }],
                                            "vendor": "LG",
                                            "published_at": "2022-05-20T03:57:52.1Z",
                                            "created_at": "2022-05-20T03:57:53.721Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_7');
                                        var listProdRelated_1039990864_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990864_7.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990864_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990864_7.id)
                                        $.each(listProdRelated_1039990864_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/smart-tivi-nanocell-lg-4k-50-inch-50nano86tpa"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                                <div class="product-loop" data-id="1086987998">
                                    <div class="product-inner" data-proid="1039990865" id="listProdRelated_loop_8">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990865">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_25_1_f14b5f9dc0be4424af13f69bb29b1cf3_30d90e3756824b4da12f6a6fef6ade33_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_25_1_f14b5f9dc0be4424af13f69bb29b1cf3_30d90e3756824b4da12f6a6fef6ade33_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_25_1_f14b5f9dc0be4424af13f69bb29b1cf3_30d90e3756824b4da12f6a6fef6ade33_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi NanoCell LG 4K 65 inch 65NANO77TPA "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_24_2_299ea68c12704419963f784b57e309c6_9db77687ca2c4e32bf8a92c219187a57_medium.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/product_24_2_299ea68c12704419963f784b57e309c6_9db77687ca2c4e32bf8a92c219187a57_large.png"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/product_24_2_299ea68c12704419963f784b57e309c6_9db77687ca2c4e32bf8a92c219187a57_small.png"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi NanoCell LG 4K 65 inch 65NANO77TPA "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa"
                                               title="Smart Tivi NanoCell LG 4K 65 inch 65NANO77TPA"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendors3617.html?q=lg">LG</a>
                                                </p>
                                            </div>
                                            <h3><a href="smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa.html"
                                                   class="quickview-product"
                                                   data-handle="/products/smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa">Smart
                                                    Tivi NanoCell LG 4K 65 inch 65NANO77TPA</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price  d-flex">
                                                <div class="price-box">
                                                    <span class="price">26,350,000₫</span>
                                                </div>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987998"
                                                 data-handle="smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987998')">
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
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987998')" title="Thêm vào giỏ">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                        </div>
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987998')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987998')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990865_8 = {
                                            "available": true,
                                            "compare_at_price_max": 0.0,
                                            "compare_at_price_min": 0.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 0.0,
                                            "content": null,
                                            "description": "<p><strong>Đặc điểm nổi bật</strong></p><ul><li><p>Kích thước 43'' thích hợp với phòng khách khoảng 15-20m2</p></li><li><p>Công Nghệ Crystal Display giúp tối ưu màu sắc hiển thị</p></li><li><p><a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://www.nguyenkim.com/do-phan-giai-man-hinh-hd-fhd-4k-co-y-nghia-nhu-the-nao.html\">Độ phân giải 4K</a>&nbsp;hiển thị hình ảnh sắc nét đến từng chi tiết</p></li><li><p>Bộ xử lý Crystal 4K nâng cao chất lượng hình ảnh hiển thị</p></li><li><p><a href=\"https://www.nguyenkim.com/nhung-cong-nghe-ban-can-biet-truoc-khi-chon-mua-tivi.html\">Công nghệ HDR</a>&nbsp;tiên tiến giúp cải thiện độ sáng vượt trội</p></li><li><p>Trải nghiệm game mượt mà với tính năng Game Enhance</p></li><li><p>Remote Access phát không dây nội dung từ máy tính lên TV</p></li></ul><div>&nbsp;</div><h2>Thông số sản phẩm</h2><table id=\"tblGeneralAttribute\" border=\"1\" cellspacing=\"0\" style=\"background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:1px solid #eeeeee; box-sizing:border-box; color:#333333; font-family:Roboto,sans-serif; font-size:13px; line-height:20px; margin-bottom:20px; max-width:100%; min-width:500px; width:100%\" class=\"mce-item-table table table-bordered\"><tbody style=\"box-sizing: border-box;\"><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Model</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\"><table><tbody><tr><td>65NANO77TPA</td></tr></tbody></table></td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Nhà sản xuất</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">LG</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\"><table><tbody><tr><td>Xuất xứ</td></tr></tbody></table></td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Việt Nam</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Năm ra mắt</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">2021</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Thời gian bảo hành</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">24 tháng</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Loại Tivi</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">Android Tivi</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Kích thước màn hình</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">65 inch</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Độ phân giải</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">4K (3840 x 2160) Pixels</td></tr><tr style=\"box-sizing:border-box\" class=\"row-info\"><td style=\"background-color:#f7f7f7 !important; border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:22.7596%\">Công nghệ xử lí hình ảnh</td><td style=\"border-color:#eeeeee; border-style:solid; border-width:1px; box-sizing:border-box; padding:8px; vertical-align:top; width:77.0982%\">X1 4K Processor, Direct LED Frame Dimming, HLG, Motionflow XR 200, HDR10, Auto Mode, 4K X-Reality PRO</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/product_25_1_f14b5f9dc0be4424af13f69bb29b1cf3_30d90e3756824b4da12f6a6fef6ade33.png",
                                            "handle": "smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa",
                                            "id": 1039990865,
                                            "images": ["https://product.hstatic.net/200000516791/product/product_25_1_f14b5f9dc0be4424af13f69bb29b1cf3_30d90e3756824b4da12f6a6fef6ade33.png", "../../product.hstatic.net/200000516791/product/product_24_2_299ea68c12704419963f784b57e309c6_9db77687ca2c4e32bf8a92c219187a57.png", "../../product.hstatic.net/200000516791/product/product_27_3_3c0079b3b4404593a28951562912a52a_431197f3948c4d8394105690aa356a2e.png", "https://product.hstatic.net/200000516791/product/product_28_2_322ad9d588674754a13d628186018735_7621b438cd134b78b4ffa3857e4783f6.png"],
                                            "options": ["Tiêu đề"],
                                            "price": 2635000000.0,
                                            "price_max": 2635000000.0,
                                            "price_min": 2635000000.0,
                                            "price_varies": false,
                                            "tags": ["summer_02"],
                                            "template_suffix": null,
                                            "title": "Smart Tivi NanoCell LG 4K 65 inch 65NANO77TPA",
                                            "type": "Khác",
                                            "url": "/products/smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa",
                                            "pagetitle": "Smart Tivi NanoCell LG 4K 65 inch 65NANO77TPA",
                                            "metadescription": "Đặc điểm nổi bậtKích thước 43'' thích hợp với phòng khách khoảng 15-20m2Công Nghệ Crystal Display giúp tối ưu màu sắc hiển thịĐộ phân giải 4K hiển thị hình ảnh sắc nét đến từng chi tiếtBộ xử lý Crystal 4K nâng cao chất lượng hình ảnh hiển thịCông nghệ HDR tiên tiến giúp cải thiện độ sáng vượt trộiTrải nghiệm game mượt",
                                            "variants": [{
                                                "id": 1086987998,
                                                "barcode": null,
                                                "available": true,
                                                "price": 2635000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 99.0,
                                                "old_inventory_quantity": 99.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 0.0,
                                                "inventory_management": "haravan",
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": null
                                            }],
                                            "vendor": "LG",
                                            "published_at": "2022-05-20T03:57:53.884Z",
                                            "created_at": "2022-05-20T03:57:55.577Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_8');
                                        var listProdRelated_1039990865_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990865_8.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990865_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990865_8.id)
                                        $.each(listProdRelated_1039990865_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/smart-tivi-nanocell-lg-4k-65-inch-65nano77tpa"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                                <div class="product-loop" data-id="1086987212">
                                    <div class="product-inner" data-proid="1039990502" id="listProdRelated_loop_9">
                                        <div class="proloop-image">


                                            <div class="gift product_gift_label d-none" data-id="1039990502">
                                                <img class="lazyload"
                                                     data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     src="../../file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                     alt="icon quà tặng">
                                            </div>

                                            <div class="product--image">

                                                <div class="lazy-img first-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/_8951ad29-fafc-4310-b615-ae133ce1e6d5_e1ce7977ac4649178e77117b95a20fdb_8c58f9643b904f7cbba462a669141a03_medium.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width: 481px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/_8951ad29-fafc-4310-b615-ae133ce1e6d5_e1ce7977ac4649178e77117b95a20fdb_8c58f9643b904f7cbba462a669141a03_large.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/_8951ad29-fafc-4310-b615-ae133ce1e6d5_e1ce7977ac4649178e77117b95a20fdb_8c58f9643b904f7cbba462a669141a03_small.jpg"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi Samsung 40 inch HD 40AS320 "/>
                                                    </picture>
                                                </div>
                                                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                    <picture>
                                                        <source media="(min-width: 481px) and (max-width:767px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/mug-today-is-a-good-day_ed88999bcaae4b9fa7aa9ec168573f1f_a497e83b9ee240ce8a0de7972bf3baa0_medium.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <source media="(min-width:768px)"
                                                                data-srcset="//product.hstatic.net/200000516791/product/mug-today-is-a-good-day_ed88999bcaae4b9fa7aa9ec168573f1f_a497e83b9ee240ce8a0de7972bf3baa0_large.jpg"
                                                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                        <img class="lazyload img-loop "
                                                             data-src="//product.hstatic.net/200000516791/product/mug-today-is-a-good-day_ed88999bcaae4b9fa7aa9ec168573f1f_a497e83b9ee240ce8a0de7972bf3baa0_small.jpg"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt=" Smart Tivi Samsung 40 inch HD 40AS320 "/>
                                                    </picture>
                                                </div>

                                            </div>
                                            <div class="qv-product">
				<span class="icon-quickview" data-handle="/products/smart-tivi-asanzo-40-inch-hd-40as320"
                      title="Xem nhanh">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                                            </div>
                                            <a href="smart-tivi-asanzo-40-inch-hd-40as320.html"
                                               class="proloop-link quickview-product"
                                               data-handle="/products/smart-tivi-asanzo-40-inch-hd-40as320"
                                               title="Smart Tivi Samsung 40 inch HD 40AS320"></a>
                                        </div>
                                        <div class="proloop-detail">
                                            <div class="proloop--top">
                                                <p class="proloop--vendor"><a title="Show vendor"
                                                                              href="../collections/vendorsab8f.html?q=samsung">Samsung</a>
                                                </p>
                                            </div>
                                            <h3><a href="smart-tivi-asanzo-40-inch-hd-40as320.html"
                                                   class="quickview-product"
                                                   data-handle="/products/smart-tivi-asanzo-40-inch-hd-40as320">Smart Tivi
                                                    Samsung 40 inch HD 40AS320</a></h3>
                                            <div class="proloop--variant">

                                            </div>

                                            <div class="proloop--price  d-flex">
                                                <div class="price-box">
                                                    <span class="price">8,900,000₫</span>
                                                </div>

                                            </div>
                                            <div class="proloop-actions" data-vrid="1086987212"
                                                 data-handle="smart-tivi-asanzo-40-inch-hd-40as320">
                                                <div class="proloop-actions__inner">
                                                    <div class="actions-primary">
                                                        <button type="submit" class="btn-proloop-cart add-to-cart  "
                                                                onclick="HRT.All.addCartProdItem('1086987212')">
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
							<span class="btnico" onclick="HRT.All.addCartProdItem('1086987212')" title="Thêm vào giỏ">
								<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
									<g transform="translate(0 512) scale(.1 -.1)">
										<path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
										<path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
									</g>
								</svg>
							</span>
                                                        </div>
                                                        <div class="actions-wrapqty d-flex">
                                                            <button class="qty-btn proloop-minus"
                                                                    onclick="HRT.All.minusQtyProdItem('1086987212')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                                </svg>
                                                            </button>
                                                            <input class="proloop-value" type="text" readonly=""
                                                                   name="proloop-quantity" value="">
                                                            <button class="qty-btn proloop-plus"
                                                                    onclick="HRT.All.plusQtyProdItem('1086987212')">
                                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var listProdRelated_1039990502_9 = {
                                            "available": true,
                                            "compare_at_price_max": 0.0,
                                            "compare_at_price_min": 0.0,
                                            "compare_at_price_varies": false,
                                            "compare_at_price": 0.0,
                                            "content": null,
                                            "description": "<h5>Thiết kế sang trọng – hiện đại</h5><p><strong>Smart Tivi&nbsp; 40 inch HD 40AS320</strong><span>&nbsp;</span>sở hữu thiết kế hiện đại với màn hình LED siêu tiết kiệm điện, Smart Tivi Asanzo 40 inch HD 40AS320 sẽ đem đến sự sang trọng cho phòng khách nhà bạn. Thiết kế viền mỏng lịch lãm và sang trọng thể hiện nét lịch lãm và khỏe khoắn qua các thiết kế góc cạnh. Mặt trước đơn giản, điểm nhấn bởi đường viền nhựa trong suốt ở cạnh dưới khá bắt mắt. Chân đế lớn, được thiết kế với những cạnh vát tinh tế mang lại vẻ sang trọng cho dòng sản phẩm.</p><h5>Công nghệ đèn nền LED tiên tiến</h5><p>Màn hình LED lên đến 40 inch độ phân giải HD, sử dụng công nghệ đèn nền LED tiên tiến, cung cấp độ sáng cao, hình ảnh sống động và rõ nét mà vẫn đảm bảo khả năng tiết kiệm điện năng tối ưu. Người dùng có thể xem phim độ phân giải cao HD rõ nét và không bị hiện tượng mờ nhoè, bóng ma như những dòng Tivi thông thường.</p><h5>Kết nối thông minh</h5><p>Kết nối tiện lợi cho hệ thống nghe nhìn của bạn nhờ có một hệ thống phương tiện truyền thông mạnh mẽ giúp người dùng dễ dàng phối ghép với các thiết bị số trong nhà qua các cổng kết nối HDMI, VGA. Kết nối USB cũng được Asanzo trang bị cho phép người dùng xem phim, nghe nhạc qua thẻ nhớ USB, mang lại trải nghiệm thú vị không kém so với các dòng TV khác trên thị trường hiện nay.</p><h5>Tivi đã tích hợp ứng dụng Karaoke Offline</h5><p>Với 1 USB rời khoảng 12000 bài hát bạn có thể hát karaoke thả ga mà không cần mạng Internet.</p><p><br></p><h2>Thông số sản phẩm</h2><table class=\"table table-bordered mce-item-table\" id=\"tblGeneralAttribute\" style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 100%; min-width: 500px; max-width: 100%; margin-bottom: 20px; border: 1px solid #eeeeee; color: #333333; font-family: Roboto, sans-serif; font-size: 13px; line-height: 20px; background-color: #ffffff;\"><tbody style=\"box-sizing: border-box;\"><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Tính năng camera</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Đèn LED flash, tự động lấy nét, chạm lấy nét, nhận diện khuôn mặt, nụ cười, chống rung, ổn định hình ảnh quang học, Auto HDR, panorama</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Model</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Galaxy S7 G930</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Hệ điều hành</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Android 6.0 (Mashmallow)</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Kết nối</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">2G, 3G, 4G, WiFi, Bluetooth v4.0, GPRS/EDGE, NFC, Jack tai nghe 3.5mm</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Tốc độ CPU</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">4x A53@1.586GHz và 4x Exynos M1 @2.60GHz (1-2 core load)/2.29GHz (3-4 core load)</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Kích thước</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">142.4 x 69.6 x 7.9 mm</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Loại màn hình</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Super AMOLED</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Cảm ứng</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">Multi-touch</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">Độ phân giải màn hình</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">1440 x 2560 pixels</td></tr><tr class=\"row-info\" style=\"box-sizing: border-box;\"><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 22.7596%; background-color: #f7f7f7 !important;\"><span style=\"box-sizing: border-box; font-family: Roboto-Medium, sans-serif;\">RAM</span></td><td style=\"box-sizing: border-box; padding: 8px; vertical-align: top; border: 1px solid #eeeeee; width: 77.0982%;\">4GB</td></tr></tbody></table>",
                                            "featured_image": "https://product.hstatic.net/200000516791/product/_8951ad29-fafc-4310-b615-ae133ce1e6d5_e1ce7977ac4649178e77117b95a20fdb_8c58f9643b904f7cbba462a669141a03.jpg",
                                            "handle": "smart-tivi-asanzo-40-inch-hd-40as320",
                                            "id": 1039990502,
                                            "images": ["https://product.hstatic.net/200000516791/product/_8951ad29-fafc-4310-b615-ae133ce1e6d5_e1ce7977ac4649178e77117b95a20fdb_8c58f9643b904f7cbba462a669141a03.jpg", "../../product.hstatic.net/200000516791/product/mug-today-is-a-good-day_ed88999bcaae4b9fa7aa9ec168573f1f_a497e83b9ee240ce8a0de7972bf3baa0.jpg", "../../product.hstatic.net/200000516791/product/_26d411fb-fc77-4725-a0d3-5864342cb5ac_80c815d32fde4117bda6ed0d8656888d_db3465eb6a074e96b595d0b4f89e60a5.jpg", "https://product.hstatic.net/200000516791/product/_58df399e-061c-438a-b22d-8d514ca1904a_60e575150d7c49cea119e26eedf027c8_d369d1e6c0734d909ce5f4975ae69392.jpg"],
                                            "options": ["Tiêu đề"],
                                            "price": 890000000.0,
                                            "price_max": 890000000.0,
                                            "price_min": 890000000.0,
                                            "price_varies": false,
                                            "tags": ["contact"],
                                            "template_suffix": null,
                                            "title": "Smart Tivi Samsung 40 inch HD 40AS320",
                                            "type": "Khác",
                                            "url": "/products/smart-tivi-asanzo-40-inch-hd-40as320",
                                            "pagetitle": "Smart Tivi Asanzo 40 inch HD 40AS320",
                                            "metadescription": "Thiết kế sang trọng – hiện đạiSmart Tivi Asanzo 40 inch HD 40AS320 sở hữu thiết kế hiện đại với màn hình LED siêu tiết kiệm điện, Smart Tivi Asanzo 40 inch HD 40AS320 sẽ đem đến sự sang trọng cho phòng khách nhà bạn. Thiết kế viền mỏng lịch lãm và sang trọng thể hiện nét lịch lãm và khỏe khoắn qua các thiết kế góc cạnh",
                                            "variants": [{
                                                "id": 1086987212,
                                                "barcode": null,
                                                "available": true,
                                                "price": 890000000.0,
                                                "sku": null,
                                                "option1": "Default Title",
                                                "option2": "",
                                                "option3": "",
                                                "options": ["Default Title"],
                                                "inventory_quantity": 1.0,
                                                "old_inventory_quantity": 1.0,
                                                "title": "Default Title",
                                                "weight": 0.0,
                                                "compare_at_price": 0.0,
                                                "inventory_management": null,
                                                "inventory_policy": "deny",
                                                "selected": false,
                                                "url": null,
                                                "featured_image": null
                                            }],
                                            "vendor": "Samsung",
                                            "published_at": "2022-05-20T03:41:37.482Z",
                                            "created_at": "2022-05-20T03:41:38.432Z",
                                            "not_allow_promotion": false
                                        };
                                        var domLoop = $('#listProdRelated_loop_9');
                                        var listProdRelated_1039990502_frame = [0, 0, 0, 0, 0];
                                        //Kiểm tra icon
                                        var frame_size = prmt_icon.frame.tag.length;
                                        //Sticker Frame
                                        for (var i = 0; i < frame_size; i++) {
                                            if (prmt_icon.frame.tag[i] != "null") {
                                                if (listProdRelated_1039990502_9.tags.includes(prmt_icon.frame.tag[i])) {
                                                    listProdRelated_1039990502_frame[i] = 1;
                                                }
                                            }
                                        }
                                        //console.log(listProdRelated_1039990502_9.id)
                                        $.each(listProdRelated_1039990502_frame, function (j, k) {
                                            if (k == 1) {
                                                domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="/products/smart-tivi-asanzo-40-inch-hd-40as320"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="khuyến mãi"/></a></div>');
                                                return false;
                                            }
                                        });
                                    </script>
                                </div>


                            </div>
                        </div>

                    </div>
                </section>

                <!-- viewed -->
                <div class="productDetail-recently-viewed">
                    <div class="container container-pd0">
                        <div class="productViewed-title text-center">
                            <h2>Sản phẩm đã xem</h2>

                        </div>
                        <div class="productViewed-content">
                            <div class="listProduct-viewed listProduct-row owlCarousel-dfex owl-carousel owlCarousel-style icon-arrow"
                                 id="listViewed"></div>
                        </div>
                    </div>
                </div>


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
                                    <button type="button" id="add-to-cartBottom"
                                            class=" add-to-cartProduct btnred button dark btn-addtocart addtocart-modal"
                                            name="add">
                                        Thêm vào giỏ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="productDetail-linkcopy"><input class="linkToCopy" readonly="readonly"
                                                           value="https://techgo.myharavan.com/products/android-tivi-sony-4k-43-inch-kd-43x75-vn3"
                                                           id="myInput"></div>
            </div>
            <script>
                function StickerAndPrice(obj, target) {
                    var domLoop = $(target);
                    var viewed_frame = [0, 0, 0, 0, 0];
                    //Kiểm tra icon
                    var viewed_frame_size = prmt_icon.frame.tag.length;
                    //Sticker Frame
                    for (var i = 0; i < viewed_frame_size; i++) {
                        if (prmt_icon.frame.tag[i] != "null") {
                            if (obj.tags.includes(prmt_icon.frame.tag[i])) {
                                viewed_frame[i] = 1;
                            }
                        }
                    }
                    $.each(viewed_frame, function (j, k) {
                        if (k == 1) {
                            domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="' + obj.url + '"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" /></a></div>');
                            return false;
                        }
                    });
                }

                $(document).ready(function () {
                    /*if(jQuery('.product-coutdown-jsdata .pro-coutdown').length > 0) {
			var time_deal = $('.product-coutdown-jsdata  #deal_day_1039990830').val(); 
			var array_time = time_deal.split('_');
			var endDate = array_time[1];
			$('.product-coutdown-jsdata .clock-day-1039990830').countdown(endDate)
				.on('update.countdown', function(event) {
				var $this = $(this).html(event.strftime(""
																								+ "<div class='section_cout'><span class='Days'><span> %D </span></span><span class='text'>ngày</span></div>"
																								+ "<div class='section_cout'><span class='Hours'><span> %H </span></span><span class='text'>giờ</span></div>"
																								+ "<div class='section_cout'><span class='Minutes'><span> %M </span></span><span class='text'>phút</span></div>"
																								+ "<div class='section_cout'><span class='Seconds'><span> %S </span></span><span class='text'>giây</span></div>"));
			})
				.on('finish.countdown', function(event) {
				$(this).html(""
										 + "<div class='section_cout'><span class='Days'><span> 00 </span></span><span class='text'>ngày</span></div>"
										 + "<div class='section_cout'><span class='Hours'><span> 00 </span></span><span class='text'>giờ</span></div>"
										 + "<div class='section_cout'><span class='Minutes'><span> 00 </span></span><span class='text'>phút</span></div>"
										 + "<div class='section_cout'><span class='Seconds'><span> 00 </span></span><span class='text'>giây</span></div>");
				$(this).parent().find('p').html('Hết thời gian ưu đãi:');
			});
		}*/
                    if (jQuery('.productDetail-recently-viewed').length > 0) {
                        var d = new Date();
                        var n = d.getTime();
                        var last_viewed_pro_date = localStorage.getItem('products_viewed_date');
                        if (last_viewed_pro_date < n) {
                            localStorage.setItem('products_viewed_date', n + (30 * 86400000));
                            localStorage.removeItem('products_viewed');
                        }
                        var product_handle = 'android-tivi-sony-4k-43-inch-kd-43x75-vn3';
                        var last_viewed_pro = localStorage.getItem('products_viewed');
                        var last_viewed_pro_new = "";
                        if (last_viewed_pro == null) {
                            last_viewed_pro_new = product_handle;
                        } else {
                            var list_array = last_viewed_pro.split('##');//[]
                            if (!list_array.includes(product_handle)) {
                                last_viewed_pro_new = product_handle + '##' + last_viewed_pro;
                            } else {
                                last_viewed_pro_new = list_array.join('##');
                            }
                        }

                        var last_viewd_pro_array = last_viewed_pro_new.split('##');
                        var handle_error;

                        var limitpro = last_viewd_pro_array.length;
                        if (last_viewd_pro_array.length > 8) limitpro = 8;
                        var recentview_promises = [];
                        var countValid = 0;
                        for (var i = 0; i < limitpro; i++) {
                            if (countValid >= 8) return false;
                            if (typeof last_viewd_pro_array[i] == 'string') {
                                countValid++;
                                var promise = new Promise(function (resolve, reject) {
                                    $.ajax({
                                        url: '/products/' + last_viewd_pro_array[i] + '?view=viewed',
                                        success: function (product) {
                                            product = product.trim();
                                            resolve(product, countValid);
                                        },
                                        error: function (err) {
                                            resolve('', countValid);
                                        }
                                    })
                                });
                                recentview_promises.push(promise);
                            }
                        }

                        Promise.all(recentview_promises).then(function (values, countValid) {
                            var viewed_items = [];
                            $.each(values, function (i, v) {
                                if (v != '') {
                                    v = v.replace('viewed-loop-', 'viewed-loop-' + (i + 1));
                                    $('#listViewed').append(v);
                                    viewed_items.push(viewed);
                                    countValid++;
                                } else {
                                    viewed_items.push(null);
                                }
                            });
                            $.each(viewed_items, function (i, v) {
                                if (v != null) {
                                    StickerAndPrice(v, '#viewed-loop-' + (i + 1));
                                }
                            });
                            HRT.Product.sliderProductRelated('#listViewed');
                        });

                        var filtered = last_viewd_pro_array.filter(function (el) {
                            return el != '';
                        });
                        localStorage.setItem('products_viewed', filtered.join('##'));
                    }
                });
                /* template */
                var pro_template = "style_01";
                var productImg_size = "5" + "1";
                $(document).ready(function () {
                    if (pro_template == "style_01" && productImg_size > 1) {
                        var slider = $('#productCarousel-slider');
                        var thumbnailSlider = $('#productCarousel-thumb');
                        var duration = 500;

                        slider.owlCarousel({
                            items: 1,
                            nav: true,
                            dots: true,
                            loop: false,
                            smartSpeed: 1000
                        })
                        slider.on('changed.owl.carousel', function (e) {
                            thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                            thumbnailSlider.find(".owl-item").removeClass("current");
                            thumbnailSlider.find('.owl-item:nth-child(' + (e.item.index + 1) + ')').addClass('current');
                        });
                        thumbnailSlider.on('initialized.owl.carousel', function () {
                            thumbnailSlider.find(".owl-item").eq(0).addClass("current");
                        })
                        thumbnailSlider.owlCarousel({
                            loop: false,
                            nav: false,
                            margin: 15,
                            center: false,
                            responsive: {
                                0: {
                                    items: 4,
                                },
                                768: {
                                    items: 5,
                                },
                                992: {
                                    items: 5,
                                },
                                1200: {
                                    items: 5,
                                }
                            }
                        })
                        thumbnailSlider.on('changed.owl.carousel', function (e) {
                            slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                            slider.find(".owl-item").removeClass("current");
                            slider.find('.owl-item:nth-child(' + (e.item.index + 1) + ')').addClass('current');
                        });
                        thumbnailSlider.on("click", ".owl-item", function (e) {
                            e.preventDefault();
                            thumbnailSlider.find(".owl-item").removeClass("current");
                            $(this).addClass("current");
                            var number = $(this).index();
                            slider.data('owl.carousel').to(number, duration, true);
                        });
                    } else if (pro_template == "style_02") {
                        $('body').scrollspy({
                            target: "#productScroll-spy",
                            offset: $('.productDetail-information').offset().top
                        });
                        $('#productScroll-spy a[href*="#"]').click(function (e) {
                            e.preventDefault();
                            $('#productScroll-spy .product-thumb').removeClass('active');
                            $('html, body').animate({
                                scrollTop: $($.attr(this, 'href')).offset().top + 20,
                            }, 500);
                        });
                        var sliderMobile = $('#productCarousel-slider-mobile');
                        sliderMobile.owlCarousel({
                            items: 1,
                            nav: true,
                            dots: true,
                            lazyLoad: true,
                            loop: false,
                            smartSpeed: 1000
                        })
                    } else if (pro_template == "style_03") {
                        if (productImg_size > 1) {
                            var slickSlider = $('#productSlick-slider');
                            var thumbnailSlider = $('#productSlick-thumb');
                            slickSlider.slick({
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: true,
                                fade: false,
                                infinite: false,
                                speed: 1000,
                                asNavFor: '#productSlick-thumb',
                                dots: false,
                                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"></button>',
                                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"></button>',
                            });
                            thumbnailSlider.slick({
                                slidesToShow: 6,
                                slidesToScroll: 6,
                                asNavFor: '#productSlick-slider',
                                dots: false,
                                arrows: false,
                                vertical: true,
                                verticalSwiping: true,
                                infinite: false,
                                focusOnSelect: true,
                                responsive: [
                                    {
                                        breakpoint: 1024,
                                        settings: {
                                            slidesToShow: 6,
                                            slidesToScroll: 6
                                        }
                                    },
                                    {
                                        breakpoint: 991,
                                        settings: {
                                            slidesToShow: 4,
                                            slidesToScroll: 4,
                                            vertical: false
                                        }
                                    }
                                ]
                            });
                            $(document).on('click', '#productSlick-thumb .product-thumb__item', function (e) {
                                e.preventDefault();
                                $('#productSlick-thumb .product-thumb').removeClass('slick-current');
                                $(this).parent().addClass('slick-current');
                            });

                        }
                    } else {
                        if (productImg_size > 1) {
                            var slider = $('#productCarousel-slider');
                            var thumbnailSlider = $('#productCarousel-thumb');
                            var duration = 500;

                            slider.owlCarousel({
                                items: 1,
                                nav: true,
                                dots: true,
                                loop: false,
                                smartSpeed: 1000
                            })
                            slider.on('changed.owl.carousel', function (e) {
                                thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                                thumbnailSlider.find(".owl-item").removeClass("current");
                                thumbnailSlider.find('.owl-item:nth-child(' + (e.item.index + 1) + ')').addClass('current');
                            });
                            thumbnailSlider.on('initialized.owl.carousel', function () {
                                thumbnailSlider.find(".owl-item").eq(0).addClass("current");
                            })
                            thumbnailSlider.owlCarousel({
                                loop: false,
                                nav: false,
                                margin: 15,
                                center: false,
                                responsive: {
                                    0: {
                                        items: 4,
                                    },
                                    768: {
                                        items: 5,
                                    },
                                    992: {
                                        items: 6,
                                    },
                                    1200: {
                                        items: 6,
                                    }
                                }
                            })
                            thumbnailSlider.on('changed.owl.carousel', function (e) {
                                slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                                slider.find(".owl-item").removeClass("current");
                                slider.find('.owl-item:nth-child(' + (e.item.index + 1) + ')').addClass('current');
                            });
                            thumbnailSlider.on("click", ".owl-item", function (e) {
                                e.preventDefault();
                                thumbnailSlider.find(".owl-item").removeClass("current");
                                $(this).addClass("current");
                                var number = $(this).index();
                                slider.data('owl.carousel').to(number, duration, true);
                            });
                        }
                    }
                    $('.product-gallery__item[data-fancybox="gallery"]').fancybox({
                        protect: true,
                        hash: false,
                        buttons: [
                            "slideShow",
                            'zoom',
                            "thumbs",
                            'close'
                        ],
                        animationEffect: "zoom",
                        infobar: false,
                    });
                });
            </script>

            <script>
                var swatch_size = parseInt($('#add-item-form .select-swatch .swatch').length);
                jQuery(document).on('click', '#add-item-form .swatch input', function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    var _available = '';
                    $this.parent().siblings().find('label').removeClass('sd');
                    $this.next().addClass('sd');
                    var name = $this.attr('name');
                    var value = $this.val();
                    $('#add-item-form select[data-option=' + name + ']').val(value).trigger('change');
                    if (swatch_size == 2) {
                        if (name.indexOf('1') != -1) {
                            $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                            $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                            $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                            $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
                            $('#add-item-form .selector-wrapper .single-option-selector').eq(1).find('option').each(function () {
                                var _tam = $(this).val();
                                $(this).parent().val(_tam).trigger('change');
                                if (check_variant) {
                                    if (_available == '') {
                                        _available = _tam;
                                    }
                                } else {
                                    $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _tam + '"]').addClass('soldout');
                                    $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _tam + '"]').find('input').prop('disabled', true);
                                }
                            })
                            $('#add-item-form .selector-wrapper .single-option-selector').eq(1).val(_available).trigger('change');
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _available + '"] label').addClass('sd');
                        }
                    } else if (swatch_size == 3) {
                        var _count_op2 = $('#add-item-form #variant-swatch-1 .swatch-element').length;
                        var _count_op3 = $('#add-item-form #variant-swatch-2 .swatch-element').length;
                        if (name.indexOf('1') != -1) {
                            $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                            $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                            $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                            $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
                            $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                            $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                            var _avi_op1 = '';
                            var _avi_op2 = '';
                            $('#add-item-form #variant-swatch-1 .swatch-element').each(function (ind, value) {
                                var _key = $(this).data('value');
                                var _unavi = 0;
                                $('#add-item-form .single-option-selector').eq(1).val(_key).change();
                                $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                                $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                                $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                                $('#add-item-form #variant-swatch-2 .swatch-element').each(function (i, v) {
                                    var _val = $(this).data('value');
                                    $('#add-item-form .single-option-selector').eq(2).val(_val).change();
                                    if (check_variant == true) {
                                        if (_avi_op1 == '') {
                                            _avi_op1 = _key;
                                        }
                                        if (_avi_op2 == '') {
                                            _avi_op2 = _val;
                                        }
                                        //console.log(_avi_op1 + ' -- ' + _avi_op2)
                                    } else {
                                        _unavi += 1;
                                    }
                                })
                                if (_unavi == _count_op3) {
                                    $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _key + '"]').addClass('soldout');
                                    setTimeout(function () {
                                        $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _key + '"] input').attr('disabled', 'disabled');
                                    })
                                }
                            })
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _avi_op1 + '"] input').click();
                        } else if (name.indexOf('2') != -1) {
                            $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                            $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                            $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                            $('#add-item-form .selector-wrapper .single-option-selector').eq(2).find('option').each(function () {
                                var _tam = $(this).val();
                                $(this).parent().val(_tam).trigger('change');
                                if (check_variant) {
                                    if (_available == '') {
                                        _available = _tam;
                                    }
                                } else {
                                    $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _tam + '"]').addClass('soldout');
                                    $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _tam + '"]').find('input').prop('disabled', true);
                                }
                            })
                            $('#add-item-form .selector-wrapper .single-option-selector').eq(2).val(_available).trigger('change');
                            $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _available + '"] label').addClass('sd');
                        }
                    } else {

                    }
                    if (pro_template == "style_02") {
                        //check img style 2
                        if (check_scrollstyle2 != '' && $(window).width() > 991 && fIndex == true) {
                            var indeximg2 = $("div.product-gallery[data-image='" + check_scrollstyle2 + "']").index();
                            $('html, body').animate({
                                scrollTop: $('#productScroll-slider div.product-gallery:eq(' + indeximg2 + ')').offset().top - 15
                            }, 800);
                        }
                    }
                })
                $(document).ready(function () {
                    var _chage = '';
                    $('#add-item-form .swatch-element[data-value="' + $('#add-item-form .selector-wrapper .single-option-selector').eq(0).val() + '"]').find('input').click();
                    $('#add-item-form .swatch-element[data-value="' + $('#add-item-form .selector-wrapper .single-option-selector').eq(1).val() + '"]').find('input').click();
                    if (swatch_size == 2) {
                        var _avi_op1 = '';
                        var _avi_op2 = '';
                        var _count = $('#add-item-form #variant-swatch-1 .swatch-element').length;
                        $('#add-item-form #variant-swatch-0 .swatch-element').each(function (ind, value) {
                            var _key = $(this).data('value');
                            var _unavi = 0;
                            $('#add-item-form .single-option-selector').eq(0).val(_key).change();
                            $('#add-item-form #variant-swatch-1 .swatch-element').each(function (i, v) {
                                var _val = $(this).data('value');
                                $('#add-item-form .single-option-selector').eq(1).val(_val).change();
                                if (check_variant == true) {
                                    if (_avi_op1 == '') {
                                        _avi_op1 = _key;
                                    }
                                    if (_avi_op2 == '') {
                                        _avi_op2 = _val;
                                    }
                                } else {
                                    _unavi += 1;
                                }
                            })
                            if (_unavi == _count) {
                                //$('#add-item-form #variant-swatch-0 .swatch-element[data-value = "'+_key+'"]').addClass('soldout');
                                /*	$('#add-item-form #variant-swatch-0 .swatch-element[data-value = "'+_key+'"]').find('input').attr('disabled','disabled');*/
                            }
                        })
                        $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _avi_op2 + '"] input').click();
                        $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
                    } else if (swatch_size == 3) {
                        var _avi_op1 = '';
                        var _avi_op2 = '';
                        var _avi_op3 = '';
                        var _size_op2 = $('#add-item-form #variant-swatch-1 .swatch-element').length;
                        var _size_op3 = $('#add-item-form #variant-swatch-2 .swatch-element').length;
                        $('#add-item-form #variant-swatch-0 .swatch-element').each(function (ind, value) {
                            var _key_va1 = $(this).data('value');
                            var _count_unavi = 0;
                            $('#add-item-form .single-option-selector').eq(0).val(_key_va1).change();
                            $('#add-item-form #variant-swatch-1 .swatch-element').each(function (i, v) {
                                var _key_va2 = $(this).data('value');
                                var _unavi_2 = 0;
                                $('#add-item-form .single-option-selector').eq(1).val(_key_va2).change();
                                $('#add-item-form #variant-swatch-2 .swatch-element').each(function (j, z) {
                                    var _key_va3 = $(this).data('value');
                                    $('#add-item-form .single-option-selector').eq(2).val(_key_va3).change();
                                    if (check_variant == true) {
                                        if (_avi_op1 == '') {
                                            _avi_op1 = _key_va1;
                                        }
                                        if (_avi_op2 == '') {
                                            _avi_op2 = _key_va2;
                                        }
                                        if (_avi_op3 == '') {
                                            _avi_op3 = _key_va3;
                                        }
                                    } else {
                                        _unavi_2 += 1;
                                    }
                                })
                                if (_unavi_2 == _size_op3) {
                                    _count_unavi += 1;
                                }
                            })
                            if (_size_op2 == _count_unavi) {
                                //$('#add-item-form #variant-swatch-0 .swatch-element[data-value = "'+_key_va1+'"]').addClass('soldout');
                                /*$('#add-item-form #variant-swatch-0 .swatch-element[data-value = "'+_key_va1+'"]').find('input').attr('disabled','disabled');*/
                            }
                        })
                        $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
                    }
                    if (pro_template == "style_02") {
                        //stye 2
                        fIndex = true;
                        if (check_scrollstyle2 != '' && $(window).width() > 991) {
                            var indeximg2 = $("div.product-gallery[data-image='" + check_scrollstyle2 + "']").index();
                            if ($(window).scrollTop() > $('.productDetail-information').offset().top) {
                                $('html, body').animate({
                                    scrollTop: $('#productScroll-slider div.product-gallery:eq(' + indeximg2 + ')').offset().top - 15
                                }, 800);
                            }
                        }
                    }
                });
                $(document).ready(function () {
                    var vl = $('#add-item-form .swatch .color input').val();
                    $('#add-item-form .swatch .color input').parents(".swatch").find(".header strong").html(vl);
                    $("#add-item-form .select-swap .color").hover(function () {
                        var value = $(this).data("value");
                        $(this).parents(".swatch").find(".header strong").html(value);
                    }, function () {
                        var value = $("#add-item-form .select-swap .color label.sd span").html();
                        $(this).parents(".swatch").find(".header strong").html(value);
                    });
                });

                $(document).ready(function () {
                    var vl = $('#add-item-form .swatch .color input').val();
                    $('#add-item-form .swatch .color input').parents(".swatch").find(".header span").html(vl);
                    $("#add-item-form .select-swap .color").hover(function () {
                        var value = $(this).data("value");
                        $(this).parents(".swatch").find(".header span").html(value);
                    }, function () {
                        var value = $("#add-item-form .select-swap .color label.sd span").html();
                        $(this).parents(".swatch").find(".header span").html(value);
                    });
                });

                $(document).ready(function () {
                    var expandable_content_height = $('.expandable-toggle .description-productdetail').height();
                    if (expandable_content_height > 220) {
                        $('.expandable-toggle .description-productdetail').css({
                            "height": "220px",
                            "overflow": "hidden"
                        });
                    } else {
                        $('.expandable-content_toggle').addClass('d-none');
                    }
                    $('body').on('click', '.js_expandable_content', function (e) {
                        if (!$('.expandable-toggle').hasClass('opened')) {
                            $('.expandable-content_toggle').removeClass('btn-closemore').addClass('btn-viewmore').find('.expandable-content_toggle-text').html('Xem thêm nội dung');
                            var curHeight = $('.expandable-toggle .description-productdetail').height();
                            expandable_content_height = 220;
                            $('.expandable-toggle .description-productdetail').height(curHeight).animate({
                                height: expandable_content_height
                            }, 300, function () {
                                $(this).parent().addClass('opened');
                            });
                            var x = $('.product-description').offset().top;
                            HRT.All.smoothScroll(x - 90, 250);
                        } else {
                            $('.expandable-toggle .description-productdetail').css('height', 'auto');
                            $('.expandable-toggle').removeClass('opened');
                            $('.expandable-content_toggle').removeClass('btn-viewmore').addClass('btn-closemore').find('.expandable-content_toggle-text').html('Rút gọn nội dung');
                        }
                    });
                });
            </script>

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
        app.controller('productDetailPage', function ($rootScope, $scope, $interval, compareItemSync, cartItemSync) {
            $scope.variant = @json($variantDefault);
            $scope.variants = @json($product->variants);
            $scope.selectedVariantId = ($scope.variant && $scope.variant.id) ? $scope.variant.id : null;

            $scope.getVariant = function (variantId) {
                var v = ($scope.variants || []).find(function (item) {
                    return item.id == variantId;
                });

                if (v) {
                    $scope.variant = angular.copy(v);
                }
            }

            $scope.selectVariant = function (id) {
                $scope.selectedVariantId = id;
                $scope.getVariant(id);
            };

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


            $scope.addToCart = function (productId) {
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


        })
    </script>
@endpush
