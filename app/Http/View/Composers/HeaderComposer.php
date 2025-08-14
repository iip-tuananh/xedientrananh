<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $cartItems = \Cart::session('cartList')->getContent();
        $totalPriceCart = \Cart::session('cartList')->getTotal();

        // danh mục sản phẩm
        $productCategories = Category::query()->with(['childs'])
            ->where('parent_id', 0)
            ->orderBy('sort_order')
            ->get();

        // list product so sánh
        $compareListItems = \Cart::session('compareList')->getContent();

        $view->with(['config' => $config,
            'cartItems' => $cartItems,
            'totalPriceCart' => $totalPriceCart,
            'productCategories' => $productCategories,
            'compareListItems' => $compareListItems
        ]);
    }
}
