<?php

namespace App\Http\Controllers\shopApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Customer;
use App\District;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'countries']]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:300',
            'email'      => 'required|max:300|unique:users,email',
            'phone'      => 'required|max:300|unique:users,phone',
            'country_id' => 'required|exists:districts,id',
            'gove_id'    => 'required|exists:districts,id',
            'password'   => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }
        
        $data = $request->all();
        $data['password']       = bcrypt($data['password']);
        $data['plain_password'] = $data['password'];

        // create user & customer records
        $target_user = User::create($data);
        $target_user->customer()->create($data);

        $token = auth('api')->attempt($request->only(['phone', 'password']));
 
        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request(['phone', 'password']);
        
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        $target_customer = auth('api')->user()->customer()->with(['country', 'government'])->first();
        
        return response()->json(array('data' => $target_customer, 'success' => isset($target_customer)));
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
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
