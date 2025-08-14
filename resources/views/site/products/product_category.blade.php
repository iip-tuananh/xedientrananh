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
    <main class="wrapperMain_content" ng-controller="ProductCategoryController" ng-cloak>
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
                                                                        data-filter="(price:product=asc)" ng-click="filterSort('price-asc')">Giá: Tăng
                                                                        dần</span></li>
                                                                <li><span data-value="price-descending"
                                                                        data-filter="(price:product=desc)" ng-click="filterSort('price-desc')">Giá: Giảm
                                                                        dần</span></li>
                                                                <li><span data-value="title-ascending"
                                                                        data-filter="(title:product=asc)" ng-click="filterSort('alpha-asc')">Tên: A-Z</span>
                                                                </li>
                                                                <li><span data-value="title-descending"
                                                                        data-filter="(title:product=desc)" ng-click="filterSort('alpha-desc')">Tên: Z-A</span>
                                                                </li>
                                                                <li><span data-value="created-ascending"
                                                                        data-filter="(updated_at:product=asc)" ng-click="filterSort('created-asc')">Cũ
                                                                        nhất</span></li>
                                                                <li class="active"><span data-value="created-descending"
                                                                        data-filter="(updated_at:product=desc)" ng-click="filterSort('created-desc')">Mới
                                                                        nhất</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./filter brand -->
                                                @foreach ($attributes as $attribute)
                                                    @if ($attribute->tags->count() > 0)
                                                        <div class="filter_group" aria-expanded="false">
                                                            <div class="filter_group_block">
                                                                <div class="filter_group-subtitle">
                                                                    <span>{{ $attribute->name }}</span>
                                                                </div>
                                                                <div class="filter_group-content filter-brand">
                                                                    <ul class="checkbox-list">
                                                                        @foreach ($attribute->tags as $tag)
                                                                        <li>
                                                                            <input type="checkbox" id="data-brand-p{{ $tag->id }}"
                                                                                value="{{ $tag->code }}" name="brand-filter" data-text="{{ $tag->name }}"
                                                                                data-vendor="(vendor:product contains {{ $tag->code }})" ng-click="onChangeFilter({{ $tag->id }})"/>
                                                                            <label for="data-brand-p{{ $tag->id }}">{{ $tag->name }}</label>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <!-- ./filter price -->
                                                {{-- <div class="filter_group" aria-expanded="false">
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
                                                </div> --}}
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
                                            data-src="{{$category->banner ? $category->banner->path : "https://placehold.co/1920x400"}}"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                            alt="{{ $title }}" />
                                    </div>
                                    <div class="collection-heading__content">
                                        <div class="dFlex-row">
                                            <div class="heading-box">
                                                <h1 class="title">
                                                    {{ $title }}
                                                </h1>
                                                <div class="filter-box">
                                                    <span class="title-count"><b>{{ $products->total() }}</b> sản phẩm</span>
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
                                                            <li><span data-value="price-ascending"
                                                                    data-filter="(price:product=asc)" ng-click="filterSort('price-asc')">Giá: Tăng dần</span>
                                                            </li>
                                                            <li><span data-value="price-descending"
                                                                    data-filter="(price:product=desc)" ng-click="filterSort('price-desc')">Giá: Giảm dần</span>
                                                            </li>
                                                            <li><span data-value="title-ascending"
                                                                    data-filter="(title:product=asc)" ng-click="filterSort('alpha-asc')">Tên: A-Z</span></li>
                                                            <li><span data-value="title-descending"
                                                                    data-filter="(title:product=desc)" ng-click="filterSort('alpha-desc')">Tên: Z-A</span></li>
                                                            <li><span data-value="created-ascending"
                                                                    data-filter="(updated_at:product=asc)" ng-click="filterSort('created-asc')">Cũ nhất</span>
                                                            </li>
                                                            <li><span data-value="created-descending"
                                                                    data-filter="(updated_at:product=desc)" ng-click="filterSort('created-desc')">Mới nhất</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="collection-filter-tags">
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
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="wraplist-collection" id="product-list">
                                    <div class="row listProduct-row listProduct-filter">
                                        @foreach ($products as $product)
                                        <div class="col-lg-3 col-md-6 col-6 product-loop" data-id="{{ $product->id }}">
                                            @include('site.products.product_item', ['product' => $product])
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="collection-loadmore text-center">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        // Stringfilter();
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
                    // if (jQuery(window).width() >= 992) Stringfilter();
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
                        // Stringfilter();
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
                        // Stringfilter();
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

        </script>
    </main>
@endsection

@push('scripts')
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
