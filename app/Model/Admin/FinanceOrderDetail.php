<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;

class FinanceOrderDetail extends Model
{
    protected $table = 'finance_order_details';

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
