<aside class="sidebar-page">
    <!-- Menu sidebar  -->
    <div class="group-sidebox">
        <div class="sidebox-title ">
            <h3 class="htitle">
                Danh mục bài viết
            </h3>
        </div>
        <div class="sidebox-content sidebox-content-togged">
            <ul class="menuList-links">
                <li class=""><a href="{{ route('front.home-page') }}" title="Trang chủ"><span>Trang chủ</span></a>
                </li>
                <li class=""><a href="{{ route('front.about-us') }}" title="Giới thiệu"><span>Giới
                            thiệu</span></a>
                </li>
                <li class="has-submenu level0 ">
                    <a href="javascript:void(0)" title="Sản phẩm">Sản phẩm <span
                            class="icon-plus-submenu plus-nClick1"></span></a>
                    <ul class="submenu-links">
                        @foreach ($productCategories as $category)
                            <li class="has-submenu level1">
                                <a href="{{ route('front.show-product-category', $category->slug) }}">{{ $category->name }}
                                    @if ($category->childs->count() > 0)
                                        <span class="icon-plus-submenu plus-nClick2"></span>
                                    @endif
                                </a>
                                @if ($category->childs->count() > 0)
                                <ul class="submenu-links">
                                    @foreach ($category->childs as $child)
                                        <li class=""><a
                                                href="{{ route('front.show-product-category', $child->slug) }}"
                                                title="{{ $child->name }}">{{ $child->name }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                @foreach ($postCategories as $category)
                    <li class="has-submenu level0 ">
                        <a href="{{ route('front.list-blog', $category->slug) }}"
                            title="{{ $category->name }}">{{ $category->name }}
                            @if ($category->getChilds()->count() > 0)
                                <span class="icon-plus-submenu plus-nClick1"></span>
                            @endif
                        </a>
                        @if ($category->getChilds()->count() > 0)
                            <ul class="submenu-links">
                                @foreach ($category->getChilds() as $child)
                                    <li><a href="{{ route('front.list-blog', $child->slug) }}"
                                            title="{{ $child->name }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

                <li class=""><a href="{{ route('front.contact-us') }}" title="Liên hệ"><span>Liên
                            hệ</span></a></li>
            </ul>
        </div>
    </div>
</aside>
