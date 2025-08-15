@extends('site.layouts.master')
@section('title')
    Giỏ hàng
@endsection

@section('css')
    <link href="/site/css/breadcrumb.scss.css?1749442635129" rel="stylesheet" type="text/css" media="all"/>
    <link href="/site/css/cart_style.scss.css?1749442635129" rel="stylesheet" type="text/css" media="all"/>
@endsection

@section('content')
    <div class="mainBody-theme-container mainBody-modalshow    mainBody-cart   layoutProduct_scroll "  ng-controller="cartPage">

        <div class="section-main ">

            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <main class="wrapperMain_content">

            <div id="layout-cart" >
                <div class="breadcrumb-shop">
                    <div class="container">
                        <div class="breadcrumb-list  ">
                            <ol class="breadcrumb breadcrumb-arrows" itemscope
                                itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="{{route('front.home-page')}}" target="_self" itemprop="item"><span
                                            itemprop="name">Trang chủ</span></a>
                                    <meta itemprop="position" content="1"/>
                                </li>

                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
                                    <span itemprop="item" content="cart.html"><strong
                                            itemprop="name">Giỏ hàng (<% countItem %>)</strong></span>
                                    <meta itemprop="position" content="2"/>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="wrapper-mainCart">
                    <div class="content-bodyCart">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-12 contentCart-detail">
                                    <div class="mainCart-detail">
                                        <h1 class="heading-cart">Giỏ hàng của bạn</h1>

                                        <div class="list-pageform-cart">
                                            <form a method="post" id="cartformpage">
                                                <div class="cart-row">
                                                    <p class="title-number-cart">
                                                        Bạn đang có <strong class="count-cart"><% countItem %> sản phẩm</strong> trong giỏ hàng
                                                    </p>
                                                    <div class="table-cart"  ng-if="checkCart">
                                                        <div class="media-line-item line-item"  ng-repeat="item in items">
                                                            <div class="media-left">
                                                                <div class="item-img">
                                                                    <a href="/san-pham/<% item.attributes.product_slug %>.html">
                                                                        <img src="<% item.attributes.image %>" alt="<% item.name %>">
                                                                    </a>
                                                                </div>
                                                                <div class="item-remove">
                                                                    <a href="javascript:void(0)" class="cart" ng-click="removeItem(item.id)">Xóa</a>
                                                                </div>
                                                            </div>
                                                            <div class="media-right">
                                                                <div class="item-info">
                                                                    <h3 class="item--title"><a href="/san-pham/<% item.attributes.product_slug %>.html"><% item.name %></a></h3>

                                                                    <div class="item--variant">
                                                                        <span><% item.attributes.variant_name %></span>
                                                                    </div>

                                                                </div>
                                                                <div class="item-price">
                                                                    <p>
                                                                        <span><% item.price | number %>₫</span>

                                                                        <del ng-if="item.base_price > 0"><% item.base_price | number %>₫</del>

                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="media-total">
                                                                <div class="item-total-price">
                                                                    <div class="price">
                                                                        <span class="line-item-total"><% (item.price * item.quantity) | number %>₫</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-qty">
                                                                    <div class="qty quantity-partent qty-click clearfix">
                                                                        <button type="button" class="qtyminus qty-btn" ng-click="decrementQuantity(item); changeQty(item.quantity, item)">
                                                                            <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <rect height="1" width="18" y="9" x="1"></rect></svg>
                                                                        </button>
                                                                        <input type="text"  name="updates[]" min="1" line="1" ng-model="item.quantity" readonly="" class="tc line-item-qty item-quantity">
                                                                        <button type="button" class="qtyplus qty-btn" ng-click="incrementQuantity(item); changeQty(item.quantity, item)">
                                                                            <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <rect x="9" y="1" width="1" height="17"></rect> <rect x="1" y="9" width="17" height="1"></rect></svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

{{--                                                        <div class="media-line-item line-item" data-variant-id="1086987189" data-product-id="1039990494">--}}
{{--                                                            <div class="media-left">--}}
{{--                                                                <div class="item-img">--}}
{{--                                                                    <a href="/products/ipad-pro-10-5-inch-32gb">--}}
{{--                                                                        <img src="  //product.hstatic.net/200000516791/product/7a7f_516eeeb1b00f456ab484b9d6d49cde32_1e013add2f444e77b8bcffb2275b496e_cc414ac9b27e4f73951b145192151580_medium.jpg" alt="iPad Pro 10.5 inch 32GB">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="item-remove">--}}
{{--                                                                    <a href="javascript:void(0)" onclick="HRT.Cart.removeItemCart(this,'/cart/change?line=1&amp;quantity=0')" class="cart">Xóa</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="media-right">--}}
{{--                                                                <div class="item-info">--}}
{{--                                                                    <h3 class="item--title"><a href="/products/ipad-pro-10-5-inch-32gb">iPad Pro 10.5 inch 32GB</a></h3>--}}

{{--                                                                    <div class="item--variant">--}}
{{--                                                                        <span>Đen</span>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                                <div class="item-price">--}}
{{--                                                                    <p>--}}
{{--                                                                        <span>13,450,000₫</span>--}}

{{--                                                                        <del>13,999,000₫</del>--}}

{{--                                                                    </p>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="media-total">--}}
{{--                                                                <div class="item-total-price">--}}
{{--                                                                    <div class="price">--}}
{{--                                                                        <span class="line-item-total">13,450,000₫</span>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="item-qty">--}}
{{--                                                                    <div class="qty quantity-partent qty-click clearfix">--}}
{{--                                                                        <button type="button" class="qtyminus qty-btn">--}}
{{--                                                                            <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <rect height="1" width="18" y="9" x="1"></rect></svg>--}}
{{--                                                                        </button>--}}
{{--                                                                        <input type="text" size="4" name="updates[]" min="1" oriprice="1345000000" line="1" productid="1039990494" variantid="1086987189" id="updates_1086987189" data-price="1345000000" value="1" readonly="" class="tc line-item-qty item-quantity">--}}
{{--                                                                        <button type="button" class="qtyplus qty-btn">--}}
{{--                                                                            <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <rect x="9" y="1" width="1" height="17"></rect> <rect x="1" y="9" width="17" height="1"></rect></svg>--}}
{{--                                                                        </button>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

                                                    </div>
                                                </div>
                                                <div class="cart-row">
                                                    <div class="order-noted-block">
                                                        <div class="container-pd15">
                                                            <div class="checkout-buttons clearfix">
                                                                <label for="note" class="note-label">Ghi chú đơn hàng</label>
                                                                <textarea class="form-control" id="note" name="note" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 sidebarCart-sticky">
                                    <div class="wrap-order-summary">
                                        <div class="order-summary-block">
                                            <h2 class="summary-title">Thông tin đơn hàng</h2>



                                            <div class="summary-total">
                                                <p>Tổng tiền: <span><% total | number%>₫</span></p>
                                            </div>
                                            <div class="summary-action">
                                                <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                                                <p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                                            </div>
                                            <div class="summary-button">
                                                <a id="btnCart-checkout" class="checkout-btn btnred <% ! checkCart  ? 'disabled' : ''%>"
                                                   data-price-min="400000"
                                                   data-price-total="0"
                                                   href="{{ route('cart.checkout') }}">THANH TOÁN </a>
                                            </div>

                                            <div class="summary-button">
                                                <a id="btnCart-checkout" class="checkout-btn btnred <% ! checkCart  ? 'disabled' : ''%>"
                                                   data-price-min="400000"
                                                   data-price-total="0"
                                                   href="{{ route('cart.finance') }}">Mua trả góp online</a>
                                            </div>
                                        </div>
                                        <div class="order-summary-block order-summary-notify ">
                                            <div class="summary-warning alert-order">
                                                <p class="textmr"><strong>Chính sách mua hàng</strong>:</p>
                                                <p>Hiện chúng tôi chỉ áp dụng thanh toán với đơn hàng có giá trị tối
                                                    thiểu <strong>400.000₫ </strong> trở lên.</p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </main>



    </div>

@endsection

@push('scripts')
    <script>
        app.controller('cartPage', function ($rootScope, $scope, $sce, $interval, cartItemSync) {
            $scope.items = @json($cartCollection);
            $scope.total = "{{$total_price}}";
            $scope.checkCart = true;

            $scope.countItem = "{{$count}}";

            jQuery(document).ready(function () {
                if ($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }
            })

            $scope.incrementQuantity = function (product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function (product) {
                product.quantity = Math.max(product.quantity - 1, 0);
            };


            $scope.changeQty = function (qty, item) {
                updateCart(qty, item)
            }

            function updateCart(qty, item) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{route('cart.update.item')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        product_id: item.id,
                        variant_id: item.attributes.variant_id,
                        qty: qty
                    },
                    beforeSend: function() {
                        jQuery('.loading-spin').show();
                        // showOverlay();
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.countItem = response.count;

                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        jQuery('.loading-spin').hide();
                        // hideOverlay();
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeItem = function (product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.countItem = response.count;

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            function showOverlay() {
                var overlay = document.getElementById('overlay');
                overlay.style.display = 'flex';
            }

            function hideOverlay() {
                var overlay = document.getElementById('overlay');
                overlay.style.display = 'none';
            }
        })

    </script>
@endpush
