@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $short_des }}
@endsection
@section('css')
@endsection

@section('content')
    <div class="section-main ">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <main class="wrapperMain_content">
        <div class="layout-collections">
            <div class="breadcrumb-shop">
                <div class="container">
                    <div class="breadcrumb-list  ">
                        <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a href="{{ route('front.home-page') }}" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <span itemprop="item" content="{{ $title }}"><strong
                                        itemprop="name">{{ $title }}</strong></span>
                                <meta itemprop="position" content="2" />
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="wrapper-mainCollection">
                <div class="collection-listproduct" id="collection-body">
                    <div class="container container-pd-parent">
                        <div class="row row-mg-parent collection-wraper">
                            <div class="col-lg-3 col-md-12 col-12 collection-filter ">
                                <div class="wrapper_layered_filter">
                                    <div class="layered_filter_parent ">
                                        <div class="layered_filter_container">
                                            <div class="layered_filter_title">
                                                <p class="title_filter">
                                                    <span class="icon-filter">
                                                        <svg viewBox="0 0 20 20">
                                                            <path fill="none" stroke-width="2" stroke-linejoin="round"
                                                                stroke-miterlimit="10" d="M12 9v8l-4-4V9L2 3h16z"></path>
                                                        </svg>
                                                    </span>
                                                    Bộ lọc
                                                </p>
                                                <button class="close_filter">
                                                    <svg viewBox="0 0 19 19" role="presentation">
                                                        <path
                                                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                            fill-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="layered_filter_group layered_filter_mobileContent"
                                                id="layered_filter_mobile">
                                                <div class="filter_group" aria-expanded="false">
                                                    <div class="group-menu filter_group_block">
                                                        <div class="filter_group-subtitle">
                                                            <span>Danh mục sản phẩm</span>
                                                        </div>
                                                        <div class="filter_group-content layered-category">
                                                            <div class="layered-content">
                                                                <ul class="tree-menu">
                                                                    @foreach ($categories as $category)
                                                                    <li class="">
                                                                        <span></span>
                                                                        <a class="" href="{{ route('front.show-product-category', $category->slug) }}"
                                                                            title="{{ $category->name }}" target="_self">
                                                                            {{ $category->name }}
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./filter sortby -->
                                                <div class="filter_group filter_sortby" aria-expanded="false">
                                                    <div class="filter_group_block">
                                                        <div class="filter_group-subtitle">
                                                            <span>Sắp xếp</span>
                                                        </div>
                                                        <div class="filter_group-content">
                                                            <ul class="checkbox-sortby sort-by-content">
                                                                <li><span data-value="price-ascending"
                                                                        data-filter="(price:product=asc)">Giá: Tăng
                                                                        dần</span></li>
                                                                <li><span data-value="price-descending"
                                                                        data-filter="(price:product=desc)">Giá: Giảm
                                                                        dần</span></li>
                                                                <li><span data-value="title-ascending"
                                                                        data-filter="(title:product=asc)">Tên: A-Z</span>
                                                                </li>
                                                                <li><span data-value="title-descending"
                                                                        data-filter="(title:product=desc)">Tên: Z-A</span>
                                                                </li>
                                                                <li><span data-value="created-ascending"
                                                                        data-filter="(updated_at:product=asc)">Cũ
                                                                        nhất</span></li>
                                                                <li class="active"><span data-value="created-descending"
                                                                        data-filter="(updated_at:product=desc)">Mới
                                                                        nhất</span></li>
                                                                <li><span data-value="best-selling"
                                                                        data-filter="(sold_quantity:product=desc)">Bán chạy
                                                                        nhất</span></li>
                                                                <li><span data-value="quantity-descending"
                                                                        data-filter="(quantity:product=desc)">Tồn kho giảm
                                                                        dần</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./filter brand -->
                                                <div class="filter_group" aria-expanded="false">
                                                    <div class="filter_group_block">
                                                        <div class="filter_group-subtitle">
                                                            <span>Nhà cung cấp</span>
                                                        </div>
                                                        <div class="filter_group-content filter-brand">
                                                            <ul class="checkbox-list">
                                                                <li>
                                                                    <input type="checkbox" id="data-brand-p1"
                                                                        value="Vivo" name="brand-filter"
                                                                        data-vendor="(vendor:product contains Vivo)" />
                                                                    <label for="data-brand-p1">Vivo</label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="data-brand-p2"
                                                                        value="Xiaomi" name="brand-filter"
                                                                        data-vendor="(vendor:product contains Xiaomi)" />
                                                                    <label for="data-brand-p2">Xiaomi</label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="data-brand-p3"
                                                                        value="Samsung" name="brand-filter"
                                                                        data-vendor="(vendor:product contains Samsung)" />
                                                                    <label for="data-brand-p3">Samsung</label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="data-brand-p4"
                                                                        value="Oppo" name="brand-filter"
                                                                        data-vendor="(vendor:product contains Oppo)" />
                                                                    <label for="data-brand-p4">Oppo</label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="data-brand-p5"
                                                                        value="Nokia" name="brand-filter"
                                                                        data-vendor="(vendor:product contains Nokia)" />
                                                                    <label for="data-brand-p5">Nokia</label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="data-brand-p6"
                                                                        value="Apple" name="brand-filter"
                                                                        data-vendor="(vendor:product contains Apple)" />
                                                                    <label for="data-brand-p6">Apple</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./filter price -->
                                                <div class="filter_group" aria-expanded="false">
                                                    <div class="filter_group_block">
                                                        <div class="filter_group-subtitle">
                                                            <span>Lọc giá</span>
                                                        </div>
                                                        <div class="filter_group-content filter-price">
                                                            <ul class="checkbox-list">
                                                                <li>
                                                                    <input type="checkbox" id="p1" name="cc"
                                                                        data-price="(price_variant:product < 1000000)" />
                                                                    <label for="p1">
                                                                        <span>Dưới</span> 1.000.000₫
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="p2" name="cc"
                                                                        data-price="(price_variant:product range 1000000_2000000)" />
                                                                    <label for="p2">
                                                                        1.000.000₫ - 2.000.000₫
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="p3" name="cc"
                                                                        data-price="(price_variant:product range 2000000_3000000)" />
                                                                    <label for="p3">
                                                                        2.000.000₫ - 3.000.000₫
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="p4" name="cc"
                                                                        data-price="(price_variant:product range 3000000_4000000)" />
                                                                    <label for="p4">
                                                                        3.000.000₫ - 4.000.000₫
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <input type="checkbox" id="p5" name="cc"
                                                                        data-price="(price_variant:product > 4000000)" />
                                                                    <label for="p5">
                                                                        <span>Trên</span> 4.000.000₫
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./filter color -->
                                                <!-- ./filter size -->
                                            </div>
                                            <div class="layered_filter_bottom">
                                                <button id="clear-btn-filter"
                                                    class="btn-filter btn-filter-clear">Hủy</button>
                                                <button id="apply-btn-filter" class="btn-filter btn-filter-apply">Áp
                                                    dụng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 col-12 collection-content">
                                <div class="collection-heading">
                                    <div class="collection-heading__banner">
                                        <img class="lazyload"
                                            data-src="//theme.hstatic.net/200000516791/1001206835/14/collection_banner.jpg?v=162"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                            alt="Điện thoại" />
                                    </div>
                                    <div class="collection-heading__content">
                                        <div class="dFlex-row">
                                            <div class="heading-box">
                                                <h1 class="title">
                                                    Điện thoại
                                                </h1>
                                                <div class="filter-box">
                                                    <span class="title-count"><b>12</b> sản phẩm</span>
                                                    <p class="title-filter d-sm-flex d-lg-none">
                                                        <span>Bộ lọc</span>
                                                        <svg viewBox="0 0 20 20">
                                                            <path fill="none" stroke-width="2" stroke-linejoin="round"
                                                                stroke-miterlimit="10" d="M12 9v8l-4-4V9L2 3h16z"></path>
                                                        </svg>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="heading-sortbyfilter d-none d-lg-block">
                                                <div class="collection-sortbyfilter-container">
                                                    <div class="collection-sortby-filter">
                                                        <div class="collection-filterby">
                                                            <div class="layered_filter_title boxstyle-mb"
                                                                data-layered-click="#layered_filter_mobile">
                                                                <p class="title_filter">
                                                                    <span class="icon-filter">
                                                                        <svg viewBox="0 0 20 20">
                                                                            <path fill="none" stroke-width="2"
                                                                                stroke-linejoin="round"
                                                                                stroke-miterlimit="10"
                                                                                d="M12 9v8l-4-4V9L2 3h16z"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="icon-close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24">
                                                                            <path
                                                                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    Bộ lọc
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="collection-sortby">
                                                            <div class="layered_filter_title boxstyle-mb"
                                                                data-layered-click="#layered_sortby_mobile">
                                                                <p class="title_filter">
                                                                    <span class="icon-filter"><i
                                                                            class="fa fa-sort-alpha-asc"
                                                                            aria-hidden="true"></i></span>
                                                                    <span class="icon-close">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24">
                                                                            <path
                                                                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                    Sắp xếp
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collection-sortby-option layered_filter_mobileContent"
                                                        id="layered_sortby_mobile">
                                                        <ul class="sort-by sort-by-content">
                                                            <li><span data-value="manual" data-filter="">Sản phẩm nổi
                                                                    bật</span></li>
                                                            <li><span data-value="price-ascending"
                                                                    data-filter="(price:product=asc)">Giá: Tăng dần</span>
                                                            </li>
                                                            <li><span data-value="price-descending"
                                                                    data-filter="(price:product=desc)">Giá: Giảm dần</span>
                                                            </li>
                                                            <li><span data-value="title-ascending"
                                                                    data-filter="(title:product=asc)">Tên: A-Z</span></li>
                                                            <li><span data-value="title-descending"
                                                                    data-filter="(title:product=desc)">Tên: Z-A</span></li>
                                                            <li><span data-value="created-ascending"
                                                                    data-filter="(updated_at:product=asc)">Cũ nhất</span>
                                                            </li>
                                                            <li><span data-value="created-descending"
                                                                    data-filter="(updated_at:product=desc)">Mới nhất</span>
                                                            </li>
                                                            <li><span data-value="best-selling"
                                                                    data-filter="(sold_quantity:product=desc)">Bán chạy
                                                                    nhất</span></li>
                                                            <li><span data-value="quantity-descending"
                                                                    data-filter="(quantity:product=desc)">Tồn kho giảm
                                                                    dần</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collection-filter-tags">
                                            <div class="layered_filter_tags">
                                                <div class="filter_tags"></div>
                                                <div class="filter_tags"></div>
                                                <div class="filter_tags">
                                                    Nhà cung cấp: <b></b>
                                                    <span class="filter_tags_remove">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                            x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
                                                            <path fill="#333"
                                                                d="M9.016 40.837a1.001 1.001 0 0 0 1.415-.001l14.292-14.309 14.292 14.309a1 1 0 1 0 1.416-1.413L26.153 25.129 40.43 10.836a1 1 0 1 0-1.415-1.413L24.722 23.732 10.43 9.423a1 1 0 1 0-1.415 1.413l14.276 14.293L9.015 39.423a1 1 0 0 0 .001 1.414z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="filter_tags">
                                                    Lọc giá: <b></b>
                                                    <span class="filter_tags_remove">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                            x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
                                                            <path fill="#333"
                                                                d="M9.016 40.837a1.001 1.001 0 0 0 1.415-.001l14.292-14.309 14.292 14.309a1 1 0 1 0 1.416-1.413L26.153 25.129 40.43 10.836a1 1 0 1 0-1.415-1.413L24.722 23.732 10.43 9.423a1 1 0 1 0-1.415 1.413l14.276 14.293L9.015 39.423a1 1 0 0 0 .001 1.414z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="filter_tags filter_tags_remove_all"><span>Xóa hết </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wraplist-collection">
                                    <div class="row listProduct-row listProduct-filter">
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987963">
                                            <div class="product-inner" data-proid="1039990848" id="collection_loop_1">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990848">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_12_1_f5ccbd4611264aa689ade7ac66582992_343191087259479a81b8e9e878d6abd1_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_12_1_f5ccbd4611264aa689ade7ac66582992_343191087259479a81b8e9e878d6abd1_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_12_1_f5ccbd4611264aa689ade7ac66582992_343191087259479a81b8e9e878d6abd1_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" iPhone 11 64GB " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_12_2_429c26f0359a46809ab936603bdf8cef_b7e911f91db349af9e6892c0397e1dd8_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_12_2_429c26f0359a46809ab936603bdf8cef_b7e911f91db349af9e6892c0397e1dd8_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_12_2_429c26f0359a46809ab936603bdf8cef_b7e911f91db349af9e6892c0397e1dd8_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" iPhone 11 64GB " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/iphone-11-64gb" title="Xem nhanh"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/iphone-11-64gb"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/iphone-11-64gb" title="iPhone 11 64GB"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=apple">Apple</a></p>
                                                    </div>
                                                    <h3><a href="/products/iphone-11-64gb" class="quickview-product"
                                                            data-handle="/products/iphone-11-64gb">iPhone 11 64GB</a></h3>
                                                    <div class="proloop--variant">
                                                        +4 Màu sắc
                                                    </div>
                                                    <div class="proloop--price on-sale d-flex">
                                                        <div class="price-box">
                                                            <span class="price">14,999,000₫</span>
                                                            <span class="price-del">16,999,000₫</span>
                                                        </div>
                                                        <span class="pro-sale">-12%</span>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987963"
                                                        data-handle="iphone-11-64gb">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987963')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987963')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987963')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987963')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987968">
                                            <div class="product-inner" data-proid="1039990849" id="collection_loop_2">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990849">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_11_1_36b4fff284b3423ebd2ba2f5baf48663_b10e6062f22b4aed91cbb874d5b547e5_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_11_1_36b4fff284b3423ebd2ba2f5baf48663_b10e6062f22b4aed91cbb874d5b547e5_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_11_1_36b4fff284b3423ebd2ba2f5baf48663_b10e6062f22b4aed91cbb874d5b547e5_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" iPhone 12 Pro Max 128GB " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_11_4_088a79351a584c2ba562bd290547269e_c4ed7a1283e5415386ac8c00f87258b8_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_11_4_088a79351a584c2ba562bd290547269e_c4ed7a1283e5415386ac8c00f87258b8_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_11_4_088a79351a584c2ba562bd290547269e_c4ed7a1283e5415386ac8c00f87258b8_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" iPhone 12 Pro Max 128GB " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/iphone-12-pro-max-128gb"
                                                            title="Xem nhanh"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/iphone-12-pro-max-128gb"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/iphone-12-pro-max-128gb"
                                                        title="iPhone 12 Pro Max 128GB"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=apple">Apple</a></p>
                                                    </div>
                                                    <h3><a href="/products/iphone-12-pro-max-128gb"
                                                            class="quickview-product"
                                                            data-handle="/products/iphone-12-pro-max-128gb">iPhone 12 Pro
                                                            Max 128GB</a></h3>
                                                    <div class="proloop--variant">
                                                        +4 Màu sắc
                                                    </div>
                                                    <div class="proloop--price on-sale d-flex">
                                                        <div class="price-box">
                                                            <span class="price">30,999,000₫</span>
                                                            <span class="price-del">32,999,000₫</span>
                                                        </div>
                                                        <span class="pro-sale">-6%</span>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987968"
                                                        data-handle="iphone-12-pro-max-128gb">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987968')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987968')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987968')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987968')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987197">
                                            <div class="product-inner" data-proid="1039990496" id="collection_loop_3">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990496">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/yty_2f867ac7879f4c8b8336a06e39000b21_65530b88c7c94939bbc885345dd5a4b4_4af203a533484eb5a7f0ff6cbdd5d9e1_medium.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/yty_2f867ac7879f4c8b8336a06e39000b21_65530b88c7c94939bbc885345dd5a4b4_4af203a533484eb5a7f0ff6cbdd5d9e1_large.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/yty_2f867ac7879f4c8b8336a06e39000b21_65530b88c7c94939bbc885345dd5a4b4_4af203a533484eb5a7f0ff6cbdd5d9e1_small.jpg"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Iphone 6 64GB " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/dfdf_ae3e5d18cf724be887a29722490a44bf_462b0007015548ddace2795cf0346f19_47d194f20f544d029050598b43f309cc_medium.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/dfdf_ae3e5d18cf724be887a29722490a44bf_462b0007015548ddace2795cf0346f19_47d194f20f544d029050598b43f309cc_large.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/dfdf_ae3e5d18cf724be887a29722490a44bf_462b0007015548ddace2795cf0346f19_47d194f20f544d029050598b43f309cc_small.jpg"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Iphone 6 64GB " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview" data-handle="/products/iphone-6-64gb"
                                                            title="Xem nhanh"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/iphone-6-64gb"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/iphone-6-64gb" title="Iphone 6 64GB"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=apple">Apple</a></p>
                                                    </div>
                                                    <h3><a href="/products/iphone-6-64gb" class="quickview-product"
                                                            data-handle="/products/iphone-6-64gb">Iphone 6 64GB</a></h3>
                                                    <div class="proloop--variant">
                                                        +3 Màu sắc
                                                    </div>
                                                    <div class="proloop--price  d-flex">
                                                        <div class="price-box">
                                                            <span class="price">9,900,000₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987197"
                                                        data-handle="iphone-6-64gb">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987197')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987197')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987197')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987197')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987200">
                                            <div class="product-inner" data-proid="1039990497" id="collection_loop_4">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990497">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/8659_569b62f1fafc48958fe3f5ce48cdc986_fbf422c41a2e43029e4601906dab7ec1_dd89819ce23f43cc97b697cf0cb5fffc_medium.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/8659_569b62f1fafc48958fe3f5ce48cdc986_fbf422c41a2e43029e4601906dab7ec1_dd89819ce23f43cc97b697cf0cb5fffc_large.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/8659_569b62f1fafc48958fe3f5ce48cdc986_fbf422c41a2e43029e4601906dab7ec1_dd89819ce23f43cc97b697cf0cb5fffc_small.jpg"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Iphone 6plus 64GB " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/525e_630bae29700f499eb9ae9e004a4265c4_69bd1a69e27c4f3899be0ea67ed3523a_b2f10d162f3443ddaaa8d1fc0bbe3e1e_medium.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/525e_630bae29700f499eb9ae9e004a4265c4_69bd1a69e27c4f3899be0ea67ed3523a_b2f10d162f3443ddaaa8d1fc0bbe3e1e_large.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/525e_630bae29700f499eb9ae9e004a4265c4_69bd1a69e27c4f3899be0ea67ed3523a_b2f10d162f3443ddaaa8d1fc0bbe3e1e_small.jpg"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Iphone 6plus 64GB " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/iphone-6plus-64gb" title="Xem nhanh"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/iphone-6plus-64gb"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/iphone-6plus-64gb"
                                                        title="Iphone 6plus 64GB"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=apple">Apple</a></p>
                                                    </div>
                                                    <h3><a href="/products/iphone-6plus-64gb" class="quickview-product"
                                                            data-handle="/products/iphone-6plus-64gb">Iphone 6plus 64GB</a>
                                                    </h3>
                                                    <div class="proloop--variant">
                                                        +3 Màu sắc
                                                    </div>
                                                    <div class="proloop--price  d-flex">
                                                        <div class="price-box">
                                                            <span class="price">15,670,000₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987200"
                                                        data-handle="iphone-6plus-64gb">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987200')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987200')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987200')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987200')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987203">
                                            <div class="product-inner" data-proid="1039990498" id="collection_loop_5">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990498">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/_a999deee-a9b5-494e-b5b6-65ad78378fbc_db04edfb24e24c519bf915b2e1f1b9d3_8ca6c271879d41d6baefb1da1a8a8bab_medium.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/_a999deee-a9b5-494e-b5b6-65ad78378fbc_db04edfb24e24c519bf915b2e1f1b9d3_8ca6c271879d41d6baefb1da1a8a8bab_large.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/_a999deee-a9b5-494e-b5b6-65ad78378fbc_db04edfb24e24c519bf915b2e1f1b9d3_8ca6c271879d41d6baefb1da1a8a8bab_small.jpg"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" iphone 7plus 32GB " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/yty_9c8fc04869084a92b60ea346e92997f7_4b42652c52d04baa91c9f62e856d7169_medium.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/yty_9c8fc04869084a92b60ea346e92997f7_4b42652c52d04baa91c9f62e856d7169_large.jpg"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/yty_9c8fc04869084a92b60ea346e92997f7_4b42652c52d04baa91c9f62e856d7169_small.jpg"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" iphone 7plus 32GB " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/iphone-7plus-32gb" title="Xem nhanh"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/iphone-7plus-32gb"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/iphone-7plus-32gb"
                                                        title="iphone 7plus 32GB"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=apple">Apple</a></p>
                                                    </div>
                                                    <h3><a href="/products/iphone-7plus-32gb" class="quickview-product"
                                                            data-handle="/products/iphone-7plus-32gb">iphone 7plus 32GB</a>
                                                    </h3>
                                                    <div class="proloop--variant">
                                                        +4 Màu sắc
                                                    </div>
                                                    <div class="proloop--price on-sale d-flex">
                                                        <div class="price-box">
                                                            <span class="price">17,800,000₫</span>
                                                            <span class="price-del">18,600,000₫</span>
                                                        </div>
                                                        <span class="pro-sale">-4%</span>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987203"
                                                        data-handle="iphone-7plus-32gb">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987203')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987203')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987203')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987203')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987976">
                                            <div class="product-inner" data-proid="1039990853" id="collection_loop_6">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990853">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_14_1_5ddeaef009a94c049033bc35486660de_2dcd61ca5c12449ea97f1a8ac2b8049f_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_14_1_5ddeaef009a94c049033bc35486660de_2dcd61ca5c12449ea97f1a8ac2b8049f_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_14_1_5ddeaef009a94c049033bc35486660de_2dcd61ca5c12449ea97f1a8ac2b8049f_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Nokia 5.4 4GB -128GB " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_14_3_5d55561a44f34c5e935a49e8a580ba4a_318a54250ebd4918a4207f4553834675_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_14_3_5d55561a44f34c5e935a49e8a580ba4a_318a54250ebd4918a4207f4553834675_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_14_3_5d55561a44f34c5e935a49e8a580ba4a_318a54250ebd4918a4207f4553834675_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Nokia 5.4 4GB -128GB " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/nokia-5-4-4gb-128gb"
                                                            title="Xem nhanh"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/nokia-5-4-4gb-128gb"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/nokia-5-4-4gb-128gb"
                                                        title="Nokia 5.4 4GB -128GB"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=nokia">Nokia</a></p>
                                                    </div>
                                                    <h3><a href="/products/nokia-5-4-4gb-128gb" class="quickview-product"
                                                            data-handle="/products/nokia-5-4-4gb-128gb">Nokia 5.4 4GB
                                                            -128GB</a></h3>
                                                    <div class="proloop--variant">
                                                        +2 Màu sắc
                                                    </div>
                                                    <div class="proloop--price on-sale d-flex">
                                                        <div class="price-box">
                                                            <span class="price">3,290,000₫</span>
                                                            <span class="price-del">4,100,000₫</span>
                                                        </div>
                                                        <span class="pro-sale">-20%</span>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987976"
                                                        data-handle="nokia-5-4-4gb-128gb">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987976')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987976')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987976')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987976')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987978">
                                            <div class="product-inner" data-proid="1039990854" id="collection_loop_7">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990854">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_16_1_e6e3b50f64d849d286e16db72382c420_14734ff39dd14baaadcb177ad348a3be_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_16_1_e6e3b50f64d849d286e16db72382c420_14734ff39dd14baaadcb177ad348a3be_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_16_1_e6e3b50f64d849d286e16db72382c420_14734ff39dd14baaadcb177ad348a3be_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Oppo A15 3GB-32GB " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_16_3_c8800b3a1e6d4d5383237c4b95a1c711_03b08ed9e7f8430a86642fd8fdeed0c5_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_16_3_c8800b3a1e6d4d5383237c4b95a1c711_03b08ed9e7f8430a86642fd8fdeed0c5_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_16_3_c8800b3a1e6d4d5383237c4b95a1c711_03b08ed9e7f8430a86642fd8fdeed0c5_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Oppo A15 3GB-32GB " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/oppo-a15-3gb-32gb" title="Xem nhanh"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/oppo-a15-3gb-32gb"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/oppo-a15-3gb-32gb"
                                                        title="Oppo A15 3GB-32GB"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=oppo">Oppo</a></p>
                                                    </div>
                                                    <h3><a href="/products/oppo-a15-3gb-32gb" class="quickview-product"
                                                            data-handle="/products/oppo-a15-3gb-32gb">Oppo A15 3GB-32GB</a>
                                                    </h3>
                                                    <div class="proloop--variant">
                                                        +2 Màu sắc
                                                    </div>
                                                    <div class="proloop--price  d-flex">
                                                        <div class="price-box">
                                                            <span class="price">4,390,000₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987978"
                                                        data-handle="oppo-a15-3gb-32gb">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987978')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987978')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987978')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987978')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987981">
                                            <div class="product-inner" data-proid="1039990856" id="collection_loop_8">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990856">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_1_1_5476f3fc6e2444f68c055702df49392a_411f00758068471e9154fccf4bd3b411_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_1_1_5476f3fc6e2444f68c055702df49392a_411f00758068471e9154fccf4bd3b411_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_1_1_5476f3fc6e2444f68c055702df49392a_411f00758068471e9154fccf4bd3b411_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" OPPO Reno6 Z 5G " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_2_5_94c280669bba42908fc198755e4647fa_49606b3522414519a4b988b85ec30cd9_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_2_5_94c280669bba42908fc198755e4647fa_49606b3522414519a4b988b85ec30cd9_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_2_5_94c280669bba42908fc198755e4647fa_49606b3522414519a4b988b85ec30cd9_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" OPPO Reno6 Z 5G " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/oppo-reno6-z-5g" title="Xem nhanh"><i
                                                                class="fa fa-eye" aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/oppo-reno6-z-5g"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/oppo-reno6-z-5g"
                                                        title="OPPO Reno6 Z 5G"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=oppo">Oppo</a></p>
                                                    </div>
                                                    <h3><a href="/products/oppo-reno6-z-5g" class="quickview-product"
                                                            data-handle="/products/oppo-reno6-z-5g">OPPO Reno6 Z 5G</a>
                                                    </h3>
                                                    <div class="proloop--variant">
                                                        +2 Màu sắc
                                                    </div>
                                                    <div class="proloop--price  d-flex">
                                                        <div class="price-box">
                                                            <span class="price">9,490,000₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987981"
                                                        data-handle="oppo-reno6-z-5g">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987981')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987981')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987981')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987981')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987984">
                                            <div class="product-inner" data-proid="1039990857" id="collection_loop_9">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990857">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_15_1_b97a75e016e545dc9acb726a4ae43440_cbe36d319d6f4ba3800242e87e63c95e_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_15_1_b97a75e016e545dc9acb726a4ae43440_cbe36d319d6f4ba3800242e87e63c95e_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_15_1_b97a75e016e545dc9acb726a4ae43440_cbe36d319d6f4ba3800242e87e63c95e_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Samsung Galaxy A22 5G " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_15_5_941742aa8475437e96a232364fe8a918_afb305e08d324a1e8e0f6a8655c8eb61_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_15_5_941742aa8475437e96a232364fe8a918_afb305e08d324a1e8e0f6a8655c8eb61_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_15_5_941742aa8475437e96a232364fe8a918_afb305e08d324a1e8e0f6a8655c8eb61_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Samsung Galaxy A22 5G " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/samsung-galaxy-a22-5g"
                                                            title="Xem nhanh"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/samsung-galaxy-a22-5g"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/samsung-galaxy-a22-5g"
                                                        title="Samsung Galaxy A22 5G"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=samsung">Samsung</a></p>
                                                    </div>
                                                    <h3><a href="/products/samsung-galaxy-a22-5g"
                                                            class="quickview-product"
                                                            data-handle="/products/samsung-galaxy-a22-5g">Samsung Galaxy
                                                            A22 5G</a></h3>
                                                    <div class="proloop--variant">
                                                        +3 Màu sắc
                                                    </div>
                                                    <div class="proloop--price on-sale d-flex">
                                                        <div class="price-box">
                                                            <span class="price">5,890,000₫</span>
                                                            <span class="price-del">6,290,000₫</span>
                                                        </div>
                                                        <span class="pro-sale">-6%</span>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987984"
                                                        data-handle="samsung-galaxy-a22-5g">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987984')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987984')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987984')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987984')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-cus5 col-md-6 col-6 product-loop" data-id="1086987988">
                                            <div class="product-inner" data-proid="1039990859"
                                                id="collection_loop_10">
                                                <div class="proloop-image">
                                                    <div class="gift product_gift_label d-none" data-id="1039990859">
                                                        <img class="lazyload"
                                                            data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png"
                                                            alt="icon quà tặng">
                                                    </div>
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source media="(max-width: 480px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_1_7_d88d089dfa6942648041fcc533d30398_126e1a420b7f4c3aabeece778077b36f_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width: 481px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_1_7_d88d089dfa6942648041fcc533d30398_126e1a420b7f4c3aabeece778077b36f_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_1_7_d88d089dfa6942648041fcc533d30398_126e1a420b7f4c3aabeece778077b36f_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Samsung Galaxy Note 20 Ultra " />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_1_6_5cccf0aa86e74e15ad24475ad13e52a8_034ed58ea4544856ada332784c24e5a7_medium.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <source media="(min-width:768px)"
                                                                    data-srcset="//product.hstatic.net/200000516791/product/product_1_6_5cccf0aa86e74e15ad24475ad13e52a8_034ed58ea4544856ada332784c24e5a7_large.png"
                                                                    srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                                                                <img class="lazyload img-loop "
                                                                    data-src="//product.hstatic.net/200000516791/product/product_1_6_5cccf0aa86e74e15ad24475ad13e52a8_034ed58ea4544856ada332784c24e5a7_small.png"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt=" Samsung Galaxy Note 20 Ultra " />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="qv-product">
                                                        <span class="icon-quickview"
                                                            data-handle="/products/samsung-galaxy-note-20-ultra"
                                                            title="Xem nhanh"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                    <a href="/products/samsung-galaxy-note-20-ultra"
                                                        class="proloop-link quickview-product"
                                                        data-handle="/products/samsung-galaxy-note-20-ultra"
                                                        title="Samsung Galaxy Note 20 Ultra"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <div class="proloop--top">
                                                        <p class="proloop--vendor"><a title="Show vendor"
                                                                href="/collections/vendors?q=samsung">Samsung</a></p>
                                                    </div>
                                                    <h3><a href="/products/samsung-galaxy-note-20-ultra"
                                                            class="quickview-product"
                                                            data-handle="/products/samsung-galaxy-note-20-ultra">Samsung
                                                            Galaxy Note 20 Ultra</a></h3>
                                                    <div class="proloop--variant">
                                                        +3 Màu sắc
                                                    </div>
                                                    <div class="proloop--price  d-flex">
                                                        <div class="price-box">
                                                            <span class="price">19,999,000₫</span>
                                                        </div>
                                                    </div>
                                                    <div class="proloop-actions" data-vrid="1086987988"
                                                        data-handle="samsung-galaxy-note-20-ultra">
                                                        <div class="proloop-actions__inner">
                                                            <div class="actions-primary">
                                                                <button type="submit"
                                                                    class="btn-proloop-cart add-to-cart  btn-addcart-view "
                                                                    onclick="HRT.All.addCartProdItem('1086987988')">
                                                                    <span class="btnico" title="Thêm vào giỏ">
                                                                        <svg class="btnico-first" viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <span class="btnadd"> Thêm vào giỏ </span>
                                                                </button>
                                                            </div>
                                                            <div class="actions-boxqty d-flex">
                                                                <div class="actions-icon">
                                                                    <span class="btnico"
                                                                        onclick="HRT.All.addCartProdItem('1086987988')"
                                                                        title="Thêm vào giỏ">
                                                                        <svg viewBox="0 0 512 512"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                                                <path
                                                                                    d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                                                <path
                                                                                    d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="actions-wrapqty d-flex">
                                                                    <button class="qty-btn proloop-minus"
                                                                        onclick="HRT.All.minusQtyProdItem('1086987988')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect height="1" width="18" y="9"
                                                                                x="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                    <input class="proloop-value" type="text"
                                                                        readonly="" name="proloop-quantity"
                                                                        value="">
                                                                    <button class="qty-btn proloop-plus"
                                                                        onclick="HRT.All.plusQtyProdItem('1086987988')">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect x="9" y="1" width="1"
                                                                                height="17"></rect>
                                                                            <rect x="1" y="9" width="17"
                                                                                height="1"></rect>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collection-loadmore text-center">
                                        <a class="button btn-loadmore" data-page="2" data-collectionid="1003114568"
                                            data-collectionhd="/collections/dien-thoai" href="javascript:void(0);">Xem
                                            thêm sản phẩm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" class="d-none" id="coll-handle" value="(collectionid:product=1003114568)" />
            </div>
        </div>
        <script>
            var hasChangeSort = false;
            var activeFilter = true;
            var activeSort = true;

            function sortby() {
                var parent = this;
                var collectionsort = "title-ascending";
                Haravan.queryParams = {};
                if (location.search.length) {
                    for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                        aKeyValue = aCouples[i].split('=');
                        if (aKeyValue.length > 1) {
                            Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                        }
                    }
                }
                jQuery('.sort-by li').each(function() {
                    if ($(this).find('span').data('value') == collectionsort) {
                        $(this).addClass('active');
                    }
                });
            }

            function closeFilterMobile() {
                $('.collection-filter').find('.layered_filter_parent').removeClass('show-filter');
                setTimeout(function() {
                    $('.collection-filter').find('.layered_filter_parent').fadeOut();
                    $(".layered_filter_parent .overlays-rgba").remove();
                }, 100);
            }
        </script>
        <script>
            var query = "",
                total_page = 0,
                total_product = 0,
                cur_page = 1,
                str = "",
                sortByPicked = '';
            //var current = $(".product-loop").length;
            //console.log(current)
            jQuery(document).ready(function() {
                sortby();
                jQuery('.sort-by li').click(function() {
                    hasChangeSort = true;
                    if ($(this).hasClass('active')) {} else {
                        var defaultSort = $(this).find('span').data('value');
                        $('.sort-by li').removeClass('active');
                        $('.checkbox-sortby li').removeClass('active');
                        $(this).addClass('active');
                        $('.checkbox-sortby li span[data-value="' + defaultSort + '"]').parent().addClass(
                            'active');
                        Stringfilter();
                    }
                })
                jQuery('.checkbox-sortby li').click(function() {
                    if ($(this).hasClass('active')) {} else {
                        $('.checkbox-sortby li').removeClass('active');
                        $(this).addClass('active');
                    }
                    /*if ($(".layered_filter_sortby").length > 0) {
                        closeFilterMobile()
                    }*/
                })
                jQuery('.checkbox-list li > input').click(function() {
                    jQuery(this).parent().toggleClass('active');
                    if (jQuery(window).width() >= 992) Stringfilter();
                    var indexTitle = jQuery(this).parents('.filter_group').index();
                    if (jQuery(this).parents('.filter_group').find('li.active').length > 0) {
                        var textFilter = [];
                        jQuery(this).parents('.filter_group').find('li.active').each(function() {
                            var textVal = $(this).find('label').html();
                            textFilter.push(textVal);
                        });
                        //console.log(textFilter)
                        $('.filter_tags:eq(' + indexTitle + ') b').html(textFilter.join(',')).parent().addClass(
                            'opened');
                        if ($('.filter_tags:not(.filter_tags_remove_all).opened').length > 1) {
                            $('.filter_tags_remove_all').addClass('opened');
                        }
                    } else {
                        $('.filter_tags:eq(' + indexTitle + ') b').html('').parent().removeClass('opened');
                        $('.filter_tags_remove_all').removeClass('opened');
                    }

                    if ($('.checkbox-list li.active').length == 0) {
                        $('.btn-collection.btn_clear_filter').hide();
                    } else {
                        $('.btn-collection.btn_clear_filter').show();
                    }
                    //console.log($('.checkbox-list li.active').length)
                });
                jQuery('.filter_tags_remove').click(function() {
                    $(this).parent().removeClass('opened').find('b').html();
                    var indexClick = $(this).parent().index();
                    $('.filter_group:eq(' + indexClick + ') li.active input').prop('checked', false);
                    $('.filter_group:eq(' + indexClick + ') li.active').removeClass('active');
                    if ($('.filter_tags:not(.filter_tags_remove_all).opened').length == 1) {
                        $('.filter_tags_remove_all').removeClass('opened');
                    }
                    if ($('.checkbox-list li.active').length == 0) {
                        LoadOrigin();
                        hasChangeSort = false;
                    } else {
                        Stringfilter();
                    }
                });
                jQuery('.filter_tags_remove_all').click(function() {
                    $('.checkbox-list li.active input').prop('checked', false);
                    $('.checkbox-list li.active').removeClass('active');
                    $('.filter_tags b').html('').parent().removeClass('opened');
                    $('.filter_tags_remove_all').removeClass('opened');
                    hasChangeSort = false;
                    LoadOrigin();
                });
                jQuery('.btn_clear_filter').on("click", function() {
                    $('.checkbox-list li.active input').prop('checked', false);
                    $('.checkbox-list li.active').removeClass('active');
                    $('.filter_tags b').html('').parent().removeClass('opened');
                    $('.filter_tags_remove_all').removeClass('opened');
                    $('.btn-collection.btn_clear_filter').hide();
                    hasChangeSort = false;
                    LoadOrigin();
                });
                jQuery('#apply-btn-filter').on("click", function() {
                    if ($('.checkbox-list li.active').length == 0) {
                        var dataSort = $('.checkbox-sortby li.active').find('span').data('value');
                        $('.sort-by li span[data-value="' + dataSort + '"]').trigger('click');
                    } else {
                        Stringfilter();
                    }
                    closeFilterMobile();
                });
                jQuery('#clear-btn-filter').on("click", function() {
                    if ($('.checkbox-list li.active').length == 0) {
                        var originSort = $('.sort-by li.active').find('span').data('value');
                        $('.checkbox-sortby li').removeClass('active');
                        $('.checkbox-sortby li span[data-value="' + originSort + '"]').parent().addClass(
                            'active');
                    } else {
                        $('.checkbox-list li.active input').prop('checked', false);
                        $('.checkbox-list li.active').removeClass('active');
                        $('.filter_tags b').html('').parent().removeClass('opened');
                        $('.filter_tags_remove_all').removeClass('opened');
                        hasChangeSort = false;
                        LoadOrigin();
                    }
                    closeFilterMobile();
                });

                var Stringfilter = function() {
                    var q = "",
                        gia = "",
                        vendor = "",
                        color = "",
                        size = "",
                        sortBy = "";
                    var handle_coll = $('#coll-handle').val();

                    var pathName = window.location.pathname;
                    if (pathName.indexOf('vendors') > -1) {
                        handle_coll = '(vendor:product contains ' + paramUrl.q.replaceAll('-', ' ') + ')';
                        //console.log(handle_coll)
                    }
                    if (pathName.indexOf('types') > -1) {
                        handle_coll = '(product_type:product=' + paramUrl.q.replaceAll('-', ' ') + ')';
                    }
                    var str_url = 'filter=';
                    q = "(" + handle_coll;

                    jQuery('.filter-price ul.checkbox-list li.active').each(function() {
                        gia = gia + jQuery(this).find('input').data('price') + '||';
                    })
                    gia = gia.substring(0, gia.length - 2);
                    if (gia != "") {
                        gia = '(' + gia + ')';
                        q += '&&' + gia;
                    }

                    jQuery('.filter-brand ul.checkbox-list li.active').each(function() {
                        vendor = vendor + jQuery(this).find('input').data('vendor') + '||';
                    })
                    vendor = vendor.substring(0, vendor.length - 2);
                    if (vendor != "") {
                        vendor = '(' + vendor + ')';
                        q += '&&' + vendor;
                    }

                    jQuery('.filter-color ul.checkbox-list li.active').each(function() {
                        color = color + jQuery(this).find('input').data('color') + '||';
                        //size2 = size2 + jQuery(this).data('s') + '--';
                    })
                    color = color.substring(0, color.length - 2);
                    if (color != "") {
                        color = '(' + color + ')';
                        q += '&&' + color;
                    }
                    jQuery('.filter-size ul.checkbox-list li.active').each(function() {
                        size = size + jQuery(this).find('input').data('size') + '||';
                    })
                    size = size.substring(0, size.length - 2);
                    if (size != "") {
                        size = '(' + size + ')';
                        q += '&&' + size;
                    }
                    if ($('.sort-by').length > 0) {
                        $('.sort-by li').each(function() {
                            if ($(this).hasClass('active')) {
                                if ($(this).find('span').data('value') == 'manual') {
                                    sortBy = '';
                                } else {
                                    sortBy = '&sortby=' + $(this).find('span').data('filter');
                                }
                            }
                        });
                        sortByPicked = sortBy;
                    }
                    //console.log(str_url + q)
                    str_url += encodeURIComponent(q) + ")";
                    str = str_url;

                    jQuery.ajax({ // lấy tổng số trang của kết quả filter
                        url: "/search?q=" + str_url + "&view=pagesize",
                        async: false,
                        success: function(data) {
                            data = JSON.parse(data);
                            total_page = parseInt(data.pages);
                            total_product = parseInt(data.products);
                            callbackFitler();
                        }
                    })
                    if (cur_page <= total_page) {
                        jQuery.ajax({
                            url: "/search?q=" + str_url + "&view=filter" + sortBy,
                            success: function(data) {
                                setTimeout(function() {
                                    $(".product-noloop").remove();
                                    $(".listProduct-filter").html('');
                                    $(".listProduct-filter").html(data);
                                    $('.title-count b').html(total_product);
                                    callbackFitler();
                                    if (productReviewsApp && productReviewsProloop) {
                                        ProductReviews.init();
                                    }
                                    if (promotionApp) {
                                        if (promotionApp_name == 'app_combo') {
                                            comboApp.showGiftLabel();
                                        } else {
                                            buyXgetY.showGiftLabel();
                                        }
                                    }
                                    if ($(window).width() > 1200) {
                                        $('[data-toggle="popover"]').popover({
                                            container: 'body'
                                        })
                                    }
                                    if (total_page > 1) {
                                        $('.wraplist-collection .collection-loadmore').addClass(
                                            'loadmore-filter').show();
                                        $('.wraplist-collection .collection-loadmore a').attr(
                                            'data-page', cur_page + 1);
                                    } else {
                                        $('.wraplist-collection .listProduct-filter').siblings(
                                            ':not(h3)').hide();
                                    }
                                }, 300);
                            }
                        });
                    } else {
                        jQuery(".listProduct-filter").html('');
                        jQuery(".listProduct-filter").append(
                            '<div class="col-md-12 product-noloop"><div class="collection-alert-no"><p>Không tìm thấy kết quả. Vui lòng thử lại!</p></div></div>'
                            );
                        jQuery('.wraplist-collection .collection-loadmore').hide();
                        jQuery(".title-count b").html("0");
                    }
                    var x = $('#collection-body').offset().top;
                    HRT.All.smoothScroll(x, 500);
                }
                var LoadOrigin = function() {
                    var view = "?view=data",
                        pageView = '?view=pagesize';
                    cur_page = 1;
                    var collectionHd = "/collections/dien-thoai";
                    var urlQuery = collectionHd + view;

                    var pathName = window.location.pathname;
                    if (pathName.indexOf('vendors') > -1 || pathName.indexOf('types') > -1) {
                        collectionHd = pathName + '?q=' + paramUrl.q;
                        urlQuery = pathName + '?q=' + paramUrl.q + view.replace('?', '&');
                    }

                    if ($('.sort-by').length > 0) {
                        $('.sort-by li').each(function() {
                            if ($(this).hasClass('active')) {
                                if ($(this).find('span').data('value') == 'manual') {
                                    sortBy = '';
                                } else {
                                    sortBy = '&sort_by=' + $(this).find('span').data('value');
                                }
                            }
                        });
                        sortByPicked = sortBy;
                    }

                    $.ajax({
                        url: collectionHd + (collectionHd.indexOf('?') > -1 ? pageView.replace('?', '&') :
                            pageView),
                        type: 'GET',
                        async: false,
                        success: function(data) {
                            data = JSON.parse(data);
                            total_page = parseInt(data.pages);
                            total_product = parseInt(data.products);
                            callbackFitler();
                        }
                    });

                    $.ajax({
                        url: urlQuery + '&page=' + cur_page + sortByPicked,
                        type: 'GET',
                        async: false,
                        success: function(data) {
                            $('.wraplist-collection .listProduct-filter').html('');
                            if (cur_page >= total_page && total_page > 1) {
                                $('.wraplist-collection .listProduct-filter').siblings(':not(h3)')
                                .hide();
                            } else {
                                setTimeout(function() {
                                    $('.wraplist-collection .listProduct-filter').append(data)
                                        .addClass('loaded');
                                    $('.title-count b').html(total_product);
                                    $('.collection-loadmore .btn-loadmore').attr('data-page',
                                        cur_page + 1);
                                    $('.collection-loadmore').find('.btn-loadmore').removeClass(
                                        'btn-loading')
                                    $('.collection-loadmore').show();
                                    callbackFitler();
                                    if (productReviewsApp && productReviewsProloop) {
                                        ProductReviews.init();
                                    }
                                    if (promotionApp) {
                                        if (promotionApp_name == 'app_combo') {
                                            comboApp.showGiftLabel();
                                        } else {
                                            buyXgetY.showGiftLabel();
                                        }
                                    }
                                    if ($(window).width() > 1200) {
                                        $('[data-toggle="popover"]').popover({
                                            container: 'body'
                                        })
                                    }
                                }, 400);
                            }
                        }
                    });

                    var x = $('#collection-body').offset().top;
                    HRT.All.smoothScroll(x, 500);
                }
                $(document).on("click", "#collection-body .collection-loadmore .btn-loadmore:not(.btn-loading)",
                    function(e) {
                        e.preventDefault();
                        $(this).addClass('btn-loading');
                        var btn = $(this);
                        var view = "?view=data",
                            pageView = '?view=pagesize';
                        var link = parseInt($(this).attr("data-page"));
                        var collectionHd = "/collections/dien-thoai";
                        var urlQuery = collectionHd + view;
                        var pathName = window.location.pathname;

                        if (pathName.indexOf('vendors') > -1 || pathName.indexOf('types') > -1) {
                            collectionHd = pathName + '?q=' + paramUrl.q;
                            urlQuery = pathName + '?q=' + paramUrl.q + view.replace('?', '&');
                        }

                        if ($('.sort-by').length > 0) {
                            if ($('.sort-by li.active').length > 0) {
                                if ($('.sort-by li.active').find('span').data('value') == 'manual') {
                                    sortBy = '';
                                } else {
                                    if ((hasChangeSort) || $('.checkbox-list li.active').length > 0) {
                                        sortBy = '&sortby=' + $('.sort-by li.active').find('span').data('filter');
                                    } else {
                                        sortBy = '&sort_by=' + $('.sort-by li.active').find('span').data('value');
                                    }
                                }
                            } else {
                                sortBy = '';
                            }
                            sortByPicked = sortBy;
                        }

                        if ((activeFilter && $('.checkbox-list li.active').length == 0 && hasChangeSort == false) ||
                            (!activeFilter && activeSort && hasChangeSort == false)) {
                            $.ajax({
                                url: collectionHd + (collectionHd.indexOf('?') > -1 ? pageView.replace('?',
                                    '&') : pageView),
                                type: 'GET',
                                async: false,
                                success: function(data) {
                                    data = JSON.parse(data);
                                    total_page = parseInt(data.pages);
                                    callbackFitler();
                                }
                            });

                            $.ajax({
                                url: urlQuery + '&page=' + link + sortByPicked,
                                type: 'GET',
                                async: false,
                                success: function(data) {
                                    setTimeout(function() {
                                        $('.wraplist-collection .listProduct-filter').append(
                                            data).addClass('loaded');
                                        $('.collection-loadmore').find('.btn-loadmore')
                                            .removeClass('btn-loading');
                                        callbackFitler();
                                        if (productReviewsApp && productReviewsProloop) {
                                            ProductReviews.init();
                                        }
                                        if (promotionApp) {
                                            if (promotionApp_name == 'app_combo') {
                                                comboApp.showGiftLabel();
                                            } else {
                                                buyXgetY.showGiftLabel();
                                            }
                                        }
                                        if ($(window).width() > 1200) {
                                            $('[data-toggle="popover"]').popover({
                                                container: 'body'
                                            })
                                        }

                                        if (link == 1) {
                                            $('.wraplist-collection .listProduct-filter').html(
                                                '');
                                        }
                                        if (link >= total_page) {
                                            $('.wraplist-collection .listProduct-filter')
                                                .siblings(':not(h3)').hide();
                                        }
                                    }, 400);
                                }
                            });
                            $(this).attr('data-page', link + 1);
                        } else {
                            jQuery.ajax({
                                url: "/search?q=" + str + "&view=filter" + sortByPicked + '&page=' + link,
                                success: function(data) {
                                    jQuery(".product-noloop").remove();
                                    setTimeout(function() {
                                        $('.wraplist-collection .listProduct-filter').append(
                                            data).addClass('loaded');
                                        $('.collection-loadmore').find('.btn-loadmore')
                                            .removeClass('btn-loading');
                                        callbackFitler();
                                        if (productReviewsApp && productReviewsProloop) {
                                            ProductReviews.init();
                                        }
                                        if (promotionApp) {
                                            if (promotionApp_name == 'app_combo') {
                                                comboApp.showGiftLabel();
                                            } else {
                                                buyXgetY.showGiftLabel();
                                            }
                                        }
                                        if (link >= total_page && total_page > 1) {
                                            $('.wraplist-collection .listProduct-filter')
                                                .siblings(':not(h3)').hide();
                                        } else {
                                            btn.attr('data-page', link + 1);
                                        }
                                        if ($(window).width() > 1200) {
                                            $('[data-toggle="popover"]').popover({
                                                container: 'body'
                                            })
                                        }
                                    }, 400);
                                }
                            });
                        }
                    });
                $(document).on('click', '.heading-box .title-filter', function(e) {
                    e.preventDefault();
                    $(".layered_filter_parent").append('<div class="overlays-rgba"></div>');
                    $('.collection-filter').find('.layered_filter_parent').fadeIn(100);
                    $('.collection-filter').find('.layered_filter_parent').addClass('show-filter');
                });
                $(document).on('click', '.layered_filter_parent .close_filter,.layered_filter_parent .overlays-rgba',
                    function(e) {
                        e.preventDefault();
                        if ($('.checkbox-list li.active').length == 0) {
                            var originSort = $('.sort-by li.active').find('span').data('value');
                            $('.checkbox-sortby li').removeClass('active');
                            $('.checkbox-sortby li span[data-value="' + originSort + '"]').parent().addClass(
                                'active');
                        }
                        closeFilterMobile();
                    });
            });

            function callbackFitler() {
                Haravan.getCart(function(cart) {
                    cart.items.map(function(item) {
                        $('[data-handle="' + item.handle + '"]').addClass('action-count');
                        $('[data-handle="' + item.handle + '"] input').val(item.quantity);
                    });
                });
            }
        </script>
    </main>
@endsection

@push('script')
    <script>
        app.controller('ProductCategoryController', function($scope, $http) {
            $scope.category = @json($category ?? null);
            $scope.filter_sort = 'asc';
            $scope.filterSort = function(sort) {
                $scope.filter_sort = sort;
                $scope.filter();
            }
            $scope.filter_tag = [];
            $scope.onChangeFilter = function(id) {
                if ($scope.filter_tag.includes(id)) {
                    $scope.filter_tag = $scope.filter_tag.filter(function(item) {
                        return item !== id;
                    });
                } else {
                    $scope.filter_tag.push(id);
                }
                $scope.filter();
            }

            $scope.filter = function() {
                $.ajax({
                    url: '{{ route('front.filter-product') }}',
                    type: 'GET',
                    data: {
                        sort: $scope.filter_sort,
                        category: $scope.category.id,
                        cate_slug: $scope.category.slug,
                        tag: $scope.filter_tag,
                    },
                    success: function(response) {
                        $('#product-list').html(response.html);
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function() {}
                });
            }

            $scope.filterCategory = function(slug) {
                url = '{{ route('front.show-product-category', ['categorySlug' => ':categorySlug']) }}'
                    .replace(
                        ':categorySlug', slug);
                window.location.href = url;
            }
        });
    </script>
@endpush
