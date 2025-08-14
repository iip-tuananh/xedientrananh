<?php

namespace App\Model\Admin;
use App\Model\BaseModel;
use App\Model\Common\File;
use Illuminate\Database\Eloquent\Model;

class FinanceCompany extends BaseModel
{
    protected $table = 'finance_companies';

    public function packages()
    {
        return $this->hasMany(FinancePackage::class, 'company_id');
    }

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public static function searchByFilter($request) {
        $result = self::query();

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%'.$request->name.'%');
        }

        $result = $result->orderBy('created_at','desc')->get();
        return $result;
    }

    public static function getDataForEdit($id) {
        return self::where('id', $id)
            ->with([
                'packages', 'image'
            ])
            ->firstOrFail();
    }

}
