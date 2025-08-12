<?php

namespace App\Model\Admin;

use App\Helpers\FileHelper;
use App\Model\Admin\ProductVariant as ThisModel;
use App\Model\BaseModel;
use App\Model\Common\File;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductVariant extends BaseModel
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = ['product_id', 'sku', 'name', 'slug', 'status'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public function galleries()
    {
        return $this->hasMany(ProductVariantGallery::class, 'variant_id', 'id');
    }

    public function canEdit()
    {
        return Auth::user()->id = $this->created_by;
    }

    public function canDelete()
    {
        return Auth::user()->id = $this->created_by;
    }

    public function actDelete() {
        if($this->galleries->count() > 0) {
            foreach ($this->galleries as $gallery) {
                if ($gallery->image) {
                    FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, ProductVariant::class);
                }
                $gallery->removeFromDB();
            }
        }

        if($this->image) {
            FileHelper::deleteFileFromCloudflare($this->image, $this->id, ThisModel::class, 'image');
        }

        if($this->image_back) {
            FileHelper::deleteFileFromCloudflare($this->image_back, $this->id, ThisModel::class, 'image_back');
        }

        $this->delete();
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
           'product', 'image'
        ]);

        if($request->product_id) {
            $result = $result->where('product_id', $request->product_id);
        }

        if (!empty($request->keyword)) {
            $result = $result->where(function (Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('code', 'like', '%' . $request->keyword . '%')
                ;
            });
        }

        if($request->warehouse_id) {
            $result = $result->where('warehouse_id', $request->warehouse_id);
        }

        if($request->status_id) {
            $result = $result->where('status_id', $request->status_id);
        }

        if (! is_null($request->input('is_default'))) {
            $result = $result->where('is_default', $request->is_default);
        }

        $result = $result->orderBy('created_at', 'desc')->get();

        return $result;
    }

    public static function getDataForEdit($id)
    {
        $obj = self::with([
            'galleries' => function ($q) {
                $q->select(['id', 'variant_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            },
            'image'])->where('id', $id)
            ->firstOrFail();

        return $obj;
    }

    public function syncGalleries($galleries)
    {
        if ($galleries) {
            $exist_ids = [];
            foreach ($galleries as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }
            $deleted = ProductVariantGallery::where('variant_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::deleteFileFromCloudflare($item->image, $item->id, ProductVariantGallery::class);
                }
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($galleries); $i++) {
                $g = $galleries[$i];

                if (isset($g['id'])) $gallery = ProductVariantGallery::find($g['id']);
                else $gallery = new ProductVariantGallery();

                $gallery->variant_id = $this->id;
                $gallery->sort = $i;
                $gallery->save();

                if (isset($g['image'])) {
                    if ($gallery->image) {
                        FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, ProductVariantGallery::class);
                        $gallery->image->removeFromDB();
                    }
                    $file = $g['image'];
                    FileHelper::uploadFileToCloudflare($file, $gallery->id, ProductVariantGallery::class, null);
                }
            }
        } else {
            $deleted = ProductVariantGallery::where('variant_id', $this->id)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::deleteFileFromCloudflare($item->image, $item->id, ProductVariantGallery::class);
                }
                $item->removeFromDB();
            }
        }
    }
}
