<?php

namespace App\Http\Controllers\Front;

use App\Mail\NewOrder;
use App\Model\Admin\Config;
use App\Model\Admin\FinanceCompany;
use App\Model\Admin\FinanceOrder;
use App\Model\Admin\FinanceOrderDetail;
use App\Model\Admin\Order;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\Product;
use App\Model\Admin\ProductVariant;
use App\Model\Common\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\OrderRevenueDetail;
use App\Model\Admin\Voucher;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Kjmtrue\VietnamZone\Models\Province;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Province as Vanthao03596Province;
use Vanthao03596\HCVN\Models\Ward;

class CartController extends Controller
{
    // trang giỏ hàng
    public function index()
    {
        $cart = \Cart::session('cartList');

        $cartCollection = $cart->getContent();
        $items = $cart->getContent()->values();

        $total_price = $cart->getTotal();
        $count = $items->sum('quantity');

        return view('site.orders.cart', compact('cartCollection', 'total_price', 'items', 'count'));
    }

    public function addItem(Request $request, $productId, $variantId)
    {
        $product = Product::query()->find($productId);
        $variant = ProductVariant::query()->find($variantId);
        $cartList  = \Cart::session('cartList');

        $cartList->add([
            'id' => $product->id.'-'.$variant->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty ? (int)$request->qty : 1,
            'attributes' => [
                'product_id' => $product->id,
                'variant_id' => $variant->id,
                'variant_name' => $variant->name,
                'image' => $variant->image->path ?? '',
                'base_price' => $product->base_price,
            ]
        ]);

        return \Response::json(['success' => true, 'items' => \Cart::getContent(), 'total' => \Cart::getTotal(),
            'count' => \Cart::getContent()->sum('quantity')]);
    }

    public function updateItem(Request $request)
    {
        $productId = $request->product_id;
        $qty       = (int) $request->qty;
        $cartList  = \Cart::session('cartList');

        if ($qty <= 0) {
            $cartList->remove($productId);
        } else {
            $cartList->update($productId, [
                'quantity' => [
                    'relative' => false,
                    'value'    => $qty
                ],
            ]);
        }

        $items = $cartList->getContent();

        return \Response::json(['success' => true, 'items' => $items, 'total' => \Cart::getTotal(),
            'count' => \Cart::getContent()->sum('quantity')]);
    }

    public function removeItem(Request $request)
    {
        $cartList = \Cart::session('cartList');
        $cartList->remove($request->product_id);

        return \Response::json(['success' => true, 'items' => \Cart::getContent(), 'total' => \Cart::getTotal(),
            'count' => \Cart::getContent()->sum('quantity')]);
    }

    // trang thanh toán
    public function checkout(Request $request) {
        $cartCollection = \Cart::session('cartList')->getContent();
        $total = \Cart::session('cartList')->getTotal();
        $provinces = Vanthao03596Province::all();
        $districts = District::all();
        $wards = Ward::all();

        return view('site.orders.checkout', compact('cartCollection', 'total', 'provinces', 'districts', 'wards'));
    }

    // áp dụng mã giảm giá (boolean)
    public function applyVoucher(Request $request) {
        $cartCollection = \Cart::getContent();
        $arr_voucher_ids = [];
        foreach ($cartCollection as $item) {
            $product = Product::query()->where('slug', $item['attributes']['slug'])->first();
            $voucher_ids = $product->vouchers()->pluck('vouchers.id')->toArray();
            $arr_voucher_ids = array_merge($arr_voucher_ids, Voucher::query()->where('status', 1)->where('quantity', '>', 0)->where('to_date', '>=', now())->where(function ($query) use ($voucher_ids) {
                $query->whereIn('id', $voucher_ids)->orWhere('is_all_product', 1);
            })->pluck('id')->toArray());
        }
        $voucher = Voucher::query()->where('code', $request->code)->whereIn('id', $arr_voucher_ids)->first();
        if(isset($voucher) && (($request->total >= $voucher->limit_bill_value && $voucher->limit_bill_value > 0) || ($voucher->limit_product_qty > 0 && $request->qty >= $voucher->limit_product_qty))) {
            return Response::json(['success' => true, 'voucher' => $voucher, 'message' => 'Áp dụng mã giảm giá thành công']);
        }
        return Response::json(['success' => false, 'message' => 'Không đủ điều kiện áp mã giảm giá']);
    }

    // submit đặt hàng
    public function checkoutSubmit(Request $request)
    {
        DB::beginTransaction();
        try {
            $translate = [
                'customer_name.required' => 'Vui lòng nhập họ tên',
                'customer_phone.required' => 'Vui lòng nhập số điện thoại',
                'customer_phone.regex' => 'Số điện thoại không đúng định dạng',
                'customer_address.required' => 'Vui lòng nhập địa chỉ',
                'payment_method.required' => 'Vui lòng chọn phương thức thanh toán',
            ];

            $validate = Validator::make(
                $request->all(),
                [
                    'customer_name' => 'required',
                    'customer_phone' => 'required|regex:/^(0)[0-9]{9,11}$/',
                    'customer_address' => 'required',
                    'customer_email' => 'nullable|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                    'customer_province' => 'required',
                    'customer_district' => 'required',
                    'customer_ward' => 'required',
                ],
                $translate
            );

            $json = new \stdClass();

            if ($validate->fails()) {
                $json->success = false;
                $json->errors = $validate->errors();
                $json->message = "Thao tác thất bại!";
                return Response::json($json);
            }

            $ward = Ward::query()->find($request->customer_ward);

            $customer_address = $request->customer_address . ', ' . $ward->path_with_type;

            $lastId = Order::query()->latest('id')->first()->id ?? 1;
            $total_price = $request->total;

            $order = Order::query()->create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_address' => $customer_address,
                'customer_required' => $request->customer_required,
                'total_before_discount' => $total_price,
                'total_after_discount' => $total_price - $request->discount_value - $request->point_value,
                'code' => 'ORDER' . date('Ymd') . '-' . $lastId
            ]);

            foreach ($request->items as $item) {
                $product = Product::query()->where('id', $item['attributes']['product_id'])->first();
                $detail = new OrderDetail();
                $detail->order_id = $order->id;
                $detail->product_id = $product->id;
                $detail->variant_id = $item['attributes']['variant_id'];
                $detail->qty = $item['quantity'];
                $detail->price = $item['price'];
                $detail->save();

            }

            \Cart::session('cartList')->clear();

            session(['order_id' => $order->id]);

            DB::commit();
            return Response::json(['success' => true, 'order_code' => $order->code, 'message' => 'Đặt hàng thành công']);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }

    }

    // trả về trang đặt hàng thành công
    public function checkoutSuccess(Request $request)
    {
        if (!session()->has('order_id')) {
            return redirect()->route('front.home-page');
        }

        $orderId = session('order_id') ?? 39;
        $order = Order::query()->with('details', 'details.product', 'details.product.image')->find($orderId);
        session()->forget('order_id');
        return view('site.orders.checkout_success', compact('order'));
    }

    public function tragop(Request $request) {
        if($request->accept) {
            $cart = \Cart::session('cartList');

            $cartCollection = $cart->getContent();

            return view('site.thanh_toan_tra_gop', compact('cartCollection'));
        }
        $cart = \Cart::session('cartList');
        $data['cartItems'] = $cart->getContent()->values()->toArray();
        $data['total_price'] = $cart->getTotal();
        $data['companies'] = FinanceCompany::query()->with('packages', 'image')
           ->get();

        $companiesForJs = ($data['companies'])->map(function ($c) {
            // map packages -> rate_matrix
            $rate = collect($c['packages'] ?? [])->map(function ($p) {
                return [
                    'months'           => (int) ($p['term_months'] ?? 0),
                    'down_pct_min'     => (float) ($p['down_pct_min'] ?? 0),
                    'down_pct_max'     => (float) ($p['down_pct_max'] ?? 0),
                    // DB đang là "2.40" (%/tháng) -> UI cần 0.024
                    'interest_monthly' => ($p['interest_monthly'] !== null && $p['interest_monthly'] !== '')
                        ? ((float) $p['interest_monthly']) / 100.0
                        : 0.0,
                ];
            })->sortBy('months')->values()->all();

            // tách 'document' thành mảng docs (ngăn cách bởi , + / |)
            $docs = [];
            if (!empty($c['document'])) {
                $parts = preg_split('/\s*[+,\/|]\s*/', $c['document']);
                $docs  = array_values(array_filter(array_map('trim', $parts), function ($x) {
                    return $x !== '';
                }));
            }

            return [
                'id'          => (int) $c['id'],
                'name'        => (string) $c['name'],
                'logo'        => (string) data_get($c, 'image.path', ''), // URL logo
                'docs'        => $docs,                                   // ví dụ: ['CMND','Bằng lái xe']
                'rate_matrix' => $rate,
            ];
        })->values()->all();

        $data['companies'] = $companiesForJs;

        return view('site.tra_gop', $data);
    }
    public function checkoutFinance(Request $request) {
        DB::beginTransaction();
        try {
            $translate = [
                'customer_type.required' => 'Vui lòng chọn danh xưng',
                'fullname.required' => 'Vui lòng nhập họ tên',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.regex' => 'Số điện thoại không đúng định dạng',
                'address.required' => 'Vui lòng nhập địa chỉ',
                'cccd.required' => 'Vui lòng nhập cccd hoặc cmt',
                'dob.required' => 'Vui lòng nhập ngày sinh',
            ];

            $validate = Validator::make(
                $request->all(),
                [
                    'customer_type' => 'required',
                    'fullname' => 'required',
                    'cccd' => 'required',
                    'dob' => 'required',
                    'phone' => 'required|regex:/^(0)[0-9]{9,11}$/',
                    'address' => 'required',
                    'email' => 'nullable|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                ],
                $translate
            );

            $json = new \stdClass();

            if ($validate->fails()) {
                $json->success = false;
                $json->errors = $validate->errors();
                $json->message = "Thao tác thất bại!";
                return Response::json($json);
            }


            $lastId = Order::query()->latest('id')->first()->id ?? 1;

            $order = new FinanceOrder();


            $raw = (string) $request->input('dob');
            $clean = preg_replace('/\s*\(.*\)$/', '', trim($raw)); // => "Wed Aug 20 2025 00:00:00 GMT+0700"
            $dob = Carbon::parse($clean, 'Asia/Bangkok')->toDateString(); // "2025-08-20"

            $order->code = 'ORDER-FINANCE' . date('Ymd') . '-' . $lastId;
            $order->title = $request->customer_type;
            $order->fullname = $request->fullname;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->dob = $dob;
            $order->cccd = $request->cccd;
            $order->status = FinanceOrder::MOI;


            $company = $request->company_finance['company'];
            $order->company_id = $company['id'];
            $order->company_name = $company['name'];
            $order->sothangtragop = $request->company_finance['month'];
            $order->sotiengopmoithang = $request->company_finance['gopmoithang'];
            $order->sophantramtratruoc = $request->company_finance['sophantram'];
            $order->sotientratruoc = $request->company_finance['sotientratruoc'];
            $order->tongtien = $request->company_finance['tongtien'];

            $order->save();


            foreach ($request->items as $item) {
                $detail = new FinanceOrderDetail();
                $detail->finance_order_id = $order->id;
                $detail->product_id = $item['product_id'];
                $detail->product_name = $item['product_name'];
                $detail->variant_id = $item['variant_id'];
                $detail->variant_name = $item['variant_name'];
                $detail->price = $item['price'];
                $detail->quantity = $item['quantity'];
                $detail->save();
            }

            \Cart::session('cartList')->clear();

            DB::commit();
            return Response::json(['success' => true, 'order_code' => $order->code, 'message' => 'Đặt hàng thành công']);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
