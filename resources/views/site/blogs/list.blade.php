@extends('site.layouts.master')
@section('title')
    {{ $cate_title }}
@endsection
@section('description')
    {{ $cate_des ?? '' }}
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
        <div class="layout-blogs">
            <div class="breadcrumb-shop">
                <div class="container">
                    <div class="breadcrumb-list  ">
                        <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a href="{{ route('front.home-page') }}" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <span itemprop="item" content="{{ $cate_title }}"><strong
                                        itemprop="name">{{ $cate_title }}</strong></span>
                                <meta itemprop="position" content="2" />
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <style>
                /* Mỗi cột là flex để inner có thể cao 100% theo hàng */
                .article-loop{ display:flex; }

                /* Thẻ bao: nền, bo góc, đổ bóng nhẹ, cao 100% */
                .equal-card{
                    display:flex; flex-direction:column; width:100%; height:100%;
                    background:#fff; border:1px solid #eef1f4; border-radius:10px;
                    overflow:hidden; box-shadow:0 1px 2px rgba(0,0,0,.03);
                }

                /* Ảnh cùng tỷ lệ & cover */
                .article-image{
                    position:relative; aspect-ratio: 16 / 9;   /* đổi 4/3 nếu bạn thích */
                    background:#f3f4f6; overflow:hidden;
                }
                .article-image img{ width:100%; height:100%; display:block; object-fit:cover; }

                /* Nội dung */
                .article-detail{ display:flex; flex-direction:column; padding:12px 14px; flex:1 1 auto; }
                .article-title{ margin:0 0 6px; }
                .article-title a{ color:#111827; text-decoration:none; }

                /* Giới hạn dòng để đều khối */
                .clamp-2{
                    display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;
                    overflow:hidden;
                }
                .clamp-3{
                    display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical;
                    overflow:hidden; color:#4b5563; margin:0 0 10px;
                }

                /* Meta đẩy xuống đáy, tạo viền ngăn */
                .article-post-meta{
                    margin-top:auto; display:flex; justify-content:space-between; gap:10px;
                    padding-top:10px; border-top:1px solid #eef1f4; color:#6b7280; font-size:13px;
                }

                /* Mobile tinh gọn */
                @media (max-width: 767.98px){
                    .article-detail{ padding:10px 12px; }
                    .article-image{ aspect-ratio: 4 / 3; }   /* cao hơn một chút cho mobile */
                }

            </style>
            <div class="wrapper-contentBlogs">
                <div class="container">
                    <div class="row dFlex-row">
                        <div class="col-lg-9 col-md-12 col-12 boxBlog-left">
                            <div class="listBlogs-content">
                                <div class="heading-page">
                                    <h1>{{ $cate_title }}</h1>
                                </div>
                                <div class="list-article-content blog-posts row">
                                    <!-- Begin: Nội dung blog -->
                                    @foreach ($blogs as $blog)
{{--                                    <article class="article-loop col-md-6 col-6">--}}
{{--                                        <div class="article-inner">--}}
{{--                                            <div class="article-image">--}}
{{--                                                <a href="{{ route('front.detail-blog', $blog->slug) }}"--}}
{{--                                                    class="blog-post-thumbnail"--}}
{{--                                                    title="{{ $blog->name }}"--}}
{{--                                                    rel="nofollow">--}}
{{--                                                    <img class="lazyload"--}}
{{--                                                        data-src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}"--}}
{{--                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="--}}
{{--                                                        alt="{{ $blog->name }}">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="article-detail">--}}
{{--                                                <div class="article-title">--}}
{{--                                                    <h3 class="post-title">--}}
{{--                                                        <a href="{{ route('front.detail-blog', $blog->slug) }}"--}}
{{--                                                            title="{{ $blog->name }}">{{ $blog->name }}</a>--}}
{{--                                                    </h3>--}}
{{--                                                </div>--}}
{{--                                                <p class="entry-content">{!! $blog->intro !!}</p>--}}
{{--                                                <div class="article-post-meta">--}}
{{--                                                    <span class="author">bởi: {{ $blog->created_by ? $blog->created_by->name : 'Admin' }}</span>--}}
{{--                                                    <span class="date">--}}
{{--                                                        <time>{{ $blog->created_at->format('d') }} Tháng {{ $blog->created_at->format('m') }}, {{ $blog->created_at->format('Y') }}</time>--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </article>--}}


                                        <article class="article-loop col-md-6 col-6 d-flex">
                                            <div class="article-inner equal-card">
                                                <div class="article-image">
                                                    <a href="{{ route('front.detail-blog', $blog->slug) }}" class="blog-post-thumbnail" title="{{ $blog->name }}" rel="nofollow">
                                                        <img class="lazyload"
                                                             data-src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}"
                                                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                             alt="{{ $blog->name }}">
                                                    </a>
                                                </div>

                                                <div class="article-detail">
                                                    <div class="article-title">
                                                        <h3 class="post-title clamp-2">
                                                            <a href="{{ route('front.detail-blog', $blog->slug) }}" title="{{ $blog->name }}">{{ $blog->name }}</a>
                                                        </h3>
                                                    </div>

                                                    <p class="entry-content clamp-3">{!! $blog->intro !!}</p>

                                                    <div class="article-post-meta">
                                                        <span class="author">bởi: {{ $blog->created_by ? $blog->created_by->name : 'Admin' }}</span>
                                                        <span class="date">
          <time>{{ $blog->created_at->format('d') }} Tháng {{ $blog->created_at->format('m') }}, {{ $blog->created_at->format('Y') }}</time>
        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                    @endforeach
                                </div>
                                <div class="pagination-shop pagi  text-center">
                                    <div id="pagination">
                                        {{ $blogs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12 boxBlog-right">
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
                                                    <a
                                                        href="{{ route('front.detail-blog', $newBlog->slug) }}">
                                                        <img class="lazyload"
                                                            data-src="{{ $newBlog->image ? $newBlog->image->path : 'https://placehold.co/600x400' }}"
                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                                            alt="{{ $newBlog->name }}" /></a>
                                                </div>
                                                <div class="post-content">
                                                    <h3><a
                                                            href="{{ route('front.detail-blog', $newBlog->slug) }}">{{ $newBlog->name }}</a></h3>
                                                    <p class="post-meta">
                                                        <span class="cate">{{ $newBlog->category->name }}</span>
                                                        <span class="author d-none"><a
                                                                href="{{ route('front.detail-blog', $newBlog->slug) }}">{{ $newBlog->created_by ? $newBlog->created_by->name : 'Admin' }}</a></span>
                                                        <span class="date">{{ $newBlog->created_at->format('d') }} Tháng {{ $newBlog->created_at->format('m') }}, {{ $newBlog->created_at->format('Y') }}</span>
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
