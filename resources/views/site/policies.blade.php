@extends('site.layouts.master')
@section('title')
    {{ $title }}
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
<main class="wrapperMain_content">
    <div class="layout-pageDetail">
        <div class="breadcrumb-shop">
            <div class="container">
                <div class="breadcrumb-list  ">
                    <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="{{ route('front.home-page') }}" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="item" content="{{ route('front.about-us') }}"><strong
                                    itemprop="name">{{ $title }}</strong></span>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="wrapper-pageDetail">
                        <div class="heading-pageDetail">
                            <h1>{{ $title }}</h1>
                        </div>
                        <div class="content-pageDetail typeList-style">
                            {!! $content !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    @include('site.blogs.nav-blog')
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
@endpush
