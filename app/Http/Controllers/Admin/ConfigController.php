<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Config as ThisModel;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use App\Http\Controllers\Controller;
use App\Helpers\FileHelper;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use DB;

class ConfigController extends Controller
{
	protected $view = 'admin.configs';
	protected $route = 'Config';

	public function edit()
	{
		$id = 1;
		$object = ThisModel::getDataForEdit($id);
        $array_zalo_chat = [
            [
                'title' => '',
                'phone' => ''
            ]
        ];
        if (!is_null($object->zalo_chat)) {
            $decoded = json_decode($object->zalo_chat, true);
            if (is_array($decoded) && count($decoded) > 0) {
                $array_zalo_chat = $decoded;
            }
        }

        $object->zalo_chat = $array_zalo_chat;
		return view($this->view.'.edit', compact('object'));
	}

	public function update(Request $request)
	{
		$request->merge([
            'zalo_chat' => json_decode($request->zalo_chat, true)
        ]);

        if ($request->email) {
            $emails = explode("\n", $request->email);
            $emails = array_map('trim', $emails);
            $request->merge([
                'emails' => $emails
            ]);
        }
		$validate = Validator::make(
			$request->all(),
			[
				'web_title' => 'required|max:255',
				'hotline' => 'required',
				'zalo' => 'required',
				'emails' => 'required',
                'emails.*' => 'email',
				'facebook' => 'nullable|max:255',
				'image' => 'nullable|file|mimes:jpg,jpeg,png|max:3000',
                'favicon' => 'nullable|file|mimes:jpg,jpeg,png|max:3000',
                'location' => 'nullable',
                'revenue_percent_5' => 'nullable|numeric|min:0|max:100',
                'revenue_percent_4' => 'nullable|numeric|min:0|max:100',
                'revenue_percent_3' => 'nullable|numeric|min:0|max:100',
                'revenue_percent_2' => 'nullable|numeric|min:0|max:100',
                'revenue_percent_1' => 'nullable|numeric|min:0|max:100',
                'zalo_chat' => 'required|array',
                'zalo_chat.*.title' => 'required|string|max:255',
                'zalo_chat.*.phone' => 'required|regex:/^(0)[0-9]{9,11}$/',
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
			$object = ThisModel::where('id',1)->first();
			$object->web_title = $request->web_title;
			$object->meta_title = $request->meta_title;
			$object->short_name_company = $request->short_name_company;
			$object->hotline = $request->hotline;
			$object->web_des = $request->web_des;
			$object->zalo = $request->zalo;
			$object->address_company = $request->address_company;
			$object->address_center_insurance = $request->address_center_insurance;
			$object->email = $request->email;
			$object->facebook = $request->facebook;
			$object->twitter = $request->twitter;
			$object->instagram = $request->instagram;
			$object->youtube = $request->youtube;
			$object->location = $request->location;
			$object->introduction = $request->introduction;
			$object->address = $request->address;
			$object->tax_code = $request->tax_code;

			$object->click_call = $request->click_call;
			$object->facebook_chat = $request->facebook_chat;
			$object->zalo_chat = json_encode($request->zalo_chat);
			$object->phone_switchboard = $request->phone_switchboard;
            $object->revenue_percent_5 = $request->revenue_percent_5;
            $object->revenue_percent_4 = $request->revenue_percent_4;
            $object->revenue_percent_3 = $request->revenue_percent_3;
            $object->revenue_percent_2 = $request->revenue_percent_2;
            $object->revenue_percent_1 = $request->revenue_percent_1;
            $object->text_top_header = $request->text_top_header;
            $object->working_time = $request->working_time;
			$object->save();

			if($request->image) {
				if($object->image) {
					FileHelper::forceDeleteFiles($object->image->id, $object->id, ThisModel::class, 'image');
				}
				FileHelper::uploadFile($request->image, 'configs', $object->id, ThisModel::class, 'image',99);
			}

            if($request->favicon) {
                if($object->favicon) {
                    FileHelper::forceDeleteFiles($object->favicon->id, $object->id, ThisModel::class, 'favicon');
                }
                FileHelper::uploadFile($request->favicon, 'configs', $object->id, ThisModel::class, 'favicon',7);
            }

            $object->syncGalleries($request->galleries);

            DB::commit();
			$json->success = true;
			$json->message = "Thao tác thành công!";
			return Response::json($json);
		} catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
	}
}
