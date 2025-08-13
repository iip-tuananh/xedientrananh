<!DOCTYPE html>
<html lang="vi">
<!--<![endif]-->
<head>
    @include('site.partials.head')
    <link rel="preconnect" href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700&display=swap" crossorigin>
    <link rel="preload stylesheet" href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700&display=swap" as="style">
    <!--+++++++++++++ CSS THEME ++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <link rel="preload stylesheet" href="/site/css/bootstrap.scss.css?v=162" as="style">
    <link rel="preload stylesheet" href="/site/css/jquery.jgrowl.min.css?v=162" as="style">
    <link rel="preload stylesheet" href="/site/css/soon.scss.css?v=162" as="style">
    <link rel="preload stylesheet" href="/site/css/style-themes.scss.css?v=162" as="style">
    <!--+++++++++++++ JS THEME ++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <script >
        window.themeAssets = {
        arrowRight: '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m4 13c-.26901 0-.50292-.0994-.70175-.2982-.19883-.1989-.29825-.4328-.29825-.7018 0-.2807.09942-.5146.29825-.7018.19883-.1988.43274-.2982.70175-.2982h16c.2807 0 .5146.0994.7018.2982.1988.1872.2982.4211.2982.7018 0 .269-.0994.5029-.2982.7018-.1872.1988-.4211.2982-.7018.2982zm9.7018 6.7018c-.1755.1988-.4094.2982-.7018.2982-.269 0-.5029-.0994-.7018-.2982-.1988-.1989-.2982-.4328-.2982-.7018 0-.2924.0994-.5263.2982-.7018l6.8948-6.8947c.0585-.0585.0994.0292.1228.2632.0234.2222.0234.4503 0 .6842-.0234.2222-.0643.3041-.1228.2456l-6.8948-6.89475c-.1988-.18713-.2982-.42105-.2982-.70175s.0994-.51462.2982-.70176c.1989-.19882.4328-.29824.7018-.29824.2924 0 .5263.09942.7018.29824l6.8947 6.89476c.2222.2105.3333.4795.3333.807 0 .3158-.1111.5848-.3333.807z"></path></g></svg>',
        };
    </script>

    {{-- <link href="https://cdn.hstatic.net/shared/api.jquery.js" rel="preload" as="script" type="text/javascript"> --}}
    <link href="/site/js/scripts.js?v=162" rel="preload" as="script" type="text/javascript">
    <link href="/site/js/jquery-3.5.1.min.js?v=162" rel="preload" as="script">
    <script src="/site/js/jquery-3.5.1.min.js?v=162"></script>
    <script>
        var template = "index";

        var locationHeader = false;


        var promotionApp = false,
                promotionApp_name = '';

            promotionApp = true;
        promotionApp_name = 'app_combo';

        var productReviewsApp = false;
        var productReviewsProloop = false;

        /* product set item */
        var prodItem_desk = 5,
                prodItem_mobile = 2;
        prodItem_desk = 5

        prodItem_mobile = 2

     </script>
    {{-- <link href="//theme.hstatic.net/200000516791/1001206835/14/app-combo.js?v=162" rel="preload" as="script" type="text/javascript"> --}}
    @include('site.partials.angular_mix')

</head>
<body class="mainBody-theme {{ Route::currentRouteName() == 'front.home-page' ? 'template-index' : 'template-page' }}" ng-app="App" ng-cloak>
    <div class="mainBody-theme-container mainBody-modalshow     layoutProduct_scroll ">
        @include('site.partials.header')
        @yield('content')
        @include('site.partials.footer')
        <div class="d-none">
            <div class="cpi-tooltip__info" id="cp-tooltip-1">
            <div class="popover-content__coupon" >
                <div class="dfex-txt dfex-bkg">
                    <div class="dfex-txt--1">Mã</div>
                    <div class="dfex-txt--2"><b> A87TYRT55</b> <span class="cpi-trigger" data-coupon-index="coupon-item__1" data-coupon="A87TYRT55"></span></div>
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
                        <button class="btn-popover btn-popover-code" data-coupon="A87TYRT55">Sao chép mã </button>										<button class="btn-popover btn-popover-close">Đóng</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="cpi-tooltip__info" id="cp-tooltip-2">
            <div class="popover-content__coupon" >
                <div class="dfex-txt dfex-bkg">
                    <div class="dfex-txt--1">Mã</div>
                    <div class="dfex-txt--2"><b> QH5G8J0Y</b> <span class="cpi-trigger" data-coupon-index="coupon-item__2" data-coupon="QH5G8J0Y"></span></div>
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
                        <button class="btn-popover btn-popover-code" data-coupon="QH5G8J0Y">Sao chép mã </button>										<button class="btn-popover btn-popover-close">Đóng</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="cpi-tooltip__info" id="cp-tooltip-3">
            <div class="popover-content__coupon" >
                <div class="dfex-txt dfex-bkg">
                    <div class="dfex-txt--1">Mã</div>
                    <div class="dfex-txt--2"><b> FT45YUO8H</b> <span class="cpi-trigger" data-coupon-index="coupon-item__3" data-coupon="FT45YUO8H"></span></div>
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
                        <button class="btn-popover btn-popover-code" data-coupon="FT45YUO8H">Sao chép mã </button>										<button class="btn-popover btn-popover-close">Đóng</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="cpi-tooltip__info" id="cp-tooltip-4">
            <div class="popover-content__coupon" >
                <div class="dfex-txt dfex-bkg">
                    <div class="dfex-txt--1">Mã</div>
                    <div class="dfex-txt--2"><b> A789UYT</b> <span class="cpi-trigger" data-coupon-index="coupon-item__4" data-coupon="A789UYT"></span></div>
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
                        <button class="btn-popover btn-popover-code" data-coupon="A789UYT">Sao chép mã </button>										<button class="btn-popover btn-popover-close">Đóng</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="modal-coupon--backdrop"></div>
        <div id="sitenav-overlay" class="sitenav-overlay"></div>
        <div class="addThis_listSharing_group">
            <div class="addThis_listSharing">
            <div class="listSharing_action">
                <button type="button" class="addThis_close" data-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill-rule="evenodd">
                        <g transform="translate(-1341.000000, -90.000000)">
                            <g transform="translate(1341.000000, 90.000000)">
                                <polygon points="19 6.4 17.6 5 12 10.6 6.4 5 5 6.4 10.6 12 5 17.6 6.4 19 12 13.4 17.6 19 19 17.6 13.4 12"></polygon>
                            </g>
                        </g>
                        </g>
                    </svg>
                </button>
                <ul class="addThis_listing">
                    <li class="addThis_item">
                        <a class="addThis_item--icon" href="tel:1900636099" rel="nofollow" aria-label="phone">
                        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="22" fill="url(#paint2_linear)" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0087 9.35552C14.1581 9.40663 14.3885 9.52591 14.5208 9.61114C15.3315 10.148 17.5888 13.0324 18.3271 14.4726C18.7495 15.2949 18.8903 15.9041 18.758 16.3558C18.6214 16.8415 18.3953 17.0971 17.384 17.9109C16.9786 18.239 16.5988 18.5756 16.5391 18.6651C16.3855 18.8866 16.2617 19.3212 16.2617 19.628C16.266 20.3395 16.7269 21.6305 17.3328 22.6232C17.8021 23.3944 18.6428 24.3828 19.4749 25.1413C20.452 26.0361 21.314 26.6453 22.2869 27.1268C23.5372 27.7488 24.301 27.9064 24.86 27.6466C25.0008 27.5826 25.1501 27.4974 25.1971 27.4591C25.2397 27.4208 25.5683 27.0202 25.9268 26.5772C26.618 25.7079 26.7759 25.5674 27.2496 25.4055C27.8513 25.201 28.4657 25.2563 29.0844 25.5716C29.5538 25.8145 30.5779 26.4493 31.2393 26.9095C32.1098 27.5187 33.9703 29.0355 34.2221 29.3381C34.6658 29.8834 34.7427 30.5821 34.4439 31.3534C34.1281 32.1671 32.8992 33.6925 32.0415 34.3444C31.2649 34.9323 30.7145 35.1581 29.9891 35.1922C29.3917 35.222 29.1442 35.1709 28.3804 34.8556C22.3893 32.3887 17.6059 28.7075 13.8081 23.65C11.8239 21.0084 10.3134 18.2688 9.28067 15.427C8.67905 13.7696 8.64921 13.0495 9.14413 12.2017C9.35753 11.8438 10.2664 10.9575 10.9278 10.4633C12.0288 9.64524 12.5365 9.34273 12.9419 9.25754C13.2193 9.19787 13.7014 9.24473 14.0087 9.35552Z" fill="white" />
                            <defs>
                                <linearGradient id="paint2_linear" x1="22" y1="-7.26346e-09" x2="22.1219" y2="40.5458" gradientUnits="userSpaceOnUse">
                                    <stop offset="50%" stop-color="#e8434c" />
                                    <stop offset="100%" stop-color="#d61114" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="tooltip-text">Gọi ngay cho chúng tôi</span>
                        </a>
                    </li>
                    <li class="addThis_item">
                        <a class="addThis_item--icon" href="https://zalo.me/0901866099" target="_blank"  rel="nofollow noreferrer" aria-label="zalo">
                        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="22" fill="url(#paint4_linear)" />
                            <g clip-path="url(#clip0)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.274 34.0907C15.7773 34.0856 16.2805 34.0804 16.783 34.0804C16.7806 34.0636 16.7769 34.0479 16.7722 34.0333C16.777 34.0477 16.7808 34.0632 16.7832 34.0798C16.8978 34.0798 17.0124 34.0854 17.127 34.0965H25.4058C26.0934 34.0965 26.7809 34.0977 27.4684 34.0989C28.8434 34.1014 30.2185 34.1039 31.5935 34.0965H31.6222C33.5357 34.0798 35.0712 32.5722 35.0597 30.7209V27.4784C35.0597 27.4582 35.0612 27.4333 35.0628 27.4071C35.0676 27.3257 35.0731 27.2325 35.0368 27.2345C34.9337 27.2401 34.7711 27.2757 34.7138 27.3311C34.2744 27.6145 33.8483 27.924 33.4222 28.2335C32.57 28.8525 31.7179 29.4715 30.7592 29.8817C27.0284 31.0993 23.7287 31.157 20.2265 30.3385C20.0349 30.271 19.9436 30.2786 19.7816 30.292C19.6773 30.3007 19.5436 30.3118 19.3347 30.3068C19.3093 30.3077 19.2829 30.3085 19.2554 30.3093C18.9099 30.3197 18.4083 30.3348 17.8088 30.6877C16.4051 31.1034 14.5013 31.157 13.5175 31.0147C13.522 31.0245 13.5247 31.0329 13.5269 31.0407C13.5236 31.0341 13.5204 31.0275 13.5173 31.0208C13.5036 31.0059 13.4864 30.9927 13.4696 30.98C13.4163 30.9393 13.3684 30.9028 13.46 30.8268C13.4867 30.8102 13.5135 30.7929 13.5402 30.7757C13.5937 30.7412 13.6472 30.7067 13.7006 30.6771C14.4512 30.206 15.1559 29.6905 15.6199 28.9311C16.2508 28.1911 15.9584 27.9025 15.4009 27.3524L15.3799 27.3317C12.6639 24.6504 11.8647 21.8054 12.148 17.9785C12.486 15.8778 13.4829 14.0708 14.921 12.4967C15.7918 11.5433 16.8288 10.7729 17.9632 10.1299C17.9796 10.1198 17.9987 10.1116 18.0182 10.1032C18.0736 10.0793 18.1324 10.0541 18.1408 9.98023C18.1475 9.92191 18.0507 9.90264 18.0163 9.90264C17.3698 9.90264 16.7316 9.89705 16.0964 9.89148C14.8346 9.88043 13.5845 9.86947 12.3041 9.90265C10.465 9.95254 8.78889 11.1779 8.81925 13.3614C8.82689 17.2194 8.82435 21.0749 8.8218 24.9296C8.82053 26.8567 8.81925 28.7835 8.81925 30.7104C8.81925 32.5007 10.2344 34.0028 12.085 34.0749C13.1465 34.1125 14.2107 34.1016 15.274 34.0907ZM13.5888 31.1403C13.5935 31.1467 13.5983 31.153 13.6032 31.1594C13.7036 31.2455 13.8031 31.3325 13.9021 31.4202C13.8063 31.3312 13.7072 31.2423 13.6035 31.1533C13.5982 31.1487 13.5933 31.1444 13.5888 31.1403ZM16.5336 33.8108C16.4979 33.7885 16.4634 33.7649 16.4337 33.7362C16.4311 33.7358 16.4283 33.7352 16.4254 33.7345C16.4281 33.7371 16.4308 33.7397 16.4335 33.7423C16.4632 33.7683 16.4978 33.79 16.5336 33.8108Z" fill="white" />
                                <path d="M17.6768 21.6754C18.5419 21.6754 19.3555 21.6698 20.1633 21.6754C20.6159 21.6809 20.8623 21.8638 20.9081 22.213C20.9597 22.6509 20.6961 22.9447 20.2034 22.9502C19.2753 22.9613 18.3528 22.9558 17.4247 22.9558C17.1554 22.9558 16.8919 22.9669 16.6226 22.9502C16.2903 22.9336 15.9637 22.8671 15.8033 22.5345C15.6429 22.2019 15.7575 21.9026 15.9752 21.631C16.8575 20.5447 17.7455 19.4527 18.6336 18.3663C18.6851 18.2998 18.7367 18.2333 18.7883 18.1723C18.731 18.0781 18.6508 18.1224 18.582 18.1169C17.9633 18.1114 17.3388 18.1169 16.72 18.1114C16.5768 18.1114 16.4335 18.0947 16.296 18.067C15.9695 17.995 15.7689 17.679 15.8434 17.3686C15.895 17.158 16.0669 16.9862 16.2846 16.9363C16.4221 16.903 16.5653 16.8864 16.7085 16.8864C17.7284 16.8809 18.7539 16.8809 19.7737 16.8864C19.9571 16.8809 20.1347 16.903 20.3123 16.9474C20.7019 17.0749 20.868 17.4241 20.7133 17.7899C20.5758 18.1058 20.3581 18.3774 20.1404 18.649C19.3899 19.5747 18.6393 20.4948 17.8888 21.4093C17.8258 21.4814 17.7685 21.5534 17.6768 21.6754Z" fill="white" />
                                <path d="M24.3229 18.7604C24.4604 18.5886 24.6036 18.4279 24.8385 18.3835C25.2911 18.2948 25.7151 18.5775 25.7208 19.021C25.738 20.1295 25.7323 21.2381 25.7208 22.3467C25.7208 22.6349 25.526 22.8899 25.2453 22.973C24.9588 23.0783 24.6322 22.9952 24.4432 22.7568C24.3458 22.6404 24.3057 22.6183 24.1682 22.7236C23.6468 23.1338 23.0567 23.2058 22.4207 23.0063C21.4009 22.6848 20.9827 21.9143 20.8681 20.9776C20.7478 19.9632 21.0973 19.0986 22.0369 18.5664C22.816 18.1175 23.6067 18.1563 24.3229 18.7604ZM22.2947 20.7836C22.3061 21.0275 22.3863 21.2603 22.5353 21.4543C22.8447 21.8534 23.4348 21.9365 23.8531 21.6372C23.9218 21.5873 23.9848 21.5263 24.0421 21.4543C24.363 21.033 24.363 20.3402 24.0421 19.9189C23.8817 19.7027 23.6296 19.5752 23.3603 19.5697C22.7301 19.5309 22.289 20.002 22.2947 20.7836ZM28.2933 20.8168C28.2474 19.3923 29.2157 18.3281 30.5907 18.2893C32.0517 18.245 33.1174 19.1928 33.1632 20.5785C33.209 21.9808 32.321 22.973 30.9517 23.106C29.4563 23.2502 28.2704 22.2026 28.2933 20.8168ZM29.7313 20.6838C29.7199 20.961 29.8058 21.2326 29.9777 21.4598C30.2928 21.8589 30.8829 21.9365 31.2955 21.6261C31.3585 21.5818 31.41 21.5263 31.4616 21.4709C31.7939 21.0496 31.7939 20.3402 31.4673 19.9189C31.3069 19.7083 31.0548 19.5752 30.7855 19.5697C30.1668 19.5364 29.7313 19.991 29.7313 20.6838ZM27.7891 19.7138C27.7891 20.573 27.7948 21.4321 27.7891 22.2912C27.7948 22.6848 27.474 23.0118 27.0672 23.0229C26.9985 23.0229 26.924 23.0174 26.8552 23.0007C26.5688 22.9287 26.351 22.6349 26.351 22.2857V17.8791C26.351 17.6186 26.3453 17.3636 26.351 17.1031C26.3568 16.6763 26.6375 16.3992 27.0615 16.3992C27.4969 16.3936 27.7891 16.6708 27.7891 17.1142C27.7948 17.9789 27.7891 18.8491 27.7891 19.7138Z" fill="white" />
                                <path d="M22.2947 20.7828C22.289 20.0013 22.7302 19.5302 23.3547 19.5634C23.6239 19.5745 23.876 19.702 24.0364 19.9181C24.3573 20.3339 24.3573 21.0322 24.0364 21.4535C23.7271 21.8526 23.1369 21.9357 22.7187 21.6364C22.65 21.5865 22.5869 21.5255 22.5296 21.4535C22.3864 21.2595 22.3062 21.0267 22.2947 20.7828ZM29.7314 20.683C29.7314 19.9957 30.1668 19.5357 30.7856 19.569C31.0549 19.5745 31.307 19.7075 31.4674 19.9181C31.794 20.3394 31.794 21.0544 31.4617 21.4701C31.1408 21.8636 30.545 21.9302 30.1382 21.6198C30.0752 21.5754 30.0236 21.52 29.9778 21.459C29.8059 21.2318 29.7257 20.9602 29.7314 20.683Z" fill="#0068FF" />
                            </g>
                            <defs>
                                <linearGradient id="paint4_linear" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
                                    <stop offset="50%" stop-color="#3985f7" />
                                    <stop offset="100%" stop-color="#1272e8" />
                                </linearGradient>
                                <clipPath id="clip0">
                                    <rect width="26.3641" height="24.2" fill="white" transform="translate(8.78906 9.90234)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="tooltip-text">Chat với chúng tôi qua Zalo</span>
                        </a>
                    </li>
                    <li class="addThis_item">
                        <a class="addThis_item--icon" data-toggle="modal" href="#addthis-modalContact" aria-label="email">
                        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="22" fill="url(#paint1_linear)" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4589 11.6667H32.5414C33.1621 11.6667 33.6993 11.8861 34.153 12.3245C34.6062 12.7634 34.8332 13.2904 34.8332 13.9064C34.8332 14.6435 34.599 15.3481 34.1319 16.0197C33.6639 16.6914 33.0816 17.2655 32.3846 17.7413C30.0672 19.3131 28.3185 20.4998 27.1311 21.3061C26.4785 21.7489 25.9931 22.0787 25.6817 22.2905C25.6355 22.3222 25.5634 22.3723 25.4675 22.4396C25.3643 22.5117 25.2337 22.6037 25.0729 22.7174C24.7625 22.9368 24.5048 23.114 24.2994 23.2495C24.0938 23.3846 23.8457 23.5363 23.5545 23.7043C23.2631 23.8724 22.9887 23.9983 22.7309 24.0823C22.4731 24.1661 22.2344 24.2082 22.0148 24.2082H22.0006H21.9863C21.7667 24.2082 21.5281 24.1661 21.2702 24.0823C21.0125 23.9983 20.7378 23.8721 20.4466 23.7043C20.1552 23.5363 19.9068 23.385 19.7017 23.2495C19.4964 23.114 19.2386 22.9368 18.9284 22.7174C18.7672 22.6037 18.6366 22.5118 18.5334 22.4393L18.5233 22.4323C18.4325 22.3688 18.3638 22.3208 18.3195 22.2905C17.9197 22.0157 17.4354 21.6846 16.8739 21.3022C16.2152 20.8532 15.4486 20.3329 14.5671 19.7359C12.9342 18.6303 11.9554 17.9654 11.6308 17.7413C11.0388 17.3494 10.4802 16.8107 9.95513 16.1248C9.43011 15.4387 9.16748 14.8018 9.16748 14.214C9.16748 13.4864 9.36539 12.8796 9.76184 12.3944C10.158 11.9095 10.7234 11.6667 11.4589 11.6667ZM33.4002 19.2392C31.4494 20.5296 29.7913 21.6405 28.4258 22.5725L34.8324 28.8337V18.0213C34.4217 18.4695 33.9443 18.8752 33.4002 19.2392ZM9.1665 18.0214C9.58659 18.4788 10.0691 18.8848 10.6132 19.2393C12.6414 20.5863 14.2935 21.6952 15.5757 22.5701L9.1665 28.8335V18.0214ZM34.0421 30.8208C33.6172 31.1883 33.1173 31.3745 32.5403 31.3745H11.4578C10.8809 31.3745 10.3807 31.1883 9.95575 30.8208L17.2287 23.7122C17.4107 23.8399 17.5789 23.9592 17.7306 24.0679C18.2751 24.4597 18.7165 24.7654 19.0556 24.9845C19.3944 25.2041 19.8455 25.4279 20.4091 25.6564C20.9726 25.8853 21.4976 25.9993 21.9847 25.9993H21.9989H22.0132C22.5002 25.9993 23.0253 25.8852 23.5888 25.6564C24.152 25.4279 24.6032 25.2041 24.9423 24.9845C25.2814 24.7654 25.7231 24.4597 26.2672 24.0679C26.427 23.955 26.5961 23.8362 26.7705 23.7141L34.0421 30.8208Z" fill="white" />
                            <defs>
                                <linearGradient id="paint1_linear" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
                                    <stop offset="50%" stop-color="#70f3ff" />
                                    <stop offset="100%" stop-color="#00dcf0" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="tooltip-text">Đăng kí thông tin và để lại lời nhắn</span>
                        </a>
                    </li>
                    <li class="addThis_item" >
                        <a class="addThis_item--icon" href="/pages/lien-he" aria-label="Liên hệ">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="22" fill="url(#paint5_linear)" />
                            <path d="M22 10C17.0374 10 13 13.7367 13 18.3297C13 24.0297 21.0541 32.3978 21.397 32.7512C21.7191 33.0832 22.2815 33.0826 22.603 32.7512C22.9459 32.3978 31 24.0297 31 18.3297C30.9999 13.7367 26.9626 10 22 10ZM22 22.5206C19.5032 22.5206 17.4719 20.6406 17.4719 18.3297C17.4719 16.0188 19.5032 14.1388 22 14.1388C24.4968 14.1388 26.528 16.0189 26.528 18.3297C26.528 20.6406 24.4968 22.5206 22 22.5206Z" fill="white" />
                            <defs>
                                <linearGradient id="paint5_linear" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
                                    <stop offset="50%" stop-color="#fecf72" />
                                    <stop offset="100%" stop-color="#ef9f00" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="tooltip-text">Xem địa chỉ doanh nghiệp</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listSharing_overlay"></div>
            </div>
            <div class="addThis_iconContact">
            <div class="box-item item-livestream d-lg-none">
                <div class="svgico">
                    <a href="https://fb.watch/dmPHDzqt2q/" class="box-icon" target="_blank" rel="noreferrer" aria-label="live stream">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <g xmlns="http://www.w3.org/2000/svg">
                                <path d="m480 136h-448c-2.804 0-5.496.481-7.997 1.365l-8.336 22.635v182.333c0 13.255 10.745 24 24 24h440.333l22.634-6.332c.885-2.502 1.366-5.196 1.366-8.001v-192c0-13.255-10.745-24-24-24z" fill="#ffffff" data-original="#e5646e" class=""></path>
                                <g fill="#fff">
                                    <path d="m133.898 311.891c-.016 0-.031 0-.047 0-11.234.062-27.648.125-36.773.133v-120.024c0-4.418-3.578-8-8-8s-8 3.582-8 8v127.891c0 3.898 2.805 7.227 6.648 7.887.562.094 1.32.227 15.148.227 6.742 0 16.609-.031 31.07-.113 4.414-.023 7.977-3.625 7.953-8.043-.022-4.408-3.6-7.958-7.999-7.958z" fill="#ff0000" data-original="#ffffff" class=""></path>
                                    <path d="m181.078 184c-4.422 0-8 3.582-8 8v128c0 4.418 3.578 8 8 8s8-3.582 8-8v-128c0-4.418-3.578-8-8-8z" fill="#ff0000" data-original="#ffffff" class=""></path>
                                    <path d="m424.922 311.414h-45.445v-47.414h41.5c4.422 0 8-3.582 8-8s-3.578-8-8-8h-41.5v-47.414h45.445c4.422 0 8-3.582 8-8s-3.578-8-8-8h-53.445c-4.422 0-8 3.582-8 8v126.828c0 4.418 3.578 8 8 8h53.445c4.422 0 8-3.582 8-8s-3.578-8-8-8z" fill="#ff0000" data-original="#ffffff" class=""></path>
                                    <path d="m322.984 184.641c-4.195-1.395-8.719.879-10.117 5.07l-37.039 111.504-38.828-111.84c-1.453-4.172-6.008-6.395-10.18-4.934-4.172 1.449-6.383 6.008-4.93 10.184l43.781 126.121c1.539 4.348 5.656 7.254 10.258 7.254h.062c4.633-.027 8.75-2.992 10.266-7.434l41.797-125.809c1.391-4.195-.874-8.722-5.07-10.116z" fill="#ff0000" data-original="#ffffff" class=""></path>
                                </g>
                                <path d="m355.844 69.445c-2.586 0-5.117-1.246-6.656-3.555-20.876-31.242-55.711-49.89-93.188-49.89s-72.312 18.648-93.188 49.891c-2.445 3.664-7.406 4.66-11.094 2.207-3.672-2.453-4.664-7.422-2.203-11.098 23.844-35.691 63.649-57 106.485-57s82.641 21.309 106.484 57c2.461 3.676 1.469 8.645-2.203 11.098-1.367.91-2.914 1.347-4.437 1.347z" fill="#ffcfd1" data-original="#ffe6e7" class=""></path>
                                <path d="m322.562 91.629c-2.586 0-5.117-1.246-6.656-3.555-13.422-20.086-35.812-32.074-59.906-32.074s-46.484 11.988-59.906 32.074c-2.445 3.668-7.414 4.656-11.094 2.207-3.672-2.453-4.664-7.422-2.203-11.098 16.383-24.535 43.75-39.183 73.203-39.183s56.82 14.648 73.203 39.184c2.461 3.676 1.469 8.645-2.203 11.098-1.367.909-2.914 1.347-4.438 1.347z" fill="#ffcccf" data-original="#ffcccf" class=""></path>
                                <path d="m289.273 113.82c-2.586 0-5.117-1.246-6.664-3.559-5.961-8.929-15.914-14.261-26.609-14.261s-20.648 5.332-26.609 14.262c-2.461 3.672-7.422 4.668-11.102 2.211-3.672-2.453-4.664-7.422-2.211-11.094 8.945-13.387 23.867-21.379 39.922-21.379s30.977 7.992 39.922 21.379c2.453 3.672 1.461 8.641-2.211 11.094-1.367.91-2.914 1.347-4.438 1.347z" fill="#ff9a9f" data-original="#ff9a9f" class=""></path>
                                <path d="m72 360c-26.51 0-48-21.49-48-48v-174.641c-9.3 3.306-16 12.206-16 22.641v192c0 13.255 10.745 24 24 24h448c10.435 0 19.325-6.7 22.631-16z" fill="#ffffff" data-original="#db4655" class=""></path>
                                <path d="m156.156 442.555c2.586 0 5.117 1.246 6.656 3.555 20.876 31.242 55.711 49.89 93.188 49.89s72.312-18.648 93.188-49.891c2.445-3.664 7.406-4.66 11.094-2.207 3.672 2.453 4.664 7.422 2.203 11.098-23.844 35.691-63.648 57-106.484 57s-82.641-21.309-106.484-57c-2.461-3.676-1.469-8.645 2.203-11.098 1.366-.91 2.913-1.347 4.436-1.347z" fill="#ffcfd1" data-original="#ffe6e7" class=""></path>
                                <path d="m189.438 420.371c2.586 0 5.117 1.246 6.656 3.555 13.422 20.086 35.812 32.074 59.906 32.074s46.484-11.988 59.906-32.074c2.445-3.668 7.414-4.656 11.094-2.207 3.672 2.453 4.664 7.422 2.203 11.098-16.383 24.535-43.75 39.183-73.203 39.183s-56.82-14.648-73.203-39.184c-2.461-3.676-1.469-8.645 2.203-11.098 1.367-.909 2.914-1.347 4.438-1.347z" fill="#ffcccf" data-original="#ffcccf" class=""></path>
                                <path d="m222.727 398.18c2.586 0 5.117 1.246 6.664 3.559 5.961 8.929 15.914 14.261 26.609 14.261s20.648-5.332 26.609-14.262c2.461-3.672 7.422-4.668 11.102-2.211 3.672 2.453 4.664 7.422 2.211 11.094-8.945 13.387-23.867 21.379-39.922 21.379s-30.977-7.992-39.922-21.379c-2.453-3.672-1.461-8.641 2.211-11.094 1.367-.91 2.914-1.347 4.438-1.347z" fill="#ff9a9f" data-original="#ff9a9f" class=""></path>
                            </g>
                        </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="box-item item-contact">
                <div class="svgico">
                    <svg width="34" height="35" viewBox="0 0 34 35" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.35522 31V25.416H5.41122V30.064H7.61122V31H4.35522ZM8.97509 26.216C8.76176 26.216 8.60709 26.168 8.51109 26.072C8.42043 25.976 8.37509 25.8533 8.37509 25.704V25.544C8.37509 25.3947 8.42043 25.272 8.51109 25.176C8.60709 25.08 8.76176 25.032 8.97509 25.032C9.18309 25.032 9.33509 25.08 9.43109 25.176C9.52709 25.272 9.57509 25.3947 9.57509 25.544V25.704C9.57509 25.8533 9.52709 25.976 9.43109 26.072C9.33509 26.168 9.18309 26.216 8.97509 26.216ZM8.46309 26.824H9.48709V31H8.46309V26.824ZM12.834 24.712L13.842 25.944L13.33 26.344L12.37 25.424L11.41 26.344L10.898 25.944L11.906 24.712H12.834ZM12.362 31.096C12.0527 31.096 11.7754 31.0453 11.53 30.944C11.29 30.8373 11.0847 30.6907 10.914 30.504C10.7487 30.312 10.6207 30.0827 10.53 29.816C10.4394 29.544 10.394 29.24 10.394 28.904C10.394 28.5733 10.4367 28.2747 10.522 28.008C10.6127 27.7413 10.7407 27.5147 10.906 27.328C11.0714 27.136 11.274 26.9893 11.514 26.888C11.754 26.7813 12.026 26.728 12.33 26.728C12.6554 26.728 12.938 26.784 13.178 26.896C13.418 27.008 13.6154 27.16 13.77 27.352C13.9247 27.544 14.0394 27.768 14.114 28.024C14.194 28.2747 14.234 28.544 14.234 28.832V29.168H11.458V29.272C11.458 29.576 11.5434 29.8213 11.714 30.008C11.8847 30.1893 12.138 30.28 12.474 30.28C12.73 30.28 12.938 30.2267 13.098 30.12C13.2634 30.0133 13.41 29.8773 13.538 29.712L14.09 30.328C13.9194 30.568 13.6847 30.7573 13.386 30.896C13.0927 31.0293 12.7514 31.096 12.362 31.096ZM12.346 27.496C12.074 27.496 11.858 27.5867 11.698 27.768C11.538 27.9493 11.458 28.184 11.458 28.472V28.536H13.17V28.464C13.17 28.176 13.098 27.944 12.954 27.768C12.8154 27.5867 12.6127 27.496 12.346 27.496ZM15.135 31V26.824H16.159V27.52H16.199C16.2843 27.296 16.4176 27.1093 16.599 26.96C16.7856 26.8053 17.0416 26.728 17.367 26.728C17.799 26.728 18.1296 26.8693 18.359 27.152C18.5883 27.4347 18.703 27.8373 18.703 28.36V31H17.679V28.464C17.679 28.1653 17.6256 27.9413 17.519 27.792C17.4123 27.6427 17.2363 27.568 16.991 27.568C16.8843 27.568 16.7803 27.584 16.679 27.616C16.583 27.6427 16.495 27.6853 16.415 27.744C16.3403 27.7973 16.279 27.8667 16.231 27.952C16.183 28.032 16.159 28.128 16.159 28.24V31H15.135ZM21.7287 25.08H22.7527V27.52H22.7927C22.8781 27.296 23.0114 27.1093 23.1927 26.96C23.3794 26.8053 23.6354 26.728 23.9607 26.728C24.3927 26.728 24.7234 26.8693 24.9527 27.152C25.1821 27.4347 25.2967 27.8373 25.2967 28.36V31H24.2727V28.464C24.2727 28.1653 24.2194 27.9413 24.1127 27.792C24.0061 27.6427 23.8301 27.568 23.5847 27.568C23.4781 27.568 23.3741 27.584 23.2727 27.616C23.1767 27.6427 23.0887 27.6853 23.0087 27.744C22.9341 27.7973 22.8727 27.8667 22.8247 27.952C22.7767 28.032 22.7527 28.128 22.7527 28.24V31H21.7287V25.08ZM28.5918 24.712L29.5998 25.944L29.0878 26.344L28.1278 25.424L27.1678 26.344L26.6558 25.944L27.6638 24.712H28.5918ZM28.1198 31.096C27.8105 31.096 27.5332 31.0453 27.2878 30.944C27.0478 30.8373 26.8425 30.6907 26.6718 30.504C26.5065 30.312 26.3785 30.0827 26.2878 29.816C26.1972 29.544 26.1518 29.24 26.1518 28.904C26.1518 28.5733 26.1945 28.2747 26.2798 28.008C26.3705 27.7413 26.4985 27.5147 26.6638 27.328C26.8292 27.136 27.0318 26.9893 27.2718 26.888C27.5118 26.7813 27.7838 26.728 28.0878 26.728C28.4132 26.728 28.6958 26.784 28.9358 26.896C29.1758 27.008 29.3732 27.16 29.5278 27.352C29.6825 27.544 29.7972 27.768 29.8718 28.024C29.9518 28.2747 29.9918 28.544 29.9918 28.832V29.168H27.2158V29.272C27.2158 29.576 27.3012 29.8213 27.4718 30.008C27.6425 30.1893 27.8958 30.28 28.2318 30.28C28.4878 30.28 28.6958 30.2267 28.8558 30.12C29.0212 30.0133 29.1678 29.8773 29.2958 29.712L29.8478 30.328C29.6772 30.568 29.4425 30.7573 29.1438 30.896C28.8505 31.0293 28.5092 31.096 28.1198 31.096ZM28.1038 27.496C27.8318 27.496 27.6158 27.5867 27.4558 27.768C27.2958 27.9493 27.2158 28.184 27.2158 28.472V28.536H28.9278V28.464C28.9278 28.176 28.8558 27.944 28.7118 27.768C28.5732 27.5867 28.3705 27.496 28.1038 27.496ZM28.1038 32.552C27.8958 32.552 27.7465 32.5067 27.6558 32.416C27.5705 32.3307 27.5278 32.2213 27.5278 32.088V31.912C27.5278 31.7787 27.5705 31.6667 27.6558 31.576C27.7465 31.4907 27.8958 31.448 28.1038 31.448C28.3118 31.448 28.4585 31.4907 28.5438 31.576C28.6345 31.6667 28.6798 31.7787 28.6798 31.912V32.088C28.6798 32.2213 28.6345 32.3307 28.5438 32.416C28.4585 32.5067 28.3118 32.552 28.1038 32.552Z" ></path>
                        <path d="M27.2212 0H10.7532C9.76511 0 8.97461 0.834345 8.97461 1.82643V12.334C8.97461 13.3487 9.78701 14.1604 10.7532 14.1604H22.1051L24.6741 16.8211C24.7839 16.9338 24.9157 17.0015 25.0693 17.0015C25.3768 17.0015 25.6402 16.7535 25.6402 16.4153V14.1604H27.2212C28.2092 14.1604 28.9997 13.3261 28.9997 12.334V1.82643C28.9997 0.811779 28.1873 0 27.2212 0ZM13.2783 9.04195C12.378 9.04195 11.6315 8.2753 11.6315 7.35077C11.6315 6.42631 12.378 5.65966 13.2783 5.65966C14.1785 5.65966 14.925 6.42631 14.925 7.35077C14.925 8.2753 14.2005 9.04195 13.2783 9.04195ZM19.0531 9.04195C18.1528 9.04195 17.4062 8.2753 17.4062 7.35077C17.4062 6.42631 18.1528 5.65966 19.0531 5.65966C19.9533 5.65966 20.6998 6.42631 20.6998 7.35077C20.6998 8.2753 19.9533 9.04195 19.0531 9.04195ZM24.8059 9.04195C23.9056 9.04195 23.1591 8.2753 23.1591 7.35077C23.1591 6.42631 23.9056 5.65966 24.8059 5.65966C25.7061 5.65966 26.4526 6.42631 26.4526 7.35077C26.4526 8.2753 25.7061 9.04195 24.8059 9.04195Z" ></path>
                        <path d="M7.9649 12.3782V8.79297H6.16437C5.52762 8.79297 5.00066 9.33418 5.00066 9.98807V16.8878C4.97869 17.5868 5.50564 18.128 6.16437 18.128H7.19637V19.6162C7.19637 19.8192 7.37202 19.9995 7.56964 19.9995C7.67944 19.9995 7.76727 19.9544 7.83312 19.8868L9.52385 18.1505H16.9894C17.6261 18.1505 18.1531 17.6094 18.1531 16.9555V15.2418H10.7535C9.2165 15.2418 7.9649 13.9566 7.9649 12.3782Z"></path>
                    </svg>
                    <span class="svgico--close">
                        <svg viewBox="0 0 19 19" role="presentation">
                        <path d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
            </div>
            </div>
        </div>
        <div id="addthis-modalContact" class="modal fade modal-addThis modal-contactform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Để lại lời nhắn cho chúng tôi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body-popupform">
                    <form accept-charset='UTF-8' action='/contact' class='contact-form' method='post'>
                        <input name='form_type' type='hidden' value='contact'>
                        <input name='utf8' type='hidden' value='✓'>
                        <input name='__RequestVerificationToken' type='hidden' value='CfDJ8FyFPV59mBtNhmQGz0fYZt9Y033wH19q7XfXlnAPp5J5eMKYDyJsKcTePTDSM9Gu_UBrQcEsOrh9x4aXtcq3n6Gd0Wq1IMAumvlRSWYhpDrExVU6vy-2Cq1_V87BSvM3A8EGK-ohXTCuDLO6jnk16pg'>
                        <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input required type="text" class="form-control" id="yourname" name="contact[name]" placeholder="Tên của bạn" aria-label="Tên của bạn">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="youremail" name="contact[email]" placeholder="Email của bạn" aria-label="Email của bạn">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input required pattern="\+?\(?\d{2,4}\)?[\d\s-]{3,}" maxlength="18" type="text" id="yourphone"  name="contact[phone]" class="form-control" placeholder="Số điện thoại của bạn" aria-label="Số điện thoại của bạn">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <textarea required placeholder="Nội dung" class="form-control" id="yourinfor" name="contact[body]" rows="3" aria-label="Nội dung"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="sitebox-recaptcha mb-3">
                                This site is protected by reCAPTCHA and the Google
                                <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                                and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btnSubmit-modal button clearfix" >Gửi cho chúng tôi</button>
                        </div>
                        </div>
                        <input id='361b9251956e4bdd91c7e402a9449743' name='g-recaptcha-response' type='hidden'>
                        <noscript data-src='https://www.google.com/recaptcha/api.js?render=6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s'></noscript>
                        <noscript>let recaptchaElm=document.getElementById('361b9251956e4bdd91c7e402a9449743');let recaptchaForm=recaptchaElm.parentNode;recaptchaForm.addEventListener("submit",function(formEvent){if(!recaptchaElm.value){formEvent.preventDefault();grecaptcha.ready(function(){grecaptcha.execute('6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s',{action:'submit'}).then(function(token){recaptchaElm.value=token;recaptchaForm.requestSubmit(formEvent.submitter)})})}})</noscript>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <div class="modal fade modal-addThis modal-succesform">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-icon sweet-alert">
                    <div class="sa-icon sa-success animate">
                        <span class="sa-line sa-tip animateSuccessTip"></span> <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <p class="modal-title">Đăng kí thông tin thành công</p>
                    <p>Cảm ơn bạn đã để lại thông tin <br> Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất	</p>
                    <p class="txtloading">Thông báo sẽ tự động tắt sau 5 giây...</p>
                </div>
            </div>
            </div>
        </div>
        <div class="modal-live d-none d-lg-block">
            <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FLazadaVietnam%2Fvideos%2F1699075170452462%2F&show_text=0&width=267" width="267" height="476" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            <div class="box-close">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.9" d="M11 0C4.92487 0 0 4.92487 0 11C0 17.0751 4.92487 22 11 22C17.0751 22 22 17.0751 22 11C22 4.92487 17.0751 0 11 0Z" fill="#373535"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.066 11.0007L6.79418 7.72894C6.53605 7.47081 6.53605 7.05231 6.79418 6.79418C7.05231 6.53605 7.47081 6.53605 7.72893 6.79418L11.0007 10.066L14.2713 6.79543C14.5294 6.53731 14.9479 6.53731 15.206 6.79543C15.4641 7.05356 15.4641 7.47206 15.206 7.73019L11.9355 11.0007L15.207 14.2722C15.4651 14.5304 15.4651 14.9489 15.207 15.207C14.9489 15.4651 14.5304 15.4651 14.2722 15.207L11.0007 11.9355L7.72796 15.2082C7.46983 15.4664 7.05133 15.4664 6.7932 15.2082C6.53508 14.9501 6.53508 14.5316 6.7932 14.2735L10.066 11.0007Z" fill="white"></path>
            </svg>
            </div>
        </div>
    </div>
    <div class="siteCart-mobile">
        <div class="siteCart-mobile__header">
            <div class="boxinfo p-count">0 sản phẩm </div>
            <div class="boxinfo p-price">0₫</div>
            <div class="boxinfo">Xem chi tiết</div>
        </div>
        <div class="siteCart-mobile__dialog">
            <div class="siteCart-mobile__header">
            <div class="boxinfo p-count">0 sản phẩm </div>
            <div class="boxinfo p-price">0₫</div>
            <div class="boxinfo">Đóng</div>
            </div>
            <div class="siteCart-mobile__body">
            <div class="sitenav-content sitenav-cart">
                <p class="boxtitle">Giỏ hàng</p>
                <div class="cart-view clearfix">
                    <div class="cart-view-scroll">
                        <table class="clone-item-cart table-clone-cart">
                        <tr class="mini-cart__item d-none">
                            <td class="mini-cart__left"><a class="mnc-link" href="#" title=""><img src="/" alt="" /></a></td>
                            <td class="mini-cart__right">
                                <p class="mini-cart__title">
                                    <a class="mnc-title mnc-link" href="#" title=""></a>
                                    <span class="mnc-variant">	</span>
                                </p>
                                <div class="mini-cart__quantity">
                                    <button class="qty-btn mnc-minus">
                                    <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <rect height="1" width="18" y="9" x="1"></rect>
                                    </svg>
                                    </button>
                                    <input class="qty-value" type="text" readonly="" name="mnc-quantity" value="">
                                    <button class="qty-btn mnc-plus">
                                    <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                    <g transform="translate(0 2)" stroke-width="4"  fill="none" fill-rule="evenodd">
                                        <circle stroke-linecap="square" cx="34" cy="60" r="6"></circle>
                                        <circle stroke-linecap="square" cx="67" cy="60" r="6"></circle>
                                        <path d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547"></path>
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
                            <td colspan="2"><a href="/cart" class="linktocart button ">Xem giỏ hàng</a></td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="siteCart-mobile__overlay"></div>
    </div>
    <div id="quick-view-modal" class="modal fade modal-product-quickview">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content wrapper-quickview">
            </div>
        </div>
    </div>
    <div class="quickviewOverlay"></div>
    <script>
        if(void 0===Haravan)var Haravan={};function floatToString(t,e){var a=t.toFixed(e).toString();return a.replace(".",Haravan.decimal),a.match("^[."+Haravan.decimal+"]d+")?"0"+a:a}Haravan.cultures=[{code:"vi-VN",thousands:",",decimal:".",numberdecimal:0,money_format:""},{code:"en-US",thousands:",",decimal:".",numberdecimal:2,money_format:""}],Haravan.getCulture=function(t){var e;for(n=0;n<Haravan.cultures.length;n++)if(Haravan.cultures[n].code==t){e=Haravan.cultures[n];break}return e||(e=Haravan.cultures[0]),e},Haravan.format=Haravan.getCulture(Haravan.culture),Haravan.money_format="",Haravan.each=function(t,e){for(var a=0;a<t.length;a++)e(t[a],a)},Haravan.map=function(t,e){for(var a=[],r=0;r<t.length;r++)a.push(e(t[r],r));return a},Haravan.arrayIncludes=function(t,e){for(var a=0;a<t.length;a++)if(t[a]==e)return!0;return!1},Haravan.uniq=function(t){for(var e=[],a=0;a<t.length;a++)Haravan.arrayIncludes(e,t[a])||e.push(t[a]);return e},Haravan.isDefined=function(t){return void 0!==t},Haravan.getClass=function(t){return Object.prototype.toString.call(t).slice(8,-1)},Haravan.extend=function(t,e){function a(){}a.prototype=e.prototype,t.prototype=new a,t.prototype.constructor=t,t.baseConstructor=e,t.superClass=e.prototype},Haravan.urlParam=function(t){var e=RegExp("[?&]"+t+"=([^&]*)").exec(window.location.search);return e&&decodeURIComponent(e[1].replace(/\+/g," "))},Haravan.Product=function(t){Haravan.isDefined(t)&&this.update(t)},Haravan.Product.prototype.update=function(t){for(property in t)this[property]=t[property]},Haravan.Product.prototype.optionNames=function(){return"Array"==Haravan.getClass(this.options)?this.options:[]},Haravan.Product.prototype.optionValues=function(t){if(!Haravan.isDefined(this.variants))return null;var e=Haravan.map(this.variants,function(e){var a="option"+(t+1);return null==e[a]?null:e[a]});return null==e[0]?null:Haravan.uniq(e)},Haravan.Product.prototype.getVariant=function(t){var e=null;return t.length!=this.options.length?e:(Haravan.each(this.variants,function(a){for(var r=!0,n=0;n<t.length;n++){a["option"+(n+1)]!=t[n]&&(r=!1)}1!=r||(e=a)}),e)},Haravan.Product.prototype.getVariantById=function(t){for(var e=0;e<this.variants.length;e++){var a=this.variants[e];if(t==a.id)return a}return null},Haravan.formatMoney=function(t,e){"string"==typeof(t/=100)&&(t=t.replace(Haravan.format.thousands,""));var a="",r=/\{\{\s*(\w+)\s*\}\}/,n=e||this.money_format;function o(t){return t.replace(/(\d)(?=(\d\d\d)+(?!\d))/g,"$1"+Haravan.format.thousands)}switch(n.match(r)[1]){case"amount":a=o(floatToString(t,Haravan.format.numberdecimal));break;case"amount_no_decimals":a=o(floatToString(t,0));break;case"amount_with_comma_separator":a=floatToString(t,Haravan.format.numberdecimal).replace(/\./,",");break;case"amount_no_decimals_with_comma_separator":a=o(floatToString(t,0)).replace(/\./,",")}return n.replace(r,a)},Haravan.OptionSelectors=function(t,e){return this.selectorDivClass="selector-wrapper",this.selectorClass="single-option-selector",this.variantIdFieldIdSuffix="-variant-id",this.variantIdField=null,this.historyState=null,this.selectors=[],this.domIdPrefix=t,this.product=new Haravan.Product(e.product),this.onVariantSelected=Haravan.isDefined(e.onVariantSelected)?e.onVariantSelected:function(){},this.replaceSelector(t),this.initDropdown(),e.enableHistoryState&&(this.historyState=new Haravan.OptionSelectors.HistoryState(this)),!0},Haravan.OptionSelectors.prototype.initDropdown=function(){var t={initialLoad:!0};if(!this.selectVariantFromDropdown(t)){var e=this;setTimeout(function(){e.selectVariantFromParams(t)||e.fireOnChangeForFirstDropdown.call(e,t)})}},Haravan.OptionSelectors.prototype.fireOnChangeForFirstDropdown=function(t){!this.selectors&&!this.selectors.length&&this.selectors.length>0&&this.selectors[0].element.onchange(t)},Haravan.OptionSelectors.prototype.selectVariantFromParamsOrDropdown=function(t){this.selectVariantFromParams(t)||this.selectVariantFromDropdown(t)},Haravan.OptionSelectors.prototype.replaceSelector=function(t){var e=document.getElementById(t);if(null!=e){var a=e.parentNode;Haravan.each(this.buildSelectors(),function(t){a.insertBefore(t,e)}),e.style.display="none",this.variantIdField=e}},Haravan.OptionSelectors.prototype.selectVariantFromDropdown=function(t){var e=document.getElementById(this.domIdPrefix);if(!e)return!1;if(null!=(e=e.querySelector("[selected]"))){var a=e.value;return this.selectVariant(a,t)}return!1},Haravan.OptionSelectors.prototype.selectVariantFromParams=function(t){var e=Haravan.urlParam("variant");return this.selectVariant(e,t)},Haravan.OptionSelectors.prototype.selectVariant=function(t,e){var a=this.product.getVariantById(t);if(null==a)return!1;for(var r=0;r<this.selectors.length;r++){var n=this.selectors[r].element,o=a[n.getAttribute("data-option")];null!=o&&this.optionExistInSelect(n,o)&&(n.value=o)}return"undefined"!=typeof jQuery?jQuery(this.selectors[0].element).trigger("change",e):this.selectors[0].element.onchange(e),!0},Haravan.OptionSelectors.prototype.optionExistInSelect=function(t,e){for(var a=0;a<t.options.length;a++)if(t.options[a].value==e)return!0},Haravan.OptionSelectors.prototype.insertSelectors=function(t,e){Haravan.isDefined(e)&&this.setMessageElement(e),this.domIdPrefix="product-"+this.product.id+"-variant-selector";var a=document.getElementById(t);if(!a)return!1;Haravan.each(this.buildSelectors(),function(t){a.appendChild(t)})},Haravan.OptionSelectors.prototype.buildSelectors=function(){for(var t=0;t<this.product.optionNames().length;t++){var e=new Haravan.SingleOptionSelector(this,t,this.product.optionNames()[t],this.product.optionValues(t));e.element.disabled=!1,this.selectors.push(e)}var a=this.selectorDivClass,r=this.product.optionNames();return Haravan.map(this.selectors,function(t){var e=document.createElement("div");if(e.setAttribute("class",a),r.length>1){var n=document.createElement("label");n.htmlFor=t.element.id,n.innerHTML=t.name,e.appendChild(n)}return e.appendChild(t.element),e})},Haravan.OptionSelectors.prototype.selectedValues=function(){for(var t=[],e=0;e<this.selectors.length;e++){var a=this.selectors[e].element.value;t.push(a)}return t},Haravan.OptionSelectors.prototype.updateSelectors=function(t,e){var a=this.selectedValues(),r=this.product.getVariant(a);r?(this.variantIdField.disabled=!1,this.variantIdField.value=r.id):this.variantIdField.disabled=!0,this.onVariantSelected(r,this,e),null!=this.historyState&&this.historyState.onVariantChange(r,this,e)},Haravan.OptionSelectorsFromDOM=function(t,e){var a=e.optionNames||[],r=e.priceFieldExists||!0,n=e.delimiter||"/",o=this.createProductFromSelector(t,a,r,n);e.product=o,Haravan.OptionSelectorsFromDOM.baseConstructor.call(this,t,e)},Haravan.extend(Haravan.OptionSelectorsFromDOM,Haravan.OptionSelectors),Haravan.OptionSelectorsFromDOM.prototype.createProductFromSelector=function(t,e,a,r){if(!Haravan.isDefined(a))a=!0;if(!Haravan.isDefined(r))r="/";var n=document.getElementById(t);if(!n)return!1;var o=n.childNodes,i=(n.parentNode,e.length),s=[];Haravan.each(o,function(t,n){if(1==t.nodeType&&"option"==t.tagName.toLowerCase()){var o=t.innerHTML.split(new RegExp("\\s*\\"+r+"\\s*"));0==e.length&&(i=o.length-(a?1:0));var l=o.slice(0,i),c=a?o[i]:"",u=(t.getAttribute("value"),{available:!t.disabled,id:parseFloat(t.value),price:c,option1:l[0],option2:l[1],option3:l[2]});s.push(u)}});var l={variants:s};if(0==e.length){l.options=[];for(var c=0;c<i;c++)l.options[c]="option "+(c+1)}else l.options=e;return l},Haravan.SingleOptionSelector=function(t,e,a,r){if(this.multiSelector=t,this.values=r,this.index=e,this.name=a,this.element=document.createElement("select"),null!=this.values)for(var n=0;n<this.values.length;n++){var o=document.createElement("option");o.value=r[n],o.innerHTML=r[n],this.element.appendChild(o)}return this.element.setAttribute("class",this.multiSelector.selectorClass),this.element.setAttribute("data-option","option"+(e+1)),this.element.id=t.domIdPrefix+"-option-"+e,this.element.onchange=function(a,r){r=r||{},t.updateSelectors(e,r)},!0},Haravan.Image={preload:function(t,e){for(var a=0;a<t.length;a++){var r=t[a];this.loadImage(this.getSizedImageUrl(r,e))}},loadImage:function(t){(new Image).src=t},switchImage:function(t,e,a){if(t){var r=this.imageSize(e.src),n=this.getSizedImageUrl(t.src,r);a?a(n,t,e):e.src=n}},imageSize:function(t){var e=t.match(/(1024x1024|2048x2048|pico|icon|thumb|small|compact|medium|large|grande)\./);return null!=e?e[1]:null},getSizedImageUrl:function(t,e){if(null==e)return t;if("master"==e)return this.removeProtocol(t);var a=t.match(/\.(jpg|jpeg|gif|png|bmp|bitmap|tiff|tif)(\?v=\d+)?/);if(null!=a){var r=t.split(a[0]),n=a[0];return this.removeProtocol(r[0]+"_"+e+n)}return null},removeProtocol:function(t){return t.replace(/http(s)?:/,"")}},Haravan.OptionSelectors.HistoryState=function(t){this.browserSupports()&&this.register(t)},Haravan.OptionSelectors.HistoryState.prototype.register=function(t){window.addEventListener("popstate",function(e){t.selectVariantFromParamsOrDropdown({popStateCall:!0})})},Haravan.OptionSelectors.HistoryState.prototype.onVariantChange=function(t,e,a){this.browserSupports()&&(!t||a.initialLoad||a.popStateCall||window.history.pushState({},document.title,"?variant="+t.id))},Haravan.OptionSelectors.HistoryState.prototype.browserSupports=function(){return window.history&&window.history.pushState};
    </script>
    {{-- <script src="https://cdn.hstatic.net/shared/api.jquery.js"></script> --}}
    <script src="/site/js/popper.min.js"></script>
    <script src="/site/js/bootstrap.min.js"></script>
    <script src="/site/js/jquery.jgrowl.min.js"></script>
    <script src="/site/js/soon.min.js"></script>

    {{-- <script type="text/javascript" src="//theme.hstatic.net/200000516791/1001206835/14/app-combo.js?v=162" defer></script> --}}
    <!-- SCRIPT THEME -->
    <script>
        if(document.getElementById('left-slider') != null){
        document.documentElement.style.setProperty('--slider-height', document.getElementById('left-slider').offsetHeight + 'px');
        }else{
        document.documentElement.style.setProperty('--slider-height', 0 + 'px');
        }

        function setHeightHeader() {
        let heightHeader = document.getElementById('templateHeader').offsetHeight;
        document.documentElement.style.setProperty('--header-height',heightHeader + 'px');
        }
        setHeightHeader(); window.addEventListener('resize', setHeightHeader);
    </script>
    <script src="/site/js/scripts.js?v=162" defer></script>
    <!-- POPUP LOAD -->
    {{-- <script>
        jQuery(document).ready(function(){


        setTimeout(function(){
            if(sessionStorage.mega_popup == null ){
                $('#popup-contact').modal('show');
            }
        },40000);
            if ($('.popupForm').length > 0){
                $('.popup-form-customer form.contact-form').submit(function(e){
                    var self = $(this);
                    if($(this)[0].checkValidity() == true){
                        e.preventDefault();
                        grecaptcha.ready(function() {
                            grecaptcha.execute('6Le047YqAAAAAKk-dTuIhf_F7L0m3Yp9hOkIxTn1', {action: 'submit'}).then(function(token) {
                                self.find('input[name="g-recaptcha-response"]').val(token);
                                $.ajax({
                                    type: 'POST',
                                    url:'/account/contact',
                                    data: $('.popup-form-customer form.contact-form').serialize(),
                                    success:function(data){
                                        if($(data).find('#error_customer').length == 0){
                                            $('.popup-form-customer .succes-popup').addClass('success').html('Cảm ơn bạn đã đăng ký email theo dõi!');
                                            setTimeout(function(){
                                                $('#popup-contact').modal('hide');
                                                location.reload();
                                            },1500);
                                        }
                                        else{
                                            $('.popup-form-customer .succes-popup').addClass('error').html($(data).find('#error_customer').html());
                                        }
                                    }
                                })
                            })
                        });
                    }
                    if(sessionStorage.mega_popup == null ){
                        sessionStorage.mega_popup = 'show' ;
                    }
                });
            }
            else{
                $(document).on('click','.linkbanner-popup-contact', function(){
                    $('#popup-contact').modal('hide');
                    if(sessionStorage.mega_popup == null ){
                        sessionStorage.mega_popup = 'show' ;
                    }
                });
            }
            $(document).on('click','.modal-popupContact .close-popup-contact', function(e){
                e.preventDefault();
                $('#popup-contact').modal('hide');
                if(sessionStorage.mega_popup == null ){
                    sessionStorage.mega_popup = 'show' ;
                }
            });
            $(".modal-popupContact").on('hidden.bs.modal', function(){
                if(sessionStorage.mega_popup == null ){
                    sessionStorage.mega_popup = 'show' ;
                }
            });
        });
    </script> --}}

    @stack('scripts')
</body>
</html>
