<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Traits\ResponseTrait;
use App\Model\Admin\Category;
use App\Model\Admin\FinanceCompany;
use App\Model\Admin\FinancePackage;
use Illuminate\Http\Request;
use App\Model\Admin\FinanceCompany as ThisModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use \stdClass;

use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;


class FinanceCompanyController extends Controller
{
    use ResponseTrait;
    protected $view = 'admin.finance_companies';
    protected $route = 'finance_companies';

    public function index()
    {
        return view($this->view . '.index');
    }

    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);

        return Datatables::of($objects)
            ->editColumn('created_at', function ($object) {
                return formatDate($object->updated_at);
            })
            ->editColumn('content', function ($object) {
                return Str::limit($object->content, 100);
            })
            ->addColumn('action', function ($object) {
                $result = '';
                $result .= '<a href="'.route('contacts.delete', $object->id).'" title="Xóa" class="btn btn-sm btn-danger confirm"><i class="fas fa-times"></i></a>';
                $result .= '&nbsp;<a href="javascript:void(0)" title="Chi tiết" class="btn btn-sm btn-primary show-detail"><i class="fas fa-eye"></i></a>';
                return $result;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        return view($this->view . '.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'hotline' => 'required',
                'status' => 'required',
                'packages' => 'required|array',
                'packages.*.term_months' => 'required',
                'packages.*.down_pct_min' => 'required',
                'packages.*.down_pct_max' => 'required',
                'packages.*.interest_monthly' => 'required',
                'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:10240',
            ]
        );

        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = new \App\Model\Admin\FinanceCompany();

            $object->name = $request->name;
            $object->hotline = $request->hotline;
            $object->website = $request->website;
            $object->document = $request->document;
            $object->note = $request->note;
            $object->status = $request->status;
            $object->created_by = auth()->id();
            $object->save();

            foreach ($request->packages as $package) {
                $financePackage = new FinancePackage();
                $financePackage->company_id = $object->id;
                $financePackage->term_months = $package['term_months'];
                $financePackage->down_pct_min = $package['down_pct_min'];
                $financePackage->down_pct_max = $package['down_pct_max'];
                $financePackage->interest_monthly = $package['interest_monthly'];

                $financePackage->save();
            }

            FileHelper::uploadFileToCloudflare($request->image, $object->id, ThisModel::class, 'image');

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            $json->data = $object;
            return Response::json($json);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function edit( $id) {
        $object = ThisModel::getDataForEdit($id);
        return view($this->view.'.edit', compact('object'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'hotline' => 'required',
                'status' => 'required',
                'packages' => 'required|array',
                'packages.*.term_months' => 'required',
                'packages.*.down_pct_min' => 'required',
                'packages.*.down_pct_max' => 'required',
                'packages.*.interest_monthly' => 'required',
                'image' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:10240',
            ]
        );

        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = FinanceCompany::query()->find($id);

            $object->name = $request->name;
            $object->hotline = $request->hotline;
            $object->website = $request->website;
            $object->document = $request->document;
            $object->note = $request->note;
            $object->status = $request->status;
            $object->created_by = auth()->id();
            $object->save();

            $object->packages()->delete();

            foreach ($request->packages as $package) {
                $financePackage = new FinancePackage();
                $financePackage->company_id = $object->id;
                $financePackage->term_months = $package['term_months'];
                $financePackage->down_pct_min = $package['down_pct_min'];
                $financePackage->down_pct_max = $package['down_pct_max'];
                $financePackage->interest_monthly = $package['interest_monthly'];

                $financePackage->save();
            }

            if($request->image) {
                if($object->image) {
                    FileHelper::deleteFileFromCloudflare($object->image, $object->id, ThisModel::class, 'image');
                }
                FileHelper::uploadFileToCloudflare($request->image, $object->id, ThisModel::class, 'image');
            }


            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            $json->data = $object;
            return Response::json($json);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        $object = ThisModel::findOrFail($id);

        $object->delete();

        $message = array(
            "message" => "Thao tác thành công!",
            "alert-type" => "success"
        );

        return redirect()->route($this->route . '.index')->with($message);
    }



}
