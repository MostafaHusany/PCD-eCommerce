<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\SentSMS;
use App\SystemSetting;

use App\Traits\SMSSender;

class SMSController extends Controller
{
    /**
     * # Show failed sms 
     * # Send custome sms
     * # Show where we can send sms,
     * sms template for each option
     * and activate or de-activate
     * like ... 
     * 1- send sms for phone validation, and it's template 
     * 2- send sms when order is created
     * 3- send sms when payment request is uploaded
     * 4- send sms when oreder status change 
     */

    use SMSSender;

    public function index (Request $request) {
        if ($request->ajax()) {
            $model = SentSMS::query();
            
            if (isset($request->phone)) {
                $model->where('phone', 'like', '%'.$request->phone.'%');
            }

            if (isset($request->status)) {
                $model->where('status', $request->status);
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('date', function ($row_object) {
                return isset($row_object->updated_at) ? explode(' ', $row_object->updated_at)[0] : '---';
            })
            ->addColumn('resend', function ($row_object) {
                return view('admin.sms.incs._resend', compact('row_object'));
            })
            ->addColumn('status', function ($row_object) {
                return view('admin.sms.incs._status', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.sms.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.sms.index');
    }

    public function show ($id) {
        $sms_settings = SystemSetting::where('setting_code', 'sms_settings')->first();
        $sms_settings = isset($sms_settings) ? $sms_settings : [
            'setting_code' => 'sms_settings',
            'meta' => json_encode([
                'verification-sms' => 'Dwingsa verification code is : ',
                'verification-sms-active' => true,

                'welcome-sms' => 'Welcome to Dwingsa store',
                'welcome-sms-active' => true,

                'create-order-sms' => 'Your order was created successfuly',
                'create-order-sms-active' => true,
                
                'order-status-sms' => 'Your order current status is : ',
                'order-status-sms-active' => true,
            ])
        ];
        $sms_settings = (array) json_decode($sms_settings['meta']);

        return response()->json(['data' => $sms_settings, 'success' => isset($sms_settings)]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|max:90|exists:users,phone',
            'sms'   => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $is_success = $this->sendSms($request->sms, $request->phone);

        return response()->json(['data' => null, 'success' => $is_success]);
    }

    public function update (Request $request, $id) {
        if (isset($request->resend_msg)) {
            return $this->resendSMS($id);
        }

        if (isset($request->system_settings)) {
            return $this->systemSettings($request);
        }
    }

    public function destroy ($id) {
        $target_object = SentSMS::find($id);
        isset($target_object) && $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    private function resendSMS ($id) {
        $target_message = SentSMS::find($id);

        $is_success = $this->sendSms($target_message->message, $target_message->phone, $target_message);

        if ($is_success) {
            $target_message->delete();
        }

        return response()->json(['data' => '', 'success' => $is_success]);
    }

    private function systemSettings ($request) {
        $old_sms_settings = SystemSetting::where('setting_code', 'sms_settings')->first();

        /*
            'verification-sms', 'verification-sms-active', 
            'welcome-sms', 'welcome-sms-active', 
            'create-order-sms', 'create-order-sms-active',
            'order-status-sms', 'order-status-sms-active'
        */
        $sms_settings = SystemSetting::create([
            'setting_code' => 'sms_settings',
            'meta' => json_encode([
                'verification-sms' => $request->input('verification-sms'),

                'welcome-sms' => $request->input('welcome-sms'),
                'welcome-sms-active' => $request->input('welcome-sms-active') == 'true' ? 'true' : 'false',

                'create-order-sms' => $request->input('create-order-sms'),
                'create-order-sms-active' => $request->input('create-order-sms-active') == 'true' ? 'true' : 'false',
                
                'order-status-sms' => $request->input('order-status-sms'),
                'order-status-sms-active' => $request->input('order-status-sms-active') == 'true' ? 'true' : 'false',
            ])
        ]);

        isset($old_sms_settings) && isset($sms_settings) ? $old_sms_settings->delete() : null;
        return response()->json(['data' => $sms_settings, 'success' => isset($sms_settings)]);
    }
}
