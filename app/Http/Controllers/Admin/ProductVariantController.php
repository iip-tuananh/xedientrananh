<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductVariant\ProductVariantStoreRequest;
use App\Http\Requests\ProductVariant\ProductVariantUpdateRequest;
use App\Model\Admin\AttributeValue;

use App\Model\Admin\Product;
use App\Model\Admin\ProductVariant;

use App\Model\Admin\ProductVariantGallery;
use Illuminate\Http\Request;
use App\Model\Admin\ProductVariant as ThisModel;
use App\Model\Common\Unit;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Helpers\FileHelper;
use App\Model\Common\User;
use App\Model\Common\ActivityLog;
use Auth;

class ProductVariantController extends Controller
{
    protected $view = 'admin.product_variants';
    protected $route = 'product_variants';

    public function index(Request $request)
    {
        $product = null;
        if( $request->get('product-id') ) {
            $product = Product::query()->find($request->get('product-id'));
        }

        return view($this->view.'.index', compact('product'));
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {

        $objects = ProductVariant::searchByFilter($request);
        return Datatables::of($objects)
            ->editColumn('product_id', function ($object) {
                return $object->product->name ?? '';
            })
            ->editColumn('updated_at', function ($object) {
                return Carbon::parse($object->updated_at)->format("d/m/Y H:i");
            })
            ->addColumn('action', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';

                if($object->canEdit()) {
                    $result = $result . ' <a href="'. route($this->route.'.edit', $object->id) .'" title="sửa" class="dropdown-item"><i class="fa fa-angle-right"></i>Sửa</a>';
                }

                if ($object->canDelete()) {
                    $result = $result . ' <a href="' . route($this->route.'.delete', $object->id) . '" title="xóa" class="dropdown-item confirm"><i class="fa fa-angle-right"></i>Xóa</a>';

                }

                $result = $result . '</div></div>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'link'])
            ->make(true);
    }

    public function create()
    {
        return view($this->view.'.create');
    }

    public function store(ProductVariantStoreRequest $request)
    {
        $json = new stdClass();
        DB::beginTransaction();
        try {
            $object = new ProductVariant();
            $object->product_id = $request->product_id;
            $object->sku = $request->sku;
            $object->name = $request->name;
            $object->status = $request->status;
            $object->intro = $request->intro;
            $object->qty = $request->qty;
            $object->is_default = $request->is_default;

            $object->save();

            FileHelper::uploadFileToCloudflare($request->image, $object->id, ProductVariant::class, 'image');
            $object->syncGalleries($request->galleries);

            if($object->is_default) {
                $productBase = Product::query()->find($object->product_id);
                if($productBase->variants()->count()) {
                    $productBase->variants()->whereNotIn('id', [$object->id])->update(['is_default' => 0]);
                }
            }


            $object->save();

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function edit($id)
    {
        $object = ProductVariant::getDataForEdit($id);

        return view($this->view.'.edit', compact('object'));
    }

    public function update(ProductVariantUpdateRequest $request, $id)
    {
        $json = new stdClass();

        DB::beginTransaction();
        try {
            $object = ProductVariant::findOrFail($id);

            if (!$object->canEdit()) {
                $json->success = false;
                $json->message = "Bạn không có quyền sửa sản phẩm này";
                return Response::json($json);
            }

            $object->product_id = $request->product_id;
            $object->sku = $request->sku;
            $object->name = $request->name;
            $object->status = $request->status;
            $object->intro = $request->intro;
            $object->is_default = $request->is_default;
            $object->qty = $request->qty;

            $object->save();

            if($request->image) {
                if($object->image) {
                    FileHelper::deleteFileFromCloudflare($object->image, $object->id, ProductVariant::class, 'image');
                }
                FileHelper::uploadFileToCloudflare($request->image, $object->id, ProductVariant::class, 'image');
            }


            $object->syncGalleries($request->galleries);

            if($object->is_default) {
                $productBase = Product::query()->find($object->product_id);
                if($productBase->variants()->count()) {
                    $productBase->variants()->whereNotIn('id', [$object->id])->update(['is_default' => 0]);
                }
            }


            $object->save();

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        $object = ProductVariant::findOrFail($id);
        $product_id = $object->product_id;


        if (!$object->canDelete()) {
            $message = array(
                "message" => "Không thể xóa!",
                "alert-type" => "warning"
            );
        } else {
            if($object->galleries->count() > 0) {
                foreach ($object->galleries as $gallery) {
                    if ($gallery->image) {
                        FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, ProductVariantGallery::class);
                    }
                    $gallery->removeFromDB();
                }
            }

            if($object->image) {
                FileHelper::deleteFileFromCloudflare($object->image, $object->id, ProductVariant::class, 'image');
            }

            if($object->image_back) {
                FileHelper::deleteFileFromCloudflare($object->image_back, $object->id, ProductVariant::class, 'image_back');
            }

            $object->delete();

            $message = array(
                "message" => "Thao tác thành công!",
                "alert-type" => "success"
            );
        }

        return redirect()
            ->route('product_variants.index', ['product_id' => $product_id])
            ->with($message);

    }


    public function getData(Request $request, $id) {
        $json = new stdclass();
        $json->success = true;
        $json->data = ProductVariant::getDataForEdit($id);
        return Response::json($json);
    }

    public function toggleDefault(Request $request, $id) {
        $obj = ProductVariant::query()->findOrFail($id);
        $obj->is_default = $request->is_default;
        $obj->save();

        if($obj->is_default) {
            ProductVariant::query()->whereNotIn('id', [$id])
                ->where('product_id', $obj->product_id)
                ->update(['is_default' => 0]);
        }

        $json = new stdclass();
        $json->success = true;

        return Response::json($json);
    }



    // Xuất Excel
    public function exportExcel(Request $request)
    {
        return (new FastExcel(ProductVariant::searchByFilter($request)))->download('danh_sach_hang_hoa.xlsx', function ($object) {
            if(Auth::user()->type == User::G7 || Auth::user()->type == User::NHOM_G7) {
                return [
                    'ID' => $object->id,
                    'Mã' => $object->code,
                    'Tên' => $object->name,
                    'Loại' => $object->category->name,
                    'Giá đề xuất' => formatCurrency($object->price),
                    'Giá bán' => formatCurrency($object->g7_price->price),
                    'Điểm tích lũy' => $object->point,
                    'Trạng thái' => $object->status == 0 ? 'Khóa' : 'Hoạt động',
                ];
            } else {
                return [
                    'ID' => $object->id,
                    'Mã' => $object->code,
                    'Tên' => $object->name,
                    'Loại' => $object->category->name,
                    'Giá đề xuất' => formatCurrency($object->price),
                    'Điểm tích lũy' => $object->point,
                    'Trạng thái' => $object->status == 0 ? 'Khóa' : 'Hoạt động',
                ];
            }
        });
    }

    // Xuất PDF
    public function exportPDF(Request $request) {
        $data = ProductVariant::searchByFilter($request);
        $pdf = PDF::loadView($this->view.'.pdf', compact('data'));
        return $pdf->download('danh_sach_hang_hoa.pdf');
    }

    public function addToCategorySpecial(Request $request) {
        $product = Product::query()->find($request->product_id);

        $product->category_specials()->sync($request->category_special_ids);

        return Response::json(['success' => true, 'message' => 'Thao tác thành công']);
    }

    // xóa nhiều sản phẩm
    public function actDelete(Request $request) {
        DB::beginTransaction();
        try{
            $product_ids = explode(',', $request->product_ids);
            $productVariant = ProductVariant::query()->find($product_ids[0]);

            foreach ($product_ids as $product_id) {
                $product = ProductVariant::findOrFail($product_id);
                if($product->galleries->count() > 0) {
                    foreach ($product->galleries as $gallery) {
                        if ($gallery->image) {
                            FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, ProductVariantGallery::class);
                        }
                        $gallery->removeFromDB();
                    }
                }

                if($product->image) {
                    FileHelper::deleteFileFromCloudflare($product->image, $product->id, ProductVariant::class, 'image');
                }

                if($product->image_back) {
                    FileHelper::deleteFileFromCloudflare($product->image_back, $product->id, ProductVariant::class, 'image_back');
                }

            }

            ProductVariant::query()->whereIn('id', $product_ids)->delete();

            $message = array(
                "message" => "Thao tác thành công!",
                "alert-type" => "success"
            );

            DB::commit();
            return redirect()->route(
                $this->route . '.index',
                ['product-id' => $productVariant->product_id]
            )->with($message);
        } catch (\Throwable $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            $message = array(
                "message" => "Thao tác thất bại!",
                "alert-type" => "warning"
            );
            return redirect()->route(
                $this->route . '.index',
                ['product-id' => $productVariant->product_id]
            )->with($message);
        }
    }

    public function deleteFile(Request $request, $id) {
        $json = new \stdClass();
        $req = Product::findOrFail($id);

        $attachments = explode(", ", $req->attachments);

        if (!$request->file || !in_array($request->file, $attachments)) {
            $json->success = false;
            $json->message = "Không có file";
            return \Response::json($json);
        }

        if (file_exists(public_path().$request->file)) unlink(public_path().$request->file);

        $attachments = array_diff($attachments, [$request->file]);
        $req->attachments = join(", ", $attachments);
        $req->save();
        $json->success = true;
        $json->message = "Xóa thành công";
        $json->data = $req;

        return \Response::json($json);
    }

}
