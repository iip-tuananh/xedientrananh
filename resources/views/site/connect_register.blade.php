@extends('site.layouts.master')
@section('title')
    Đăng ký CTV/Đại lý
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1743048451127" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/style_page.scss.css?1743048451127" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/cvt_style.scss.css?1743048451127" rel="stylesheet" type="text/css" media="all" />
    <style>
        .error {
            color: red;
            font-size: 12px;
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')
    <div ng-controller="ContactUsController" ng-cloak>
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="home">
                        <a href="{{ route('front.home-page') }}" title="Trang chủ">
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <strong>Đăng ký CTV</strong>
                    </li>
                </ul>
            </div>
        </section>
        <div class="layout-ctv">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="contact">
                            <h4>
                                {{ $config->web_title }}
                            </h4>
                        </div>
                        <div class="form-contact">
                            <h4>
                                hợp tác với chúng tôi
                            </h4>
                            <div class="des_foo">
                                Chính sách hợp tác ưu đãi nhiều hấp dẫn dành cho các CTV/ Đại lý
                            </div>
                            <div id="pagelogin">
                                <form id="contact" accept-charset="UTF-8">
                                    <div class="group_contact">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 10px;">
                                                <input placeholder="Họ và tên" type="text"
                                                    class="form-control  form-control-lg" required value=""
                                                    ng-model="your_name" style="margin-bottom: 0;">
                                                <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors.your_name">
                                                        <% errors.your_name[0] %>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 10px;">
                                                <input placeholder="Email" type="email"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required
                                                    id="email1" class="form-control form-control-lg" value=""
                                                    ng-model="your_email" style="margin-bottom: 0;">
                                                <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors.your_email">
                                                        <% errors.your_email[0] %>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom: 10px;">
                                                <input type="text" placeholder="Điện thoại" ng-model="your_phone"
                                                    class="form-control form-control-lg" required style="margin-bottom: 0;">
                                                <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors.your_phone">
                                                        <% errors.your_phone[0] %>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <input placeholder="Khu vực đăng ký" type="text"
                                                    class="form-control  form-control-lg" required value=""
                                                    ng-model="your_location">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <textarea placeholder="Nội dung" id="comment" class="form-control content-area form-control-lg" rows="5"
                                                    ng-model="your_message"></textarea>
                                                <button type="button" class="btn-lienhe" ng-click="submitContact()">Gửi
                                                    thông tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="banner_ctv">
                            <img width="660" height="520" src="/site/images/banner_ctv.jpg?1729657650563"
                                alt="Banner" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        app.controller('ContactUsController', function($scope, $http) {
            $scope.loading = false;
            $scope.errors = {};
            $scope.submitContact = function() {
                $scope.loading = true;
                let data = {
                    your_name: $scope.your_name,
                    your_email: $scope.your_email,
                    your_phone: $scope.your_phone,
                    your_location: $scope.your_location,
                    your_message: $scope.your_message
                };
                jQuery.ajax({
                    url: '{{ route('front.post-contact') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Thao tác thành công !')
                        } else {
                            $scope.errors = response.errors;
                            toastr.error('Thao tác thất bại !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                        $scope.loading = false;
                    }
                });
            };
        });
    </script>
@endpush
