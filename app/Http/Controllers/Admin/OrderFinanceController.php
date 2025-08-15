<?php

namespace App\Http\Controllers\Admin;

use App\ExcelExports\OrderExcel;
use App\ExcelImports\OrderImport;
use App\Model\Admin\FinanceOrder;
use App\Model\Admin\Order;
use Illuminate\Http\Request;
use App\Model\Admin\FinanceOrder as ThisModel;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use \stdClass;

use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Helpers\FileHelper;
use App\Model\Admin\OrderRevenueDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Common\Customer;
use Maatwebsite\Excel\Facades\Excel;

class OrderFinanceController extends Controller
{
    protected $view = 'admin.finace_orders';
    protected $route = 'orders-finance';

    public function index()
    {
        return view($this->view . '.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
            ->editColumn('tongtien', function ($object) {
                return number_format($object->tongtien);
            })
            ->editColumn('fullname', function ($object) {
                return $object->display_name;
            })
            ->editColumn('code', function ($object) {
                return '<a href = "'.route('orders-finance.show', $object->id).'" title = "Xem chi tiết">' . $object->code . '</a>';
            })
            ->editColumn('code_client', function ($object) {
                return '<a href = "javascript:void(0)" title = "Xem chi tiết" class="show-order-client">' . $object->code . '</a>';
            })
            ->editColumn('created_at', function ($object) {
                return formatDate($object->created_at);
            })
            ->addColumn('action', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';
                $result = $result . ' <a href="" title="đổi trạng thái" class="dropdown-item update-status"><i class="fa fa-angle-right"></i>Đổi trạng thái</a>';
                if ($object->type == 0) {
                    $result = $result . ' <a href="'.route('orders-finance.show', $object->id).'" title="xem chi tiết" class="dropdown-item"><i class="fa fa-angle-right"></i>Xem chi tiết</a>';
                }
                $result = $result . '</div></div>';
                return $result;
            })
            ->addColumn('action_client', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';
                if ($object->type == 0) {
                    $result = $result . ' <a href="" title="Hủy đơn hàng" class="dropdown-item update-status"><i class="fa fa-angle-right"></i>Hủy đơn hàng</a>';
                    $result = $result . ' <a href="'.route('orders-finance.show', $object->id).'" title="xem chi tiết" class="dropdown-item"><i class="fa fa-angle-right"></i>Xem chi tiết</a>';
                }
                $result = $result . '</div></div>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['code', 'action', 'action_client', 'code_client'])
            ->make(true);
    }

    public function show(Request $request, $id) {
        $order = FinanceOrder::query()->with(['details' => function ($q) {
            $q->with(['product','variant']);
        }])->find($id);
        $order->customer_name = $order->display_name;

        return view($this->view . '.show', compact('order'));
    }

    public function updateStatus(Request $request)
    {
        $order = FinanceOrder::query()->find($request->order_id);
        $order->status = $request->status;
        $order->save();


        return Response::json(['success' => true, 'message' => 'cập nhật trạng thái đơn hàng thành công']);
    }

    public function exportList(Request $request) {
        $data = Order::searchByFilter($request)->where('type', 0)->values();
        $result['CHI_TIET'] = Order::getTableList($data);
        $result['COLSPAN'] = 8;
        $result['FROM_DATE'] = $request->startDate ? Carbon::parse($request->startDate)->format('d/m/Y') : '';
        $result['TO_DATE'] = $request->endDate ? Carbon::parse($request->endDate)->format('d/m/Y') : '';

        return (new OrderExcel())
            ->forData($result)
            ->download('danh_sach_don_hang.xlsx');
    }

    // Import Excel
    public function importExcel(Request $request) {
        $validate = Validator::make(
            $request->all(),
            [
                'file' => 'required|file|mimes:xlsx,xls,csv,txt',
            ],
            [
                'file.required' => 'Không được để trống',
                'file.file' => 'Không hợp lệ',
                'file.mimes' => 'Không hợp lệ',
            ]
        );

        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Import thất bại!";
            return Response::json($json);
        }
        DB::beginTransaction();
        try {
            $import = new OrderImport;
            Excel::import($import, $request->file('file'));

            DB::commit();

            $json->success = true;
            $json->details = [
                'import' => $import->getImportCount(),
                'skip' => $import->getSkipCount(),
                'invalid_rows' => $import->getInvalidRow(),
            ];
            $json->message = "Import thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            $json->success = false;
            $json->message = "Đã có lỗi xảy ra!";
            return Response::json($json);
        }
    }
}
