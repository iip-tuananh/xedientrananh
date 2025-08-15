<?php

namespace App\Http\Controllers\Front;

use App\Model\Admin\Config;
use App\Model\Admin\Product;
use App\Model\Common\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CompareController extends Controller
{
    public function index()
    {
        $compareListItems = \Cart::session('compareList')->getContent();
        $compareLists = collect([]);
        foreach ($compareListItems as $compareListItem) {
            $product = Product::query()->with(['manufacturer', 'attrs.group', 'variants' => function ($query) {
                $query->with(['image'])->where('is_default', 1);
            }])->where('id', $compareListItem->id)->first();
            $product = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'image' => @$product->variants[0]->image->path ?? '',
                'manufacture' => $product->manufacturer->name ?? '',
                'base_price' => $product->base_price,
                'price' => $product->price,
                'percent_discount' => $product->base_price > 0 ? $product->percent_discount : null,
                'attributes' => $this->formatAttributes($product->attrs),
            ];

            $compareLists->push($product);
        }

        return view('site.products.product_compare', compact('compareLists'));
    }

    public function addItem(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $compareList  = \Cart::session('compareList');

        if ($compareList->get($product->id)) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm này đã được thêm vào danh sách so sánh',
                'compareItems' => $compareList ->getContent(),
                'count' => $compareList->getContent()->count(),
            ]);
        }

        $compareList->add([
            'id'         => $product->id,
            'name'       => $product->name,
            'price' => $product->price,
            'quantity'   => 1,
            'attributes' => [
                'slug' => $product->slug,
            ],
        ]);

        return response()->json([
            'success'       => true,
            'message'       => 'Đã thêm vào danh sách so sánh',
            'compareItems' => $compareList->getContent(),
            'count'         => $compareList->getContent()->count(),
        ]);
    }

    public function removeFromCompareList(Request $request)
    {
        \Cart::session('compareList')->remove($request->productId);

        $compareListItems = \Cart::session('compareList')->getContent();
        $compareLists = collect([]);
        foreach ($compareListItems as $compareListItem) {
            $product = Product::query()->with(['manufacturer', 'attrs.group', 'variants' => function ($query) {
                $query->with(['image'])->where('is_default', 1);
            }])->where('id', $compareListItem->id)->first();
            $product = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => @$product->variants[0]->image->path ?? '',
                'manufacture' => $product->manufacturer->name ?? '',
                'base_price' => $product->base_price,
                'price' => $product->price,
                'percent_discount' => $product->base_price > 0 ? $product->percent_discount : null,
                'attributes' => $this->formatAttributes($product->attrs),
            ];

            $compareLists->push($product);
        }

        return response()->json([
            'success'       => true,
            'compareItems' => $compareLists,
            'count'         => \Cart::session('compareList')->getContent()->count(),
        ]);
    }

    public function removeAll(Request $request)
    {
        \Cart::session('compareList')->clear();

        return response()->json([
            'success'       => true,
            'compareItems' => [],      // đã trống
            'count'         => 0,
        ]);
    }

    private function formatAttributes($attributes)
    {
        $groups = [];

        foreach ($attributes as $r) {
            // Lấy thông tin group
            $g       = isset($r['group']) ? $r['group'] : [];
            $gid     = isset($g['id']) ? $g['id'] : 0;
            $gname   = isset($g['name']) ? $g['name'] : 'Khác';
            $gsort   = isset($g['sort_order']) ? (int)$g['sort_order'] : 9999;

            // Lấy thông tin attribute + value
            $attrId   = isset($r['id']) ? $r['id'] : 0;
            $attrName = isset($r['name']) ? $r['name'] : '';
            $value    = isset($r['pivot']['value']) ? trim((string)$r['pivot']['value']) : '';
            if ($value === '') continue;

            // Tạo group nếu chưa có
            if (!isset($groups[$gid])) {
                $groups[$gid] = [
                    'group_name' => $gname,
                    'sort_order' => $gsort,
                    'attributes' => [] // map theo attribute id
                ];
            }

            // Tạo attribute nếu chưa có
            if (!isset($groups[$gid]['attributes'][$attrId])) {
                $groups[$gid]['attributes'][$attrId] = [
                    'attr_name' => $attrName,
                    'values'    => []
                ];
            }

            // Thêm value (loại trùng)
            if (!in_array($value, $groups[$gid]['attributes'][$attrId]['values'], true)) {
                $groups[$gid]['attributes'][$attrId]['values'][] = $value;
            }
        }

        // Chuyển map -> mảng tuần tự + sort
        $out = [];
        foreach ($groups as $g) {
            $attrs = array_values($g['attributes']);
            // (tuỳ chọn) sắp xếp attribute theo tên
            usort($attrs, function ($a, $b) {
                return strnatcasecmp($a['attr_name'], $b['attr_name']);
            });

            $out[] = [
                'group_name' => $g['group_name'],
                'attributes' => $attrs,
                'sort_order' => $g['sort_order'],
            ];
        }

        // Sort group theo sort_order rồi theo tên
        usort($out, function ($a, $b) {
            $so = $a['sort_order'] <=> $b['sort_order'];
            if ($so !== 0) return $so;
            return strnatcasecmp($a['group_name'], $b['group_name']);
        });

        // Bỏ sort_order khỏi output cuối cùng (nếu không cần)
//        foreach ($out as &$g) { unset($g['sort_order']); }
//        unset($g);

        return $out;

    }
}
