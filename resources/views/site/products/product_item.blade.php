<div class="product-loop" data-id="1086987155">
    <div class="product-inner" data-proid="1039990487" id="section_1_loop_1">
        <div class="proloop-image">
            <div class="gift product_gift_label d-none" data-id="1039990487">
                <img class="lazyload" data-src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png" src="https://file.hstatic.net/1000308580/file/icon-gifbox_21127e78739a40a28f058e5e123d41b1.png" alt="icon quà tặng">
            </div>
            <div class="product--image">
                <div class="lazy-img first-image">
                    <picture>
                        <source media="(max-width: 480px)" data-srcset="{{ $product->image->path ?? "" }}"
                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        <source media="(min-width: 481px)" data-srcset="{{ $product->image->path ?? "" }}"
                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        <img class="lazyload img-loop " data-src="{{ $product->image->path ?? "" }}"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                             alt=" {{ $product->name }}"  />
                    </picture>
                </div>
                <div class="lazy-img second-image hovered-img d-none d-lg-block">
                    @php
                        $imageSecond = @$product->galleries[0]->image->path ?? ($product->image->path ?? '');
                    @endphp
                    <picture>
                        <source media="(min-width: 481px) and (max-width:767px)" data-srcset="{{ $imageSecond }}"
                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        <source media="(min-width:768px)" data-srcset="{{ $imageSecond }}"
                                srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                        <img  class="lazyload img-loop " data-src="{{ $imageSecond }}"
                              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                              alt="  {{ $product->name }} "/>
                    </picture>
                </div>
            </div>
            <div class="qv-product">
                            <span class="icon-quickview" data-handle="/products/dong-ho-thong-minh-smartwatch-dz09" title="Xem nhanh">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            </span>
            </div>
            <a href="/products/dong-ho-thong-minh-smartwatch-dz09" class="proloop-link quickview-product" data-handle="/products/dong-ho-thong-minh-smartwatch-dz09" title=" {{ $product->name }}" ></a>
        </div>
        <div class="proloop-detail">
            <div class="proloop--top">
                <p class="proloop--vendor"><a title="Show vendor" href="/collections/vendors?q=apple">{{ $product->category->name ?? '' }}</a></p>
            </div>
            <h3><a href="/products/dong-ho-thong-minh-smartwatch-dz09" class="quickview-product" data-handle="/products/dong-ho-thong-minh-smartwatch-dz09"> {{ $product->name }}</a></h3>
            {{--                                            <div class="proloop--variant">--}}
            {{--                                                <span>+4 Màu sắc</span>--}}
            {{--                                            </div>--}}
            <div class="proloop--price on-sale d-flex">
                @if($product->base_price > 0)
                    <div class="price-box">
                        <span class="price">{{ number_format($product->price) }}₫</span>
                        <span class="price-del">{{ number_format($product->base_price) }}₫</span>
                    </div>
                    <span class="pro-sale">-{{ $product->percent_discount }}%</span>
                @else
                    <div class="price-box">
                        <span class="price">{{ number_format($product->price) }}₫</span>
                    </div>
                @endif

            </div>
            <div class="proloop-actions" data-vrid="1086987155" data-handle="dong-ho-thong-minh-smartwatch-dz09">
                <div class="proloop-actions__inner">
                    <div class="actions-primary">
                        <button type="submit" class="btn-proloop-cart add-to-cart  btn-addcart-view " onclick="HRT.All.addCartProdItem('1086987155')" >
                                        <span class="btnico" title="Thêm vào giỏ">
                                        <svg class="btnico-first" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                <path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
                                                <path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
                                            </g>
                                        </svg>
                                        </span>
                            <span class="btnadd">  Thêm vào giỏ </span>
                        </button>
                    </div>
                    <div class="actions-boxqty d-flex">
                        <div class="actions-icon">
                                        <span class="btnico" onclick="HRT.All.addCartProdItem('1086987155')" title="Thêm vào giỏ">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="translate(0 512) scale(.1 -.1)">
                                                <path d="m2371 5100c-150-40-306-141-387-248l-35-48-492-58c-271-32-501-63-512-69-31-16-44-39-45-75 0-32 54-516 64-573 5-25 3-27-44-31-27-3-56-11-65-18s-78-117-155-245l-139-232-86-1660c-47-913-85-1692-85-1730 0-60 3-73 23-91l23-22h2125 2126l21 23c18 19 22 35 22 92 0 37-38 815-85 1728l-86 1660-139 232c-77 128-147 238-156 246-11 9-49 15-106 18-86 3-90 4-84 25 3 11 18 74 33 138 29 128 26 152-19 182-13 8-190 54-393 101-204 47-380 90-391 94-14 6-24 22-28 45-11 60-92 208-153 281-76 91-209 181-324 220-73 25-102 29-219 32-111 2-148-1-209-17zm318-176c139-34 279-140 353-265 21-34 36-64 34-66s-51 8-110 22c-113 28-152 27-180-4-8-9-34-96-56-192-23-95-43-182-46-191-4-14-72-44-80-35-1 1-19 139-39 306-19 167-40 311-44 320-21 39-55 45-163 33-56-7-103-10-106-7-8 8 127 68 183 81 72 18 178 17 254-2zm-329-258c0-2 14-117 30-256 17-139 27-256 23-260s-190-51-413-104c-308-74-410-102-427-118-31-29-30-70 7-220 17-67 30-128 30-135 0-10-45-13-203-13h-203l-56 478c-31 262-56 478-55 478 1 1 283 36 627 77s628 75 633 76c4 0 7-1 7-3zm1105-357c242-56 444-105 449-110 6-5-20-134-64-324l-74-315h-246-246l-82 343c-72 301-85 345-107 365-31 26-65 28-147 6-33-8-61-14-63-12-1 2 7 42 18 89l20 86 51-13c28-7 249-58 491-115zm-495-226c0-5 27-120 60-257 33-136 60-252 60-257s-276-9-643-9h-642l-28 117c-15 64-26 117-24 119 2 1 1194 291 1210 293 4 0 7-2 7-6zm-1980-282c0-9 14-119 25-203l5-38h-100c-55 0-100 3-100 6 0 18 145 244 156 244 8 0 14-4 14-9zm3239-110c39-66 71-122 71-125s-74-6-165-6-165 3-165 8c0 4 12 60 27 125l27 117h67 66l72-119zm155-373c3-35 40-733 81-1553s76-1511 78-1537l4-48h-1987-1987l4 48c2 26 37 717 78 1537s78 1518 81 1553l6 62h1818 1818l6-62z"/>
                                                <path d="m1850 3209c-168-32-260-248-169-395 24-39 82-92 114-104 23-9 23-10 27-242 4-223 5-236 32-313 85-248 285-432 534-492 88-21 256-21 344 0 249 60 449 244 534 492 27 77 28 90 32 312l4 233 34 16c42 20 101 85 121 133 24 55 21 159-6 214-26 53-87 112-140 134-46 20-156 20-202 0-199-83-215-381-26-479l39-19-4-207c-5-237-17-291-88-400-225-349-715-349-940 0-71 109-83 164-88 400l-4 207 39 19c85 44 132 127 133 232 0 175-145 292-320 259z"/>
                                            </g>
                                        </svg>
                                        </span>
                        </div>
                        <div class="actions-wrapqty d-flex">
                            <button class="qty-btn proloop-minus" onclick="HRT.All.minusQtyProdItem('1086987155')">
                                <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <rect height="1" width="18" y="9" x="1"></rect>
                                </svg>
                            </button>
                            <input class="proloop-value" type="text" readonly="" name="proloop-quantity" value="">
                            <button class="qty-btn proloop-plus" onclick="HRT.All.plusQtyProdItem('1086987155')">
                                <svg width="18" height="18" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="9" y="1" width="1" height="17"></rect>
                                    <rect x="1" y="9" width="17" height="1"></rect>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
