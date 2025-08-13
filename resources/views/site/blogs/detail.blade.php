@extends('site.layouts.master')
@section('title')
    {{ $blog_title }}
@endsection
@section('description')
    {{ strip_tags($blog->intro) }}
@endsection
@section('image')
    {{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}
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
        <div class="layout-article" id="article">
            <div class="breadcrumb-shop">
                <div class="container">
                    <div class="breadcrumb-list blog-breadcrumb ">
                        <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a href="{{ route('front.home-page') }}" target="_self" itemprop="item"><span
                                        itemprop="name">Trang chủ</span></a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a href="{{ route('front.list-blog', $category->slug) }}" itemprop="item">
                                    <span itemprop="name">{{ $cate_title }}</span>
                                </a>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <span itemprop="item" content="{{ route('front.detail-blog', $blog_slug) }}"><strong
                                        itemprop="name">{{ $blog_title }}</strong></span>
                                <meta itemprop="position" content="3" />
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="wrapper-contentArticle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-12 boxAricle-left">
                            <div class="inforArticle-content">
                                <div class="boxArticle-detail">
                                    <div class="heading-article">
                                        <h1>{{ $blog_title }}</h1>
                                        <div class="article-post-meta">
                                            <span class="author">bởi:
                                                {{ $blog->created_user ? $blog->created_user->name : 'Admin' }}</span>
                                            <span class="date">
                                                <time>{{ $blog->created_at->format('d') }} Tháng
                                                    {{ $blog->created_at->format('m') }},
                                                    {{ $blog->created_at->format('Y') }}</time>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-content">
                                        <div class="box-article-heading clearfix">
                                            <div class="background-img">
                                                <img src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}"
                                                    width="100%" alt="{{ $blog_title }}" loading="lazy">
                                            </div>
                                        </div>
                                        <div class="box-article-detail article-body article-table-contents typeList-style">
                                            {!! $blog->body !!}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="article-related">
                                    <h3 class="title-blog-related">
                                        <span>
                                            Bài viết liên quan </span>
                                    </h3>
                                    <div class="content-blogs-related">
                                        <div
                                            class="list-blogs-related list-article-content owl-carousel owlCarousel-style icon-arrow owlCarousel-dfex">
                                            @foreach ($other_blogs as $other_blog)
                                                <article class="article-loop">
                                                    <div class="article-inner">
                                                        <div class="article-image">
                                                            <a href="{{ route('front.detail-blog', $other_blog->slug) }}"
                                                                class="blog-post-thumbnail" title="{{ $other_blog->name }}"
                                                                rel="nofollow">
                                                                <img class="lazyload"
                                                                    data-src="{{ $other_blog->image ? $other_blog->image->path : 'https://placehold.co/600x400' }}"
                                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                    alt="{{ $other_blog->name }}">
                                                            </a>
                                                        </div>
                                                        <div class="article-detail">
                                                            <div class="article-title">
                                                                <h3 class="post-title">
                                                                    <a href="{{ route('front.detail-blog', $other_blog->slug) }}"
                                                                        title="{{ $other_blog->name }}">{{ $other_blog->name }}</a>
                                                                </h3>
                                                            </div>
                                                            <p class="entry-content">{!! $other_blog->intro !!}</p>
                                                            <div class="article-post-meta">
                                                                <span class="date">
                                                                    <time>{{ $other_blog->created_at->format('d') }} Tháng
                                                                        {{ $other_blog->created_at->format('m') }},
                                                                        {{ $other_blog->created_at->format('Y') }}</time>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12 boxAricle-right">
                            <aside class="sidebar-blogs blogs-aside--sticky">
                                <!-- Bai viet moi nhat -->
                                <div class="group-sidebox">
                                    <div class="sidebox-title ">
                                        <h3 class="htitle">Bài viêt mới nhất</h3>
                                    </div>
                                    <div class="sidebox-content sidebox-content-togged">
                                        <div class="list-blogs-latest">
                                            @foreach ($newBlogs as $newBlog)
                                                <div class="item-article clearfix ">
                                                    <div class="post-image">
                                                        <a href="{{ route('front.detail-blog', $newBlog->slug) }}">
                                                            <img class="lazyload"
                                                                data-src="{{ $newBlog->image ? $newBlog->image->path : 'https://placehold.co/600x400' }}"
                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                                alt="{{ $newBlog->name }}" /></a>
                                                    </div>
                                                    <div class="post-content">
                                                        <h3><a
                                                                href="{{ route('front.detail-blog', $newBlog->slug) }}">{{ $newBlog->name }}</a>
                                                        </h3>
                                                        <p class="post-meta">
                                                            <span class="cate">{{ $newBlog->category->name }}</span>
                                                            <span class="author d-none"><a
                                                                    href="{{ route('front.detail-blog', $newBlog->slug) }}">{{ $newBlog->created_by ? $newBlog->created_by->name : 'Admin' }}</a></span>
                                                            <span class="date">{{ $newBlog->created_at->format('d') }}
                                                                Tháng {{ $newBlog->created_at->format('m') }},
                                                                {{ $newBlog->created_at->format('Y') }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Menu bai viet -->
                                @include('site.blogs.nav-blog')
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
@endpush
