<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Model\Admin\AttributeValue;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\Post;
use App\Model\Admin\Product;
use App\Model\Admin\ProductCategorySpecial;
use App\Model\Admin\ProductVideo;
use App\Model\Admin\Tag;
use App\Model\Admin\Tagable;
use App\Model\Common\ProductCategory;
use Cassandra\Exception\ProtocolException;
use Illuminate\Http\Request;
use App\Model\Admin\Product as ThisModel;
use App\Model\Common\Unit;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use DB;
use App\Helpers\FileHelper;
use App\Model\Admin\Config;
use App\Model\Admin\ProductGallery;
use App\Model\Common\User;
use App\Model\Common\ActivityLog;
use Auth;

class ProductController extends Controller
{
	protected $view = 'admin.products';
	protected $route = 'Product';

	public function index()
	{
		return view($this->view.'.index');
	}

	// Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
		$objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
			->addColumn('name', function ($object) {
				return $object->name;
			})
			->editColumn('base_price', function ($object) {
				return formatCurrent($object->base_price);
			})
			->editColumn('price', function ($object) {
				return formatCurrent($object->price);
			})
            ->addColumn('variants', function ($object) {
                $count = (int) ($object->variants_count ?? $object->variants()->count());
                $url   = route('product_variants.index') . '?product-id=' . $object->id;

                if ($count === 0) {
                    return '<a href="'.$url.'" class="btn btn-sm btn-light text-muted"
                   target="_blank" rel="noopener"
                   title="Chưa có biến thể - bấm để thêm">
                    <span class="badge bg-secondary rounded-pill me-2">0</span>
                    <span>Biến thể</span>
                </a>';
                }

                $badgeClass = $count < 5 ? 'bg-success' : ($count < 20 ? 'bg-primary' : 'bg-warning text-dark');

                return '<a href="'.$url.'" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center"
               target="_blank" rel="noopener"
               title="Xem & quản lý '.$count.' biến thể">
                <span class="badge '.$badgeClass.' rounded-pill me-2">'.$count.' </span>
               &nbsp; <span>Biến thể</span>
            </a>';
            })
			->editColumn('created_at', function ($object) {
				return Carbon::parse($object->created_at)->format("d/m/Y");
			})
			->editColumn('created_by', function ($object) {
				return $object->user_create->name ? $object->user_create->name : '';
			})
			->editColumn('updated_by', function ($object) {
				return $object->user_update->name ? $object->user_update->name : '';
			})
			->editColumn('cate_id', function ($object) {
					return $object->category ? $object->category->name : '';
			})
            ->addColumn('category_special', function ($object) {
                return $object->category_specials->implode('name', ', ');
            })
            ->editColumn('tags', function ($object) {
				return $object->tags->map(function ($tag) {
					return '<span class="badge badge-light" style="font-size: 12px;">'.$tag->name.'</span>';
				})->implode(' ');
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
                $result = $result . ' <a href="' . route('product_variants.index').'?product-id='.$object->id . '" title="Quản lý biến thể" class="dropdown-item" target="_blank"><i class="fa fa-angle-right"></i>Quản lý biến thể</a>';

                $result = $result . ' <a href="" title="thêm vào danh mục đặc biệt" class="dropdown-item add-category-special"><i class="fa fa-angle-right"></i>Thêm vào danh mục đặc biệt</a>';
                $result = $result . '</div></div>';
                return $result;
			})
			->addIndexColumn()
			->rawColumns(['action', 'tags', 'variants'])
			->make(true);
    }

	public function create()
	{
        $tags = Tag::query()->where('type', Tag::TYPE_PRODUCT)->latest()->get();
        $config = Config::query()->first(['revenue_percent_1', 'revenue_percent_2', 'revenue_percent_3', 'revenue_percent_4', 'revenue_percent_5']);

		return view($this->view.'.create', compact('tags', 'config'));
	}

	public function store(ProductStoreRequest $request)
	{
		$json = new stdClass();
		DB::beginTransaction();
		try {
			$object = new ThisModel();
			$object->name = $request->name;
			$object->code = $request->code;
			$object->cate_id = $request->cate_id;
			$object->intro = $request->intro;
			$object->short_des = $request->short_des;
			$object->body = $request->body;
			$object->base_price = $request->base_price;
			$object->price = $request->price;
			$object->status = $request->status;
			$object->manufacturer_id = $request->manufacturer_id;
            $object->state = $request->state ?? Product::CON_HANG;

			$object->save();

//			FileHelper::uploadFile($request->image, 'products', $object->id, ThisModel::class, 'image',99);

//			$object->syncGalleries($request->galleries);

            if($request->tag_ids) $object->addTags($request->tag_ids);

            if($request->input('attrs')) {
                $object->syncAttributes($request->input('attrs'));
            }


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
		$object = ThisModel::getDataForEdit($id);
        $tags = Tag::query()->where('type', Tag::TYPE_PRODUCT)->latest()->get();
        $object->tag_ids = $object->tags->pluck('id')->toArray();

        return view($this->view.'.edit', compact('object','tags'));
	}

	public function update(ProductUpdateRequest $request, $id)
	{
		$json = new stdClass();

		DB::beginTransaction();
		try {
			$object = ThisModel::findOrFail($id);

			if (!$object->canEdit()) {
				$json->success = false;
				$json->message = "Bạn không có quyền sửa hàng hóa này";
				return Response::json($json);
			}

			$object->name = $request->name;
			$object->code = $request->code;
			$object->cate_id = $request->cate_id;
			$object->intro = $request->intro;
			$object->short_des = $request->short_des;
			$object->body = $request->body;
			$object->base_price = $request->base_price;
			$object->price = $request->price;
			$object->status = $request->status;
			$object->manufacturer_id = $request->manufacturer_id;
			$object->origin_id = $request->origin_id;
            $object->state = $request->state ?? Product::CON_HANG;

			$object->save();

//			if($request->image) {
//				if($object->image) {
//					FileHelper::forceDeleteFiles($object->image->id, $object->id, ThisModel::class, 'image');
//				}
//				FileHelper::uploadFile($request->image, 'products', $object->id, ThisModel::class, 'image',99);
//			}

//			$object->syncGalleries($request->galleries);

            if($request->tag_ids) $object->updateTags($request->tag_ids);

            AttributeValue::query()->where('product_id', $object->id)->delete();

            if($request->input('attrs')) {
                $object->syncAttributes($request->input('attrs'));
            }


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
		$object = ThisModel::findOrFail($id);
		if (!$object->canDelete()) {
			$message = array(
				"message" => "Không thể xóa!",
				"alert-type" => "warning"
			);
		} else {
            $variants = $object->variants;

            foreach ($variants as $variant) {
                $variant->actDelete();
            }

            AttributeValue::query()->where('product_id', $object->id)->delete();
            ProductCategory::query()->where('product_id', $object->id)->delete();
            Tagable::query()->where('tagable_type', Product::class)
                ->where('tagable_id', $object->id)
                ->delete();

            $object->delete();

			$message = array(
				"message" => "Thao tác thành công!",
				"alert-type" => "success"
			);
		}
        return redirect()->route($this->route.'.index')->with($message);
	}


	public function getData(Request $request, $id) {
        $json = new stdclass();
        $json->success = true;
        $json->data = ThisModel::getDataForEdit($id);
        return Response::json($json);
	}

	// Xuất Excel
	public function exportExcel(Request $request)
	{
		return (new FastExcel(ThisModel::searchByFilter($request)))->download('danh_sach_hang_hoa.xlsx', function ($object) {
			if(Auth::guard('admin')->user()->type == User::G7 || Auth::guard('admin')->user()->type == User::NHOM_G7) {
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
		$data = ThisModel::searchByFilter($request);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $product_ids = explode(',', $request->product_ids);

        foreach ($product_ids as $product_id) {
            $product = Product::query()->whereHas('image')->where('id', $product_id)->first();
            if (isset($product->image)) {
                FileHelper::forceDeleteFiles($product->image->id, $product->id, ThisModel::class, 'image');
            }
            if (isset($product->galleries)) {
                foreach ($product->galleries as $gallery) {
                    FileHelper::forceDeleteFiles($gallery->id, $product->id, ProductGallery::class);
                }
            }
        }
        Product::query()->whereIn('id', $product_ids)->delete();

        $message = array(
            "message" => "Thao tác thành công!",
            "alert-type" => "success"
        );

        return redirect()->route($this->route.'.index')->with($message);
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

    public function searchProductAjax(Request $request)
    {
        $ids = $request->input('ids');
        if (is_string($ids)) {
            $ids = json_decode($ids, true);
        }
        $products = Product::query()->where('status', 1)->select('id', 'name');
        if (!empty($request->keyword)) {
            $products = $products->where('name', 'like', '%' . $request->keyword . '%');
        }
        if (!empty($ids)) {
            $products = $products->whereIn('id', $ids);
        }
        if (empty($ids) && empty($request->keyword)) {
            $products = $products->limit(10);
        }
        return $products->get()->map(function ($item) {
            return ['id' => $item->id, 'name' => $item->name];
        });
    }
}
