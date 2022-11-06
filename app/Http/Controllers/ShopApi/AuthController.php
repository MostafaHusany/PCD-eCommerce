<?php

namespace App\Http\Controllers\shopApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Order;
use App\Customer;
use App\District;
use App\VCustomerPhone;
use App\SystemSetting;


use App\Traits\SMSSender;

class AuthController extends Controller
{
    use SMSSender;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'phoneLogin', 'register', 'countries', 'requestPhoneCode']]);
    }
    
    private function verifyPhone ($phone, $code, $has_user = false) {
        /**
         * 
         * # Register cycle with the phone.
         * 1- user add register data, the user
         * add his phone in this data.
         * 
         * 2- send a request with the user phone.
         * 
         * 3- record user phone and genrate randome
         * code, than send this code in sms.
         * 
         * 4- the user add the recived code in 
         * the register request.
         * 
         * 5- the register method confirm the phone
         * and code before creating the user account.
         * 
         * # Signup with user phone.
         * 1- the user enter his phone, than the systme
         * check if the phone exists and has user account
         * 
         * 2- generate a random code for the phone and send
         * the code to user phone on sms.
         * 
         * 3- the user send a signin request with the phone
         * and the code, than the system authorise the user.
         * 
        */
        
        $target_phone = VCustomerPhone::where(function ($q) use ($phone, $code, $has_user) {
            $q->where('phone', $phone);
            $q->where('code', $code);
            $q->whereDate('updated_at', Date('Y-m-d'));
            !$has_user ?? $q->where('user_id', '!=', null);
        })->first();

        return isset($target_phone) ? $target_phone : false;
    }

    public function requestPhoneCode (Request $request) {
        /**
         * # Record user phone and generate randome code
         * than send sms to user phone with the code. 
         * 
         * # We have a new senario login and register will be only with 
         * phone number, this mean that if the phone dosn't exists we need
         * to do register a new account for the user.
         *  
        */

        // $validator = Validator::make($request->all(), [
        //     'phone' => isset($request->new_acc) ? 'required|unique:users,phone' : 'required|exists:users,phone',
        // ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $random_code  = 9999;
        $target_phone = VCustomerPhone::where('phone', $request->phone)->first();
        
        if(isset($target_phone)) {
            $target_phone->code = $random_code;
            $target_phone->updated_at = Date('Y-m-d');
            $target_phone->save();
        } else {
            // create user
            User::create([
                'phone'    => $request->phone,
                'password' => bcrypt($random_code)
            ]);

            $target_phone = VCustomerPhone::create([
                'phone' => $request->phone,
                'code' => $random_code
            ]);
        }

        /**
         * # here send sms message with the cerification code ...
        */
        $this->SMSTemplate($target_phone->phone, 'verification-sms', $random_code);

        return response()->json(array('data' => null, 'success' => true));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:300',
            // 'email'      => 'required|max:300|unique:users,email',
            // 'country_id' => 'required|exists:districts,id',
            // 'gove_id'    => 'required|exists:districts,id',
            'password'   => 'required|max:300',
            'phone'      => 'required|max:300|unique:users,phone|exists:v_customer_phones,phone',
            'code'       => ['required', 'max:4']
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }
        
        // dd($request->all());

        $target_verification = $this->verifyPhone($request->phone, $request->code);
        if (!$target_verification) {
            return response()->json(['data' => null, 'success' => false, 'msg' => ['code' => ['validation.phone_validation_code']] ]); 
        }
        
        $data = $request->all();
        $data['password']       = bcrypt($data['password']);
        $data['plain_password'] = $request->password;
        $data['email_verified_at'] = Date('Y-m-d');
        
        $target_user = User::create($data);
        $target_user->customer()->create($data);
        $target_verification->update(['user_id' => $target_user->id]);
        
        $token = auth('api')->attempt($request->only(['phone', 'password']));

        /**
         * # here send sms message with the cerification code ...
        */
        $this->SMSTemplate($target_user->phone, 'welcome-sms', '');

 
        return $this->respondWithToken($token);
    }

    public function updateAccount (Request $request)
    {
        
        $target_user = auth('api')->user();
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:300',
            'password'   => 'required|max:300',
            'phone'      => 'required|max:300|unique:users,phone,'.$target_user->id.'|exists:v_customer_phones,phone',
            'code'       => ['required', 'max:4']
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_verification = $this->verifyPhone($request->phone, $request->code);
        if (!$target_verification) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'phone_validation_code']); 
        }
        
        $data = $request->all();
        if (isset($request->password)) {
            $data['plain_password'] = $request->password;
            $data['password']       = bcrypt($request->password);
        }

        
        // $target_user = auth('api')->user;
        $target_user->update($data);
        $target_user->customer->update($data);
        
        $token = auth('api')->attempt($request->only(['phone', 'password']));
 
        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request(['phone', 'password']);
        // $target_user = User::where('phone', request('phone'))->first();
        
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function phoneLogin (Request $request) {
        $validator = Validator::make($request->all(), [
            'phone'      => ['required', 'max:300', 'exists:users,phone', 'exists:v_customer_phones,phone'],
            'code'       => ['required', 'max:4']
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_verification = $this->verifyPhone($request->phone, $request->code, true);
        if (!$target_verification) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'phone_validation_code']); 
        }

        $target_user = $target_verification->user;
        if (! $token = auth('api')->login($target_user)) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        $target_customer = auth('api')->user()->customer;
        
        $customer = [
            'name'     => $target_customer->name,
            'email'    => $target_customer->email,
            'address'  => $target_customer->address,
            'country'  => $target_customer->country,
            'gove'     => $target_customer->government,
            'password' => $target_customer->plain_password,
            'phone'    => $target_customer->phone,
        ];
        
        return response()->json(array('data' => $customer, 'success' => isset($customer)));
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    public function countries () {
        $countries = District::with(['children_districts'])->where('type', 'country')->where('is_active', 1)->get();
        
        return response()->json(array('data' => $countries, 'success' => isset($countries)));
    }

    protected function respondWithToken($token)
    {
        $target_customer = auth('api')->user()->customer;

        $customer = [
            'name'     => $target_customer->name,
            'email'    => $target_customer->email,
            'address'  => $target_customer->address,
            'country'  => $target_customer->country,
            'gove'     => $target_customer->government,
            'password' => $target_customer->plain_password,
            'phone'    => $target_customer->phone,
        ];

        return response()->json([
            'success'      => true,
            'customer'     => $customer,
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ]);
    }

    protected function SMSTemplate ($phone, $type , $sub_msg = null) {
        $sms_msgs = SystemSetting::where('setting_code', 'sms_settings')->first();
        $sms_msgs = (array) json_decode($sms_msgs->meta);
        $sms_temp = $sms_msgs[$type];
        $message = $sms_temp . $sub_msg;
        
        $this->sendSms($message, $phone);
    }

    public function getOrders () {

        $customerOrders = Order::query()->with(['products', 'invoice', 'status_obj']);
        $data = $customerOrders->has('invoice')->where('customer_id', auth()->user()->customer->id)->orderBy('orders.id', 'desc')->paginate(15);

        return response()->json(array('data' => $data, 'success' => true));
    }

    public function showOrder ($id) {

        $customerOrders = Order::query()->with(['products', 'invoice', 'status_obj']);
        $data = $customerOrders->has('invoice')->where('customer_id', auth()->user()->customer->id)
                ->where('orders.id', $id)->orderBy('orders.id', 'desc')->first();

        return response()->json(array('data' => $data, 'success' => true));
    }
}
