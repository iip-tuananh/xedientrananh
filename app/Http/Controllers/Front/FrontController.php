<?php

namespace App\Http\Controllers\Front;

use App\Helpers\FileHelper;
use App\Http\Traits\ResponseTrait;
use App\Model\Admin\BannerGroup;
use App\Model\Admin\Block;
use App\Model\Admin\Category;
use App\Model\Admin\CategorySpecial;
use App\Model\Admin\Product;
use App\Model\Admin\ProductVariant;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use Response;
use App\Http\Controllers\Controller;
use App\Model\Admin\Attribute;
use App\Model\Admin\Banner;
use App\Model\Admin\Config;
use App\Model\Admin\Contact;
use App\Model\Admin\Order;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\Partner;
use App\Model\Admin\Policy;
use App\Model\Admin\Post;
use App\Model\Admin\PostCategory;
use App\Model\Admin\ProductRate;
use App\Model\Admin\Review;
use App\Model\Admin\Voucher;
use App\Model\Common\User;
use DB;
use Mail;
use SluggableScopeHelpers;

class FrontController extends Controller
{
    use ResponseTrait;

    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function homePage()
    {
        $data['banners'] = Banner::with(['image'])->where('position', 1)->get();
        // $data['reviews'] = Review::query()->with(['image'])->orderBy('id', 'desc')->get();
        $data['smallBanners'] = Banner::with(['image'])->where('position', 2)->orderBy('id', 'desc')->limit(4)->get();
        // $data['partners'] = Partner::with(['image'])->limit(3)->get();
        // $data['newProducts'] = Product::with(['image'])->where('status', 1)->limit(6)->orderBy('id', 'DESC')->inRandomOrder()->get();
        $data['categorySpecialPost'] = CategorySpecial::query()->with([
            'posts' => function ($q) {
                $q->where('status', 1);
            }
        ])
            ->has('posts')
            ->where('type', 20)
            ->where('show_home_page', 1)
            ->orderBy('order_number')->get();

        // lấy danh mục đặc biệt flash sale (có end_date)
        $data['categorySpecialFlashsale'] = CategorySpecial::query()
            ->whereHas('products', function ($q) {
                $q->where('status', 1);
            })
            ->where('type', 10)
            ->where('show_home_page', 1)
            ->orderBy('order_number')
            ->with([
                'products' => function ($query) {
                    $query->where('status', 1)
                        ->with([
                            'image',
                            'category',
                            'galleries' => function ($q) {
                                $q->select(['id', 'product_id', 'sort'])
                                    ->with(['image'])
                                    ->orderBy('sort', 'ASC');
                            },
                        ])->inRandomOrder();
                }
            ])
            ->whereNotNull('end_date')
            ->get();

        // lấy danh mục đặc biệt (end_date = null)
        $data['categorySpecial'] = CategorySpecial::query()->with([
            'products' => function ($q) {
                $q->with([
                    'image',
                    'category',
                    'galleries' => function ($q) {
                        $q->select(['id', 'product_id', 'sort'])
                            ->with(['image'])
                            ->orderBy('sort', 'ASC');
                    },
                ])->where('status', 1)->inRandomOrder();
            }
        ])
            ->whereHas('products', function ($q) {
                $q->where('status', 1);
            })
            ->where('type', 10)
            ->where('show_home_page', 1)
            ->whereNull('end_date')
            ->orderBy('order_number')->get()->map(function ($query) {
                $query->setRelation('products', $query->products->where('status', 1)->take(12));
                return $query;
            });


        // lấy danh mục sản phẩm
        $data['productCategories'] = Category::query()
            ->whereHas('products', function ($q) {
                $q->where('status', 1);
            })->with([
            'products' => function ($query) {
                $query->where('status', 1)
                    ->with([
                        'image',
                        'category',
                    ])->inRandomOrder();
            }
        ])->where(['show_home_page' => 1, 'level' => 1])
            ->orderBy('order_number')->get()->map(function ($query) {
                $query->setRelation('products', $query->products()->where('status', 1)
                    ->inRandomOrder()
                    ->take(12)->get());
                return $query;
            });
        // 3 khối banner
        $data['bannerGroups'] = BannerGroup::query()->with(['galleries.image'])->latest()->get();

        // bài viết mới nhất
        $data['posts'] = Post::query()->with(['image'])->latest()->get()->take(5);

        // $productCategories = Category::query()->with([
        //     'childs' => function ($q) {
        //         $q->with([
        //             'childs'
        //         ]);
        //     }
        // ])
        // ->where('show_home_page', 1)
        // ->orderBy('sort_order')
        // ->get();
        // foreach ($productCategories as $category) {
        //     $category_parent_id = $category->parent ? $category->parent->id : null;
        //     $arr_category_id = array_merge($category->childs->pluck('id')->toArray(), [$category->id, $category_parent_id]);
        //     if ($category->childs) {
        //         foreach ($category->childs as $child) {
        //             $arr_category_id = array_merge($arr_category_id, $child->childs->pluck('id')->toArray());
        //         }
        //     }
        //     $category->products = Product::query()->where('status', 1)->whereIn('cate_id', $arr_category_id)->inRandomOrder()->limit(12)->select(['id', 'name', 'slug', 'price', 'base_price', 'unit_id', 'cate_id'])->get();
        // }
        // $data['productCategories'] = $productCategories;

        // $data['vouchers'] = Voucher::query()->where('status', 1)->where('quantity', '>', 0)->where('to_date', '>=', now())->orderBy('created_at', 'desc')->get();
        // block khối ảnh cuối trang
        // $block = Block::query()->find(1);
        // $data['block'] = $block;

        return view('site.home', $data);
    }

    // ajax load product home page
    public function loadProductHomePage(Request $request)
    {
        $category = CategorySpecial::findBySlug($request->handle);
        $products = $category->products()->with([
            'image', 'galleries',
            'product_rates' => function ($q) {
                $q->where('status', 2);
            }
        ])->where('status', 1)->limit(10)->orderBy('created_at', 'desc')->get();
        $html = '';
        foreach ($products as $product) {
            $html .= view('site.partials.item_product', compact('product', 'category'))->render();
        }

        return Response::json([
            'html' => $html,
        ]);
    }

    // ajax get product quick view
    public function getProductQuickView(Request $request)
    {
        // $product = Product::findBySlug($request->handle);
        $product = Product::with([
            'product_rates' => function ($q) {
                $q->where('status', 2);
            }
        ])->where('id', $request->product_id)->first();
        $html = view('site.partials.quick_view_product', compact('product'))->render();

        return Response::json([
            'html' => $html,
        ]);
    }

    public function showProductDetail($slug)
    {
        $data['product'] = Product::with(['category', 'attrs.group', 'manufacturer', 'variants' => function ($q) {
            $q->with(['image', 'galleries.image']);
        }])->where('slug', $slug)->first();

        $data['variantDefault'] = ProductVariant::query()->with(['image', 'galleries.image'])
            ->where('product_id', $data['product']->id)
            ->where('is_default', 1)
            ->first();

        $groups = [];

        foreach ($data['product']->attrs as $a) {
            $val = isset($a['pivot']['value']) ? trim((string)$a['pivot']['value']) : '';
            if ($val === '') continue;

            $g    = isset($a['group']) ? $a['group'] : [];
            $gid  = isset($g['id']) ? $g['id'] : 0;
            $gname = isset($g['name']) ? $g['name'] : 'Khác';
            $gsort = isset($g['sort_order']) ? (int)$g['sort_order'] : 9999;

            if (!isset($groups[$gid])) {
                $groups[$gid] = [
                    'id'         => $gid,
                    'name'       => $gname,
                    'sort_order' => $gsort,
                    'items'      => [] // key theo attribute id
                ];
            }

            $attrId   = isset($a['id']) ? $a['id'] : md5(isset($a['name']) ? $a['name'] : '');
            $attrName = isset($a['name']) ? $a['name'] : '';

            if (!isset($groups[$gid]['items'][$attrId])) {
                $groups[$gid]['items'][$attrId] = [
                    'label'  => $attrName,
                    'values' => []
                ];
            }

            // thêm giá trị nếu chưa có (tránh trùng)
            if (!in_array($val, $groups[$gid]['items'][$attrId]['values'], true)) {
                $groups[$gid]['items'][$attrId]['values'][] = $val;
            }
        }

        // chuyển items về mảng tuần tự + sort
        $out = array_values($groups);
        foreach ($out as &$gr) {
            $gr['items'] = array_values($gr['items']);

            // sort item trong group theo label (tùy chọn)
            usort($gr['items'], function($x,$y){
                return strnatcasecmp($x['label'], $y['label']);
            });
        }
        unset($gr);

        // sort group theo sort_order rồi name
        usort($out, function ($a, $b) {
            $so = $a['sort_order'] <=> $b['sort_order'];
            if ($so !== 0) return $so;
            return strnatcasecmp($a['name'], $b['name']);
        });

        $data['attributes'] = $out;

        return view('site.products.product_detail', $data);
    }


    public function showProductCategory(Request $request, $categorySlug = null)
    {
        $categories = Category::parent()->with('products')->orderBy('sort_order')->get();
        $category = Category::with(['childs'])->where('slug', $categorySlug)->first();

        $attributes = [];
        $sort = $request->get('sort') ?: 'lasted';
        $tag = $request->get('tag') ?: null;
        $request_product_ids = [];
        if ($tag) {
            $code_tags = $tag ? explode(',', $tag) : [];
            $tag_ids = Tag::query()->whereIn('code', $code_tags)->pluck('id')->toArray();
            $request_product_ids = Tagable::query()->whereIn('tag_id', $tag_ids)->where('tagable_type', Product::class)->pluck('tagable_id')->toArray();
        }
        $sort = $request->get('sort') ?: 'lasted';
        if ($category) {
            $category_parent_id = $category->parent ? $category->parent->id : null;
            $arr_category_id = array_merge($category->childs->pluck('id')->toArray(), [$category->id, $category_parent_id]);
            if ($category->childs) {
                foreach ($category->childs as $child) {
                    $arr_category_id = array_merge($arr_category_id, $child->childs->pluck('id')->toArray());
                }
            }
            $attributes = Attribute::query()->with(['tags' => function ($q) use ($arr_category_id) {
                $q->with(['products' => function ($q) use ($arr_category_id) {
                    $q->where('status', 1)->whereIn('cate_id', $arr_category_id);
                }]);
            }])->get();

            $products = Product::with([
                'product_rates' => function ($q) {
                    $q->where('status', 2);
                }
            ])
                ->where(function ($q) use ($request_product_ids) {
                    if (!empty($request_product_ids)) {
                        $q->whereIn('id', array_unique($request_product_ids));
                    }
                })
                ->where('status', 1)->whereIn('cate_id', $arr_category_id)->orderBy('created_at', 'desc')->paginate(20);
        } else {
            $category = CategorySpecial::findBySlug($categorySlug);
            $arr_product_ids = $category->products()->pluck('product_id')->toArray();
            $products = $category->products()->with([
                'product_rates' => function ($q) {
                    $q->where('status', 2);
                }
            ])
                ->where(function ($q) use ($request_product_ids) {
                    if (!empty($request_product_ids)) {
                        $q->whereIn('products.id', $request_product_ids);
                    }
                })
                ->where('products.status', 1)->orderBy('products.created_at', 'desc')->paginate(20);
            $attributes = Attribute::query()->with(['tags' => function ($q) use ($arr_product_ids) {
                $q->with(['products' => function ($q) use ($arr_product_ids) {
                    $q->where('products.status', 1)->whereIn('products.id', array_unique($arr_product_ids));
                }]);
            }])->get();
        }

        $title = $category->name;
        $short_des = $category->short_des;
        $title_sub = $category->name;

        $categorySpecial = CategorySpecial::query()->with(['products' => function ($q) {
            $q->where('status', 1)->limit(5);
        }])
            ->has('products')
            ->where('type', 10)
            ->where('show_home_page', 1)
            ->orderBy('order_number')->get();

        $vouchers = Voucher::query()->where('status', 1)->where('quantity', '>', 0)->where('to_date', '>=', now())->orderBy('created_at', 'desc')->get();
        if (!$category) {
            return view('site.errors');
        }

        return view('site.products.product_category', compact('categories', 'category', 'sort', 'categorySpecial', 'products', 'title', 'short_des', 'title_sub', 'vouchers', 'attributes'));
    }

    public function filterProduct(Request $request)
    {
        $products = Product::query()->where('status', 1);
        if (!empty($request->sort)) {
            if ($request->sort == 'default') {
                $products->orderBy('created_at', 'desc');
            } else if ($request->sort == 'alpha-asc') {
                $products->orderBy('name', 'asc');
            } else if ($request->sort == 'alpha-desc') {
                $products->orderBy('name', 'desc');
            } else if ($request->sort == 'price-asc') {
                $products->orderBy('price', 'asc');
            } else if ($request->sort == 'price-desc') {
                $products->orderBy('price', 'desc');
            } else if ($request->sort == 'created-desc') {
                $products->orderBy('created_at', 'desc');
            } else if ($request->sort == 'created-asc') {
                $products->orderBy('created_at', 'asc');
            }
        }
        if (!empty($request->tag)) {
            $products->whereHas('tags', function ($query) use ($request) {
                $query->whereIn('tags.id', $request->tag);
            });
        }
        if (!empty($request->price)) {
            $products->where(function ($query) use ($request) {
                foreach ($request->price as $price) {
                    $price = explode(':', $price);
                    $query->orWhere(function ($query) use ($price) {
                        $query->where('price', '>=', $price[0])->where('price', '<=', $price[1]);
                    });
                }
            });
        }
        if (!empty($request->category) && !empty($request->cate_slug)) {
            $category = Category::query()->where('id', $request->category)->orWhere('slug', $request->cate_slug)->first();
            $category_special = CategorySpecial::query()->where('type', 10)->where('show_home_page', 1)->where('id', $request->category)->orWhere('slug', $request->cate_slug)->first();
            if ($category_special) {
                $products->whereIn('id', $category_special->products()->pluck('products.id')->toArray());
            } else {
                $category_parent_id = $category->parent ? $category->parent->id : null;
                $arr_category_id = array_merge($category->childs->pluck('id')->toArray(), [$category->id, $category_parent_id]);
                if ($category->childs) {
                    foreach ($category->childs as $child) {
                        $arr_category_id = array_merge($arr_category_id, $child->childs->pluck('id')->toArray());
                    }
                }
                $products->whereIn('cate_id', $arr_category_id);
            }
        }
        $products = $products->paginate(20);
        $html = view('site.partials.filter_product', compact('products'))->render();
        return Response::json([
            'html' => $html,
        ]);
    }

    public function loadMoreProduct(Request $request)
    {
        $category = Category::query()->find($request->cate_id);

        $products = Product::query()->where('status', 1);

        if ($sort = $request->get('sort')) {
            if ($sort == 'lasted') {
                $products->orderBy('created_at', 'desc');
            } else if ($sort == 'priceAsc') {
                $products->orderBy('price', 'asc');
            } else if ($sort == 'priceDesc') {
                $products->orderBy('price', 'desc');
            }
        } else {
            $products->orderBy('created_at', 'desc');
        }

        $product_all_ids = $category->products()->pluck('id')->toArray();

        if ($request->product_ids_load_more) {
            $products->whereIn('id', array_diff($product_all_ids, $request->product_ids_load_more));
        }

        $products = $products->where('cate_id', $category->id)->limit(1)->get();

        // mảng product id
        $product_ids = $products->pluck('id')->toArray();

        $html = '';

        $product_ids_ = array_merge($request->product_ids_load_more ?? [], $product_ids);

        $hasProductsNextPage = false;

        if ($product_ids && Product::query()->whereNotIn('id', $product_ids_)->count()) $hasProductsNextPage = true;

        foreach ($products as $product) {
            $html .= view('site.partials.card_product', compact('product', 'category'))->render();
        }


        return Response::json([
            'html' => $html,
            'product_ids' => $product_ids,
            'hasProductsNextPage' => $hasProductsNextPage,
        ]);
    }


    // Giới thiệu
    public function aboutUs()
    {
        $policies = Policy::query()->where('status', true)->latest()->get();
        $config = Config::query()->get()->first();
        $content = $config->introduction;
        $title = 'Về chúng tôi';
        $description = $config->web_des;
        return view('site.about_us', compact('content', 'policies', 'title', 'description'));
    }

    // Đăng ký cộng tác viên
    public function connectUs()
    {
        return view('site.connect_register');
    }

    // Liên hệ
    public function contactUs()
    {
        return view('site.contact_us');
    }

    public function postContact(Request $request)
    {
        $rule  =  [
            'your_name' => 'required',
            'your_phone'  => 'required|regex:/^(0)[0-9]{9,11}$/',
            'your_email'  => 'required|email|max:255'
        ];

        $validate = Validator::make(
            $request->all(),
            $rule,
            [
                'your_name.required' => 'Vui lòng nhập họ tên',
                'your_phone.required' => 'Vui lòng nhập số điện thoại',
                'your_phone.regex' => 'Số điện thoại không đúng định dạng',
                'your_email.required' => 'Vui lòng nhập email',
            ]
        );

        if ($validate->fails()) {
            return $this->responseErrors('Gửi yêu cầu thất bại!', $validate->errors());
        }

        $contact = new Contact();
        $contact->user_name = $request->your_name;
        $contact->email = $request->your_email;
        $contact->phone_number = $request->your_phone;
        $contact->content = $request->your_message;
        $contact->location = $request->your_location ?? null;
        $contact->save();

        return $this->responseSuccess('Gửi yêu cầu thành công!');
    }

    // Blogs
    public function listBlog(Request $request, $slug)
    {
        $category = PostCategory::where('slug', $slug)->first();
        $data['blogs'] = Post::with(['image'])->where(['status' => 1, 'cate_id' => $category->id])
            ->orderBy('id', 'DESC')
            ->select(['id', 'name', 'intro', 'created_at', 'slug'])
            ->paginate(6);

        $data['cate_title'] = $category->name;
        $data['newBlogs'] = Post::with(['image', 'category'])->where(['status' => 1])
            ->orderBy('id', 'DESC')
            ->select(['id', 'name', 'slug', 'created_at', 'cate_id'])
            ->limit(4)->get();

        return view('site.blogs.list', $data);
    }

    public function indexBlog(Request $request)
    {
        $data['blogs'] = Post::with(['image', 'category'])->where(['status' => 1])
            ->orderBy('id', 'DESC')
            ->select(['id', 'name', 'intro', 'created_at', 'slug', 'cate_id'])
            ->paginate(6);

        $data['cate_title'] = 'Tin tức';
        $data['categories'] = PostCategory::with([
            'posts' => function ($query) {
                $query->where(['status' => 1])->get();
            }
        ])->where(['parent_id' => 0, 'show_home_page' => 1])->latest()->get();
        $data['newBlogs'] = Post::with(['image'])->where(['status' => 1])
            ->orderBy('id', 'DESC')
            ->select(['id', 'name', 'slug', 'created_at'])
            ->limit(6)->get();

        return view('site.blogs.list', $data);
    }

    public function detailBlog(Request $request, $slug)
    {
        $blog = Post::with(['image', 'user_create'])->where('slug', $slug)->first();
        $category = PostCategory::where('id', $blog->cate_id)->first();

        $data['blog_title'] = $blog->name;
        $data['blog_des'] = $blog->intro;
        $data['blog'] = $blog;
        $data['blog_slug'] = $blog->slug;
        $data['cate_title'] = $category->name;
        $data['category'] = $category;

        $data['newBlogs'] = Post::with(['image', 'category'])->where(['status' => 1])
        ->orderBy('id', 'DESC')
        ->select(['id', 'name', 'slug', 'created_at', 'cate_id'])
        ->limit(4)->get();
        $data['other_blogs'] = Post::with(['image'])->where(['status' => 1, 'cate_id' => $blog->cate_id])
        ->where('id', '!=', $blog->id)
        ->select(['id', 'name', 'intro', 'created_at', 'slug', 'cate_id'])
        ->limit(16)->inRandomOrder()->get();

        return view('site.blogs.detail', $data);
    }

    // Tìm kiếm
    public function autoSearchComplete(Request $request)
    {
        if (isset($request->keyword)) {
            $products = Product::with(['image'])->where('name', 'LIKE', '%' . $request->keyword . '%')->where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
            $view = view("site.partials.ajax_search_results", compact('products'))->render();
        } else {
            $view = '';
        }

        return Response::json([
            'html' => $view
        ]);
    }

    // public function resetData() {
    //     \Illuminate\Support\Facades\DB::table('orders')->truncate();
    //     \Illuminate\Support\Facades\DB::table('contacts')->truncate();
    // }

    // laster buy products
    public function lasterBuyProducts()
    {
        $product = \DB::table('products')
            ->where('status', 1)
            ->leftJoin('files', function ($join) {
                $join->on('files.model_id', '=', 'products.id')
                    ->where('files.custom_field', 'image')->where('files.model_type', Product::class);
            })
            ->inRandomOrder()->first(['products.id', 'products.name', 'products.slug', 'files.path']);
        return Response::json([
            'product' => $product,
        ]);
    }

    // review
    public function submitReview(Request $request)
    {
        $rule  =  [
            'name' => 'required',
            'email'  => 'required|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'phone'  => 'required|regex:/^(0)[0-9]{9,11}$/',
            'rating' => 'required|numeric|min:1|max:5',
            'title' => 'required',
            'galleries' => 'required|array|min:1|max:5',
            'galleries.*.image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'desc' => 'required',
            'product_id' => 'required|exists:products,id',
        ];

        $validate = Validator::make(
            $request->all(),
            $rule,
            [
                'name.required' => 'Vui lòng nhập họ tên',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.regex' => 'Số điện thoại không đúng định dạng',
                'email.required' => 'Vui lòng nhập email',
                'email.regex' => 'Email không đúng định dạng',
                'rating.required' => 'Vui lòng đánh giá sản phẩm',
                'rating.numeric' => 'Đánh giá không hợp lệ',
                'rating.min' => 'Đánh giá không hợp lệ',
                'rating.max' => 'Đánh giá không hợp lệ',
                'title.required' => 'Vui lòng nhập tiêu đề',
                'galleries.required' => 'Vui lòng chọn ít nhất 1 hình ảnh',
                'galleries.array' => 'Dữ liệu không hợp lệ',
                'galleries.min' => 'Vui lòng chọn ít nhất 1 hình ảnh',
                'galleries.max' => 'Vui lòng chọn tối đa 5 hình ảnh',
                'desc.required' => 'Vui lòng nhập nội dung đánh giá',
                'galleries.*.image.image' => 'Vui lòng chọn file hình ảnh',
                'galleries.*.image.mimes' => 'File không hợp lệ',
                'galleries.*.image.max' => 'File không được lớn hơn 5MB',
                'product_id.required' => 'Sản phẩm không hợp lệ',
                'product_id.exists' => 'Sản phẩm không hợp lệ',
            ]
        );


        if ($validate->fails()) {
            return $this->responseErrors('Gửi yêu cầu thất bại!', $validate->errors());
        }

        $store_data = [
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'rating' => $request->rating,
            'title' => $request->title,
            'desc' => $request->desc,
        ];

        DB::beginTransaction();
        try {
            $object = new ProductRate();
            $object->fill($store_data);
            $object->save();

            if ($request->galleries) {
                $object->syncGalleries($request->galleries);
            }

            DB::commit();
            return $this->responseSuccess('Gửi đánh giá thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    // Tìm kiếm trang list product
    public function search(Request $request)
    {
        $query = Product::query()->where('status', 1);
        if (!empty($request->keyword)) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        if (!empty($request->tag)) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->tag);
            });
        }
        $categories = Category::query()->get();
        $vouchers = Voucher::query()->where('status', 1)->where('quantity', '>', 0)->where('to_date', '>=', now())->orderBy('created_at', 'desc')->get();
        $products = $query->paginate(20);
        $title = 'Tìm kiếm';
        $short_des = 'Kết quả tìm kiếm';
        $title_sub = 'Tìm thấy ' . count($products) . ' kết quả phù hợp';
        return view('site.products.product_category', compact('products', 'title', 'short_des', 'title_sub', 'categories', 'vouchers'));
    }

    // Chính sách
    public function policyDetail($slug)
    {
        $policy = Policy::where('slug', $slug)->first();
        $policies = Policy::query()->where('status', true)->latest()->get();
        $title = $policy->title;
        $content = $policy->content;
        $description = $policy->title;
        return view('site.about_us', compact('content', 'title', 'policies', 'description'));
    }
}
