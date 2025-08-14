<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;

class FinanceOrder extends Model
{
    protected $table = 'finance_orders';

    // Trạng thái đơn hàng
    public const MOI = 10;
    public const DUYET = 20;
    public const THANH_CONG = 30;
    public const HUY = 40;

    public const STATUSES = [
        [
            'id' => self::MOI,
            'name' => 'Chờ xử lý',
            'type' => 'warning'
        ],
        [
            'id' => self::DUYET,
            'name' => 'Tạm duyệt',
            'type' => 'success'
        ],
        [
            'id' => self::THANH_CONG,
            'name' => 'Thành công',
            'type' => 'success'
        ],
        [
            'id' => self::HUY,
            'name' => 'Hủy',
            'type' => 'danger'
        ],
    ];


    public function details()
    {
        return $this->hasMany(FinanceOrderDetail::class, 'finance_order_id');
    }


    public static function searchByFilter($request)
    {
        $result = self::query();

        if (!empty($request->code)) {
            $result = $result->where('code', 'like', '%' . $request->code . '%');
        }

        if (!empty($request->employee_email)) {
            $result = $result->where('customer_email', $request->employee_email);
        }

        if (!empty($request->startDate)) {
            $result = $result->where('created_at', '>=', $request->startDate);
        }

        if (!empty($request->endDate)) {
            $result = $result->where('created_at', '<', addDay($request->endDate));
        }

        if (!empty($request->status)) {
            $result = $result->where('status', $request->status);
        }

        if (!empty($request->type) || (isset($request->type) && $request->type == 0)) {
            $result = $result->where('type', $request->type);
        }

        if (!empty($request->customer_name)) {
            $result = $result->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }

        if (!empty($request->customer_phone)) {
            $result = $result->where('customer_phone', 'like', '%' . $request->customer_phone . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

}
