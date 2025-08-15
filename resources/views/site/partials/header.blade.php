<div id="templateHeader" ng-controller="headerPartial">
    <div class="mainHeader--height">
        <style>
            .topbar-banner{
                position: relative;
                width: 100vw;
                margin-left: calc(50% - 50vw);
                margin-right: calc(50% - 50vw);
                line-height: 0;            /* bỏ khoảng trắng dưới ảnh inline */
                z-index: 50;
            }
            .topbar-banner picture,
            .topbar-banner img{
                display: block;
                width: 100%;
                height: 56px;              /* chỉnh theo ý bạn */
                object-fit: cover;         /* phủ kín ngang, cắt bớt chiều cao nếu cần */
                border-radius: 0;
            }

            /* Nút đóng */
            .topbar-banner .close-icon{
                position: absolute;
                top: 8px; right: 8px;
                width: 28px; height: 28px;
                display: grid; place-items: center;
                background: rgba(0,0,0,.35);
                border-radius: 999px;
                cursor: pointer;
            }
            .topbar-banner .close-icon svg{ width: 14px; height: 14px; }



            @media (max-width: 767.98px){
                .topbar-banner{
                    position: relative;
                    width: 100vw;
                    margin-left: calc(50% - 50vw);
                    margin-right: calc(50% - 50vw);
                    line-height: 0;
                    z-index: 50;
                }

                .topbar-banner a{ display:block; }
                .topbar-banner picture,
                .topbar-banner img{
                    display:block;
                    width:100%;
                    height:52px;              /* chỉnh 46–60px tùy mắt */
                    object-fit:cover;         /* phủ kín, cắt bớt phần thừa */
                }

                /* Gradient nhẹ bên phải để nút đóng nổi hơn */
                .topbar-banner::after{
                    content:"";
                    position:absolute;
                    top:0; right:0; bottom:0;
                    width:96px;
                    background:linear-gradient(90deg, transparent 0, rgba(0,0,0,.18) 100%);
                    pointer-events:none;
                }

                /* Nút đóng lớn, dễ bấm */
                .topbar-banner .close-icon{
                    position:absolute;
                    top:6px;
                    right:max(6px, env(safe-area-inset-right));
                    width:32px; height:32px;
                    display:grid; place-items:center;
                    border-radius:999px;
                    background:rgba(0,0,0,.45);
                    box-shadow:0 2px 10px rgba(0,0,0,.15);
                    cursor:pointer;
                    -webkit-tap-highlight-color:transparent;
                }
                .topbar-banner .close-icon svg{ width:16px; height:16px; }

                /* Màn rất nhỏ */
                @media (max-width: 360px){
                    .topbar-banner img{ height:46px; }
                    .topbar-banner .close-icon{
                        width:28px; height:28px; top:4px; right:max(4px, env(safe-area-inset-right));
                    }
                    .topbar-banner .close-icon svg{ width:14px; height:14px; }
                }
            }

            /* (Tuỳ chọn) muốn dính trên cùng khi cuộn thì thêm class .sticky vào .topbar-banner */
            .topbar-banner.sticky{ position: sticky; top: 0; }


        </style>
        <header class="mainHeader  mainHeader_temp03  " id="site-header">
            <div class="topbar-banner text-center">
                <a href="/collections/all">
                    <picture>
                        <source media="(max-width: 767px)"
                            srcset="{{$bannerTop->image->path ?? ''}}" />
                        <source media="(min-width: 768px)"
                            srcset="{{$bannerTop->image->path ?? ''}}" />
                        <img class="lazyload"
                            data-src="{{$bannerTop->image->path ?? ''}}"
                            src="{{$bannerTop->image->path ?? ''}}"
                            alt="banner-topbar" />
                    </picture>
                </a>
                <span class="close-icon">
                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.81304 5.75263C6.52015 5.45974 6.04528 5.45974 5.75238 5.75263C5.45949 6.04552 5.45949 6.5204 5.75238 6.81329L10.8789 11.9398L5.75241 17.0663C5.45952 17.3592 5.45952 17.8341 5.75241 18.127C6.0453 18.4199 6.52018 18.4199 6.81307 18.127L11.9396 13.0005L17.0661 18.127C17.359 18.4199 17.8339 18.4199 18.1268 18.127C18.4196 17.8341 18.4196 17.3592 18.1268 17.0663L13.0002 11.9398L18.1268 6.81329C18.4197 6.5204 18.4197 6.04552 18.1268 5.75263C17.8339 5.45974 17.359 5.45974 17.0661 5.75263L11.9396 10.8792L6.81304 5.75263Z"
                            fill="#ffffff"></path>
                    </svg>
                </span>
            </div>
            <div class="site-header-top">
                <div class="container-fluid">
                    <div class="box-content d-flex align-items-center justify-content-between">
                        <div class="box-left d-flex flex-wrap align-items-center">
                            <div class="hotline">
                                <span>Hotline: <b>{{ $config->hotline }}</b> {{ $config->working_time }}</span>
                            </div>
                        </div>
                        <div class="box-right">
                            <ul class="d-flex align-items-center">
                                <li>
                                    <a href="{{ route('front.contact-us') }}" title="Liên hệ">
                                        Liên hệ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainHeader-middle">
                <div class="container-fluid container-pd">
                    <div class="flex-container-header">
                        <div class="header-wrap-iconav header-wrap-action">
                            <div class="header-action">
                                <div class="header-action-item header-action_menu header-menu-parent">
                                    <div class="header-action_text">
                                        <a class="header-action__link menu-parent__clicked" href="javascript:void(0)"
                                            rel="nofollow" id="site-menu-handle" aria-label="Menu" title="Menu">
                                            <span class="box-icon">
                                                <span class="hamburger-menu" aria-hidden="true">
                                                    <span class="bar"></span>
                                                </span>
                                                <span class="box-icon--close">
                                                    <svg viewBox="0 0 19 19" role="presentation">
                                                        <path
                                                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                            fill-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                            <span class="box-tmenu">MENU</span>
                                        </a>
                                        <span class="box-triangle">
                                            <svg viewBox="0 0 20 9" role="presentation">
                                                <path
                                                    d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                                    fill="#ffffff"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-wrap-logo">
                            <div class="wrap-logo">
                                <a href="{{ route('front.home-page') }}">
                                    <img src="{{ $config->image ? $config->image->path : 'https://placehold.co/100x100' }}"
                                        alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="header-wrap-search">
                            <div class="header-search">
                                <div class="search-box wpo-wrapper-search">
                                    <form action="{{ route('front.search') }}" method="get"
                                        class="searchform-product searchform-categoris ultimate-search">
                                        <div class="wpo-search-inner">
                                            <input required id="inputSearchAuto-3" class="input-search" name="keyword"
                                                maxlength="40" autocomplete="off" type="text" size="20"
                                                placeholder="Tìm kiếm sản phẩm...">
                                        </div>
                                        <button type="submit" class="btn-search btn">
                                            <svg class="svg search" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;"
                                                xml:space="preserve">
                                                <path
                                                    d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                                </path>
                                                <rect x="17" y="17"
                                                    transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                                    width="4" height="8"></rect>
                                            </svg>
                                        </button>
                                    </form>
                                    <div id="ajaxSearchResults-3" class="smart-search-wrapper ajaxSearchResults"
                                        style="display: none">
                                        <div class="resultsContent"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-wrap-action">
                            <div class="header-action">
                                <div class="header-action-item header-action_search">
                                    <div class="header-action_text">
                                        <button class="header-action__link header-action_clicked"
                                            id="site-search-handle" aria-label="Tìm kiếm" title="Tìm kiếm"
                                            type="button">
                                            <span class="box-icon">
                                                <svg class="svg-ico-search" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="Capa_1" x="0px" y="0px" viewBox="0 0 451 451"
                                                    style="enable-background:new 0 0 451 451;" xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3   s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4   C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3   s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                <span class="box-icon--close">
                                                    <svg viewBox="0 0 19 19" role="presentation">
                                                        <path
                                                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                            fill-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="header-action-item header-action_cart">
                                    <div class="header-action_text">
                                        <button class="header-action__link  header-action_clicked "
                                            id="site-cart-handle" aria-label="Giỏ hàng" title="Giỏ hàng"
                                            type="button">
                                            <span class="box-icon">
                                                <svg width="20px" height="20px" viewBox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g transform="translate(0 512) scale(.1 -.1)">
                                                        <path
                                                            d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z" />
                                                        <path
                                                            d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z" />
                                                    </g>
                                                </svg>
                                                <span class="box-icon--close">
                                                    <svg viewBox="0 0 19 19" role="presentation">
                                                        <path
                                                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                            fill-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span class="count-holder">
                                                    <span class="count"><% cart.count %></span>
                                                </span>
                                            </span>
                                            <span class="box-text">
                                                <span class="txtbl">Giỏ hàng</span>
                                            </span>
                                        </button>

                                        <style>
                                            .icon-compare { display:inline-block; vertical-align:middle; height: 50px !important; }
                                            .btn-compare .box-icon { line-height:0; }
                                            .btn-compare { color:#252a2b !important; }           /* hoặc màu bạn muốn */
                                            .btn-compare:hover { color:#ffd200; }  /* màu hover */

                                        </style>


                                        <a href="{{ route('compare.index') }}">
                                            <button class="header-action__link  btn-compare"
                                                    id="site-cart-handle" aria-label="Giỏ hàng" title="so sánh"
                                                    type="button">
                                            <span class="box-icon">
                                              <svg class="icon-compare" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
  <rect x="3"  y="7" width="11" height="11" rx="2" ry="2" fill="currentColor" opacity="0.8"/>
  <rect x="10" y="3" width="11" height="11" rx="2" ry="2" fill="currentColor"/>
</svg>


                                                <span class="box-icon--close">
                                                    <svg viewBox="0 0 19 19" role="presentation">
                                                        <path
                                                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                            fill-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                <span class="count-holder">
                                                    <span class="count"><% compareItems.count %></span>
                                                </span>
                                            </span>
                                                <span class="box-text">
                                                <span class="txtbl">So sánh</span>
                                            </span>
                                            </button>
                                        </a>
                                    </div>



                                    <div class="header-action_dropdown">
                                        <div class="header-dropdown_content" ng-if="!cart.count">
                                            <div class="sitenav-content sitenav-cart">
                                                <p class="boxtitle">Giỏ hàng</p>
                                                <div class="cart-view clearfix">
                                                    <div class="cart-view-scroll">
                                                        <table class="clone-item-cart table-clone-cart">
                                                            <tr class="mini-cart__item d-none">
                                                                <td class="mini-cart__left"><a class="mnc-link"
                                                                        href="#" title=""><img
                                                                            src="/" alt="" /></a></td>
                                                                <td class="mini-cart__right">
                                                                    <p class="mini-cart__title">
                                                                        <a class="mnc-title mnc-link" href="#"
                                                                            title=""></a>
                                                                        <span class="mnc-variant"> </span>
                                                                    </p>
                                                                    <div class="mini-cart__quantity">
                                                                        <button class="qty-btn mnc-minus">
                                                                            <svg width="18" height="18"
                                                                                viewBox="0 0 20 20"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <rect height="1" width="18"
                                                                                    y="9" x="1"></rect>
                                                                            </svg>
                                                                        </button>
                                                                        <input class="qty-value" type="text"
                                                                            readonly="" name="mnc-quantity"
                                                                            value="">
                                                                        <button class="qty-btn mnc-plus">
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
                                                                    <div class="mini-cart__price">
                                                                        <span class="mnc-price">0₫</span>
                                                                        <del class="mnc-ori-price"></del>
                                                                    </div>
                                                                    <div class="mini-cart__remove"></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table class="table-cart-view">
                                                            <tr class="mini-cart__empty">
                                                                <td>
                                                                    <div class="svgico-mini-cart">
                                                                        <svg width="81" height="70"
                                                                            viewBox="0 0 81 70">
                                                                            <g transform="translate(0 2)"
                                                                                stroke-width="4" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <circle stroke-linecap="square"
                                                                                    cx="34" cy="60"
                                                                                    r="6"></circle>
                                                                                <circle stroke-linecap="square"
                                                                                    cx="67" cy="60"
                                                                                    r="6"></circle>
                                                                                <path
                                                                                    d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547">
                                                                                </path>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                    Hiện chưa có sản phẩm
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="cart-view-line"></div>
                                                    <div class="cart-view-total">
                                                        <table class="table-total">
                                                            <tr>
                                                                <td class="mnc-total text-left">TỔNG TIỀN:</td>
                                                                <td class="mnc-total text-right total-view-cart"> 0₫
                                                                </td>
                                                            </tr>
                                                            <tr class="mini-cart__button">
                                                                <td colspan="2"><a href="/gio-hang.html"
                                                                        class="linktocart button ">Xem giỏ
                                                                        hàng</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="header-dropdown_content" ng-if="cart.count">
                                            <div class="sitenav-content sitenav-cart">
                                                <p class="boxtitle">Giỏ hàng</p>
                                                <div class="cart-view clearfix">
                                                    <div class="cart-view-scroll">
                                                        <table class="clone-item-cart table-clone-cart">
                                                            <tbody>
                                                                <tr class="mini-cart__item d-none">
                                                                    <td class="mini-cart__left"><a class="mnc-link"
                                                                            href="#" title=""><img
                                                                                src="/" alt=""></a>
                                                                    </td>
                                                                    <td class="mini-cart__right">
                                                                        <p class="mini-cart__title">
                                                                            <a class="mnc-title mnc-link"
                                                                                href="#" title=""></a>
                                                                            <span class="mnc-variant"> </span>
                                                                        </p>
                                                                        <div class="mini-cart__quantity">
                                                                            <button class="qty-btn mnc-minus">
                                                                                <svg width="18" height="18"
                                                                                    viewBox="0 0 20 20"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect height="1"
                                                                                        width="18" y="9" x="1">
                                                                                    </rect>
                                                                                </svg>
                                                                            </button>
                                                                            <input class="qty-value" type="text"
                                                                                readonly="" name="mnc-quantity"
                                                                                value="">
                                                                            <button class="qty-btn mnc-plus">
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
                                                                        <div class="mini-cart__price">
                                                                            <span class="mnc-price">0₫</span>
                                                                            <del class="mnc-ori-price"></del>
                                                                        </div>
                                                                        <div class="mini-cart__remove"></div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table-cart-view">
                                                            <tbody>
                                                                <tr class="mini-cart__item"
                                                                    ng-repeat="item in cart.items">
                                                                    <td class="mini-cart__left">
                                                                        <a class="mnc-link"
                                                                            href="/products/ipad-pro-10-5-inch-32gb">
                                                                            <img ng-src="<% item.attributes.image %>"
                                                                                alt="<% item.name %>">
                                                                        </a>
                                                                    </td>
                                                                    <td class="mini-cart__right">
                                                                        <p class="mini-cart__title">
                                                                            <a class="mnc-title mnc-link"
                                                                                href="/products/ipad-pro-10-5-inch-32gb"
                                                                                title="<% item.name %>"><% item.name %></a>
                                                                            <span class="mnc-variant">
                                                                                <% item.attributes.variant_name %>
                                                                            </span>
                                                                        </p>
                                                                        <div class="mini-cart__quantity">

                                                                            <button class="qty-btn mnc-minus"
                                                                                ng-click="decrementQuantity(item); changeQty(item.quantity, item)">
                                                                                <svg width="18" height="18"
                                                                                    viewBox="0 0 20 20"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect height="1"
                                                                                        width="18" y="9" x="1">
                                                                                    </rect>
                                                                                </svg>
                                                                            </button>
                                                                            <!--<span class="mnc-value">3</span>-->
                                                                            <input class="qty-value  " type="text"
                                                                                readonly="" name="mnc-quantity"
                                                                                ng-model="item.quantity"
                                                                                data-vid="1086987189">
                                                                            <button class="qty-btn mnc-plus"
                                                                                ng-click="incrementQuantity(item); changeQty(item.quantity, item)">
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
                                                                        <div class="mini-cart__price">
                                                                            <span
                                                                                class="mnc-price"><% item.price | number %>₫</span>
                                                                            <del class="mnc-ori-price"></del>
                                                                        </div>
                                                                        <div class="mini-cart__remove">
                                                                            <a href="javascript:void(0);"
                                                                                ng-click="removeItem(item.id)">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                    x="0px" y="0px"
                                                                                    viewBox="0 0 1000 1000"
                                                                                    enable-background="new 0 0 1000 1000"
                                                                                    xml:space="preserve">
                                                                                    <g>
                                                                                        <path
                                                                                            d="M500,442.7L79.3,22.6C63.4,6.7,37.7,6.7,21.9,22.5C6.1,38.3,6.1,64,22,79.9L442.6,500L22,920.1C6,936,6.1,961.6,21.9,977.5c15.8,15.8,41.6,15.8,57.4-0.1L500,557.3l420.7,420.1c16,15.9,41.6,15.9,57.4,0.1c15.8-15.8,15.8-41.5-0.1-57.4L557.4,500L978,79.9c16-15.9,15.9-41.5,0.1-57.4c-15.8-15.8-41.6-15.8-57.4,0.1L500,442.7L500,442.7z">
                                                                                        </path>
                                                                                    </g>
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="cart-view-line"></div>
                                                    <div class="cart-view-total">
                                                        <table class="table-total">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="mnc-total text-left">TỔNG TIỀN:</td>
                                                                    <td class="mnc-total text-right total-view-cart">
                                                                        <% cart.total | number %>₫
                                                                    </td>
                                                                </tr>
                                                                <tr class="mini-cart__button">
                                                                    <td colspan="2"><a href="/gio-hang.html"
                                                                            class="linktocart button ">Xem giỏ
                                                                            hàng</a></td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-cus">
                            <div class="sidebar-content">
                                <div
                                    class="title-menu {{ Route::currentRouteName() != 'front.home-page' ? 'menu-clicked' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" x="0" y="0"
                                        viewBox="0 0 60.123 60.123" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve">
                                        <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M57.124,51.893H16.92c-1.657,0-3-1.343-3-3s1.343-3,3-3h40.203c1.657,0,3,1.343,3,3S58.781,51.893,57.124,51.893z">
                                                </path>
                                                <path
                                                    d="M57.124,33.062H16.92c-1.657,0-3-1.343-3-3s1.343-3,3-3h40.203c1.657,0,3,1.343,3,3   C60.124,31.719,58.781,33.062,57.124,33.062z">
                                                </path>
                                                <path
                                                    d="M57.124,14.231H16.92c-1.657,0-3-1.343-3-3s1.343-3,3-3h40.203c1.657,0,3,1.343,3,3S58.781,14.231,57.124,14.231z">
                                                </path>
                                                <circle cx="4.029" cy="11.463" r="4.029"></circle>
                                                <circle cx="4.029" cy="30.062" r="4.029"></circle>
                                                <circle cx="4.029" cy="48.661" r="4.029"></circle>
                                            </g>
                                        </g>
                                    </svg>
                                    <span>Danh mục sản phẩm</span>
                                </div>
                                <div
                                    class="sidebar-menu sidebar-menu--colum {{ request()->routeIs('front.home-page') ? 'sidebar-menu--index' : '' }}">
                                    <div class="main-menu mainMenujs">
                                        <ul class="link-list list-root">

                                            @foreach ($productCategories as $productCategory)
                                                @if ($productCategory->childs()->count())
                                                    <li class="item submenu " data-menu-root="10467396{{$productCategory->id}}">
                                                        <a href="{{ route('front.show-product-category', $productCategory->slug) }}" title="{{ $productCategory->name }}">
                                                            {{ $productCategory->name }}
                                                        </a>
                                                        <div class="dropdown_menu">
                                                            <div class="d-flex flex-wrap">
                                                                @foreach ($productCategory->childs->chunk(6) as $childChunk)
                                                                    <div class="col-lg-3">
                                                                        <ul class="has_submenu">
                                                                            @foreach ($childChunk as $childCate)
                                                                                <li><a href="{{ route('front.show-product-category', $childCate->slug) }}"
                                                                                        title="{{ $childCate->name }}">{{ $childCate->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="item ">
                                                        <a href="{{ route('front.show-product-category', $productCategory->slug) }}"
                                                            title="{{ $productCategory->name }}">
                                                            {{ $productCategory->name }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>


                                        @foreach ($productCategories as $productCategory)
                                            <ul class="link-list list-child" id="10467396{{$productCategory->id}}">
                                                <li><a href="javascript:;"><i class="fa fa-angle-left"
                                                                              aria-hidden="true"></i>Quay về</a>
                                                </li>

                                                @foreach ($productCategory->childs as $childCate)
                                                    <li class="level-1" >
                                                        <a class="" href="{{ route('front.show-product-category', $childCate->slug) }}">
                                                            <span>-</span>{{$childCate->name}}
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        @endforeach

                                    </div>
                                    <div class="site-overlay"></div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .box-item-a a{
                                color: #fff !important;
                            }
                        </style>
                        <div class="col-lg d-lg-flex d-none justify-content-between align-items-center box-content">
                            <div class="box-policy">
                                <ul>
                                    <li class="box-item box-item-a">
                                        <a class="box-text" href="{{ route('front.home-page') }}">Trang chủ</a>
                                    </li>
                                    <li class="box-item box-item-a">
                                        <a class="box-text" href="{{ route('front.about-us') }}">Giới thiệu</a>
                                    </li>
                                    @foreach ($postCategories as $category)
                                        <li class="box-item box-item-a">
                                            <a class="box-text"
                                                href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                    <li class="box-item box-item-a">
                                        <a class="box-text" href="{{ route('front.contact-us') }}">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
{{--                            <div class="box-live">--}}
{{--                                <button type="button" class="btn-live">So sánh</button>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-search-mobile">
                <div class=" search-box wpo-wrapper-search">
                    <form action="/search" class="searchform-mobile searchform-categoris ultimate-search">
                        <div class="wpo-search-inner">
                            <input type="hidden" name="type" value="product" />
                            <input required id="inputSearchAuto-mb" class="input-search" name="q"
                                maxlength="40" autocomplete="off" type="text" size="20"
                                placeholder="Tìm kiếm sản phẩm...">
                        </div>
                        <button type="submit" class="btn-search btn" id="search-header-btn-mb">
                            <span class="search-icon">
                                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27"
                                    style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                    <path
                                        d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                    </path>
                                    <rect x="17" y="17"
                                        transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                        width="4" height="8"></rect>
                                </svg>
                            </span>
                            <span class="search-close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                </svg>
                            </span>
                        </button>
                    </form>
                    <div id="ajaxSearchResults-mb" class="smart-search-wrapper ajaxSearchResults"
                        style="display: none">
                        <div class="resultsContent"></div>
                        <div class="search-suggest">
                            <p>Gợi ý cho bạn: </p>
                            <ul>
                                <li class="item">
                                    <a href="/" title="Điện thoại">Điện thoại</a>
                                </li>
                                <li class="item">
                                    <a href="/" title="PC - Máy tính đồng bộ">PC - Máy tính đồng bộ</a>
                                </li>
                                <li class="item">
                                    <a href="/" title="Laptop & Macbook">Laptop & Macbook</a>
                                </li>
                                <li class="item">
                                    <a href="/" title="Đồng hồ thông minh">Đồng hồ thông minh</a>
                                </li>
                                <li class="item">
                                    <a href="/" title="Linh kiện máy tính">Linh kiện máy tính</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>


    <div class="siteCart-mobile">
        <div class="siteCart-mobile__header">
            <div class="boxinfo p-count"><% cart.count %> sản phẩm</div>
            <div class="boxinfo p-price"><% cart.total | number %>₫</div>
            <div class="boxinfo">Đóng</div>
        </div>
        <div class="siteCart-mobile__dialog" ng-if="! cart.count">
            <div class="siteCart-mobile__header">
                <div class="boxinfo p-count"><% cart.count %> sản phẩm </div>
                <div class="boxinfo p-price"><% cart.total | number %>₫</div>
                <div class="boxinfo">Đóng</div>
            </div>
            <div class="siteCart-mobile__body">
                <div class="sitenav-content sitenav-cart">
                    <p class="boxtitle">Giỏ hàng</p>
                    <div class="cart-view clearfix">
                        <div class="cart-view-scroll">
                            <table class="clone-item-cart table-clone-cart">
                                <tr class="mini-cart__item d-none">
                                    <td class="mini-cart__left"><a class="mnc-link" href="#"
                                            title=""><img src="/" alt="" /></a></td>
                                    <td class="mini-cart__right">
                                        <p class="mini-cart__title">
                                            <a class="mnc-title mnc-link" href="#" title=""></a>
                                            <span class="mnc-variant"> </span>
                                        </p>
                                        <div class="mini-cart__quantity">
                                            <button class="qty-btn mnc-minus">
                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect height="1" width="18" y="9" x="1"></rect>
                                                </svg>
                                            </button>
                                            <input class="qty-value" type="text" readonly=""
                                                name="mnc-quantity" value="">
                                            <button class="qty-btn mnc-plus">
                                                <svg width="18" height="18" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="9" y="1" width="1" height="17"></rect>
                                                    <rect x="1" y="9" width="17" height="1"></rect>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="mini-cart__price">
                                            <span class="mnc-price">0₫</span>
                                            <del class="mnc-ori-price"></del>
                                        </div>
                                        <div class="mini-cart__remove"></div>
                                    </td>
                                </tr>
                            </table>


                            <table class="table-cart-view">
                                <tr class="mini-cart__empty">
                                    <td>
                                        <div class="svgico-mini-cart">
                                            <svg width="81" height="70" viewBox="0 0 81 70">
                                                <g transform="translate(0 2)" stroke-width="4" fill="none"
                                                    fill-rule="evenodd">
                                                    <circle stroke-linecap="square" cx="34" cy="60"
                                                        r="6"></circle>
                                                    <circle stroke-linecap="square" cx="67" cy="60"
                                                        r="6"></circle>
                                                    <path
                                                        d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                        Hiện chưa có sản phẩm
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="cart-view-line"></div>
                        <div class="cart-view-total">
                            <table class="table-total">
                                <tr>
                                    <td class="mnc-total text-left">TỔNG TIỀN:</td>
                                    <td class="mnc-total text-right total-view-cart">0₫</td>
                                </tr>
                                <tr class="mini-cart__button">
                                    <td colspan="2"><a href="/cart" class="linktocart button ">Xem giỏ hàng</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="siteCart-mobile__dialog" ng-if="cart.count">
            <div class="siteCart-mobile__header">
                <div class="boxinfo p-count"><% cart.count %> sản phẩm</div>
                <div class="boxinfo p-price"><% cart.total | number %>₫</div>
                <div class="boxinfo">Đóng</div>
            </div>
            <div class="siteCart-mobile__body">


                <div class="sitenav-content sitenav-cart">
                    <p class="boxtitle">Giỏ hàng</p>
                    <div class="cart-view clearfix">
                        <div class="cart-view-scroll">
                            <table class="table-cart-view">

                                <tbody>
                                    <tr class="mini-cart__item " ng-repeat="item in cart.items">
                                        <td class="mini-cart__left">
                                            <a class="mnc-link" href="/products/dong-ho-thong-minh-xtf">
                                                <img ng-src="<% item.attributes.image %>" alt="<% item.name %>">
                                            </a>
                                        </td>
                                        <td class="mini-cart__right">
                                            <p class="mini-cart__title">
                                                <a class="mnc-title mnc-link" href="/products/dong-ho-thong-minh-xtf"
                                                    title="<% item.name %>"><% item.name %></a>
                                                <span class="mnc-variant">
                                                    <% item.attributes.variant_name %>
                                                </span>
                                            </p>
                                            <div class="mini-cart__quantity">

                                                <button class="qty-btn mnc-minus"
                                                    ng-click="decrementQuantity(item); changeQty(item.quantity, item)">
                                                    <svg width="18" height="18" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect height="1" width="18" y="9" x="1"></rect>
                                                    </svg>
                                                </button>
                                                <!--<span class="mnc-value">1</span>-->
                                                <input class="qty-value  " type="text" readonly=""
                                                    name="mnc-quantity" ng-model="item.quantity"
                                                    data-vid="1086987163">
                                                <button class="qty-btn mnc-plus"
                                                    ng-click="incrementQuantity(item); changeQty(item.quantity, item)">
                                                    <svg width="18" height="18" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="9" y="1" width="1" height="17"></rect>
                                                        <rect x="1" y="9" width="17" height="1"></rect>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="mini-cart__price">
                                                <span class="mnc-price"><% item.price | number %>₫</span>
                                                <del class="mnc-ori-price"></del>
                                            </div>
                                            <div class="mini-cart__remove">
                                                <a href="javascript:void(0);" ng-click="removeItem(item.id)">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path
                                                                d="M500,442.7L79.3,22.6C63.4,6.7,37.7,6.7,21.9,22.5C6.1,38.3,6.1,64,22,79.9L442.6,500L22,920.1C6,936,6.1,961.6,21.9,977.5c15.8,15.8,41.6,15.8,57.4-0.1L500,557.3l420.7,420.1c16,15.9,41.6,15.9,57.4,0.1c15.8-15.8,15.8-41.5-0.1-57.4L557.4,500L978,79.9c16-15.9,15.9-41.5,0.1-57.4c-15.8-15.8-41.6-15.8-57.4,0.1L500,442.7L500,442.7z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="cart-view-line"></div>
                        <div class="cart-view-total">
                            <table class="table-total">
                                <tbody>
                                    <tr>
                                        <td class="mnc-total text-left">TỔNG TIỀN:</td>
                                        <td class="mnc-total text-right total-view-cart"><% cart.total | number %>₫
                                        </td>
                                    </tr>
                                    <tr class="mini-cart__button">
                                        <td colspan="2"><a href="/gio-hang.html" class="linktocart button ">Xem
                                                giỏ hàng</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>



        <div class="siteCart-mobile__overlay"></div>
    </div>

</div>
