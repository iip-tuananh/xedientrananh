@extends('site.layouts.master')
@section('title')
    Liên hệ
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
    <div class="section-main ">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <main class="wrapperMain_content" ng-controller="ContactUsController" ng-cloak>
        <div class="layout-pageContact">
            <div class="breadcrumb-shop">
                <div class="container">
                    <div class="breadcrumb-list  ">
                        <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a href="{{ route('front.home-page') }}" target="_self" itemprop="item"><span
                                        itemprop="name">Trang chủ</span></a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <span itemprop="item" content="{{ route('front.contact-us') }}"><strong itemprop="name">Liên
                                        hệ</strong></span>
                                <meta itemprop="position" content="2" />
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="wrapper-bodycontact">
                <div class="heading-pageDetail d-none">
                    <div class="container">
                        <h1>Liên hệ</h1>
                    </div>
                </div>
                <div class="wrapbox-content-contact">
                    <div class="container">
                        <div class="row widthContent">
                            <div class="col-lg-6 col-md-12 col-12 wrapbox-content-left">
                                <div class="box-info-contact">
                                    <h2>Thông tin liên hệ</h2>
                                    <div class="wrapbox-contact">
                                        <ul class="infoList-contact row">
                                            <li class="col-md-12 col-xs-12">
                                                <span><i class="fa fa-map-marker"></i></span>
                                                <p><strong>Địa chỉ</strong><br>{{ $config->address_company }}</p>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <span><i class="fa fa-phone"></i></span>
                                                <p><strong>Điện thoại</strong><br>{{ $config->hotline }}</p>
                                            </li>
                                        </ul>
                                        <ul class="infoList-contact row">
                                            <li class="col-md-12 col-xs-12">
                                                <span><i class="fa fa-calendar"></i></span>
                                                <p><strong>Thời gian làm việc</strong><br>
                                                    @php
                                                        $workingTime = $config->working_time;
                                                        $workingTime = explode("\n", $workingTime);
                                                    @endphp
                                                    @foreach ($workingTime as $item)
                                                        {{ $item }}<br>
                                                    @endforeach
                                                </p>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <span><i class="fa fa-envelope-o"></i></span>
                                                <p><strong>Email</strong><br>{{ $config->email }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box-send-contact">
                                    <h2>Gửi thắc mắc cho chúng tôi</h2>
                                    <p>Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc
                                        lại với bạn sớm nhất có thể .</p>
                                    <div id="col-left contactFormWrapper">
                                        <form class='contact-form'>
                                            <div class="contact-form">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="input-group">
                                                            <input required type="text" ng-model="your_name"
                                                                class="form-control" placeholder="Tên của bạn"
                                                                aria-describedby="basic-addon1">
                                                            <div class="invalid-feedback d-block error" role="alert">
                                                                <span ng-if="errors && errors.your_name">
                                                                    <% errors.your_name[0] %>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="input-group">
                                                            <input required type="text" ng-model="your_email"
                                                                class="form-control" placeholder="Email của bạn"
                                                                aria-describedby="basic-addon1">
                                                            <div class="invalid-feedback d-block error" role="alert">
                                                                <span ng-if="errors && errors.your_email">
                                                                    <% errors.your_email[0] %>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="input-group">
                                                            <input pattern="[0-9]{10,12}" required type="text"
                                                                ng-model="your_phone" class="form-control"
                                                                placeholder="Số điện thoại của bạn"
                                                                aria-describedby="basic-addon1">
                                                            <div class="invalid-feedback d-block error" role="alert">
                                                                <span ng-if="errors && errors.your_phone">
                                                                    <% errors.your_phone[0] %>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="input-group">
                                                            <textarea required ng-model="your_message" placeholder="Nội dung"></textarea>
                                                            <div class="invalid-feedback d-block error" role="alert">
                                                                <span ng-if="errors && errors.your_message">
                                                                    <% errors.your_message[0] %>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-xs-12">
                                                        <button class="button dark" ng-click="submitContact()"
                                                            ng-disabled="loading">Gửi cho chúng tôi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 wrapbox-content-right">
                                <div class="box-map-contact">
                                    {!! $config->location !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
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
