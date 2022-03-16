<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\shop\ChangePasswordRequest;
use App\Http\Requests\shop\UpdateProfileRequest;
use App\Order;
use Hash;
use Mail;
use Illuminate\Support\Str;
use DB;
use \Carbon\Carbon;

class UserController extends Controller
{
    public function Login()
    {
        return view('shop.auth.login');
    }
    public function register()
    {
        return view('shop.auth.register');
    }

    public function profile()
    {
        $user = User::findOrFail(Auth()->user()->id);
        return view('shop.auth.profile', compact('user'));
    }

    public function update_password(ChangePasswordRequest $request)
    {
        $old_password = $request->input('old_password');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $user = auth()->user();

        if (Hash::check($old_password, $user->password)) {
            if ($password == $confirm_password) {
                $user->password = Hash::make($password);
                $user->save();
                return redirect()->back()->with('success', 'password changed successfully');
            } else {
                return redirect()->back()->with('err', 'password not match');
            }
        } else {
            return redirect()->back()->with('err', 'current password is not correct');
        }
    }
    public function update_profile(UpdateProfileRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();
        $user->fill($data)->save();
        return redirect()->back()->with('success', 'profile updated successfully');
    }

    public function showForgetPasswordForm()
    {
        return view('shop.auth.password');
    }
    public function submitForgetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('mail.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('shop.auth.passwords_reset', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('err', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('Login')->with('success', 'Your password has been changed!');
    }

    public function orderDetails($id){
        $order = Order::with('order_products')->find($id);
        return view('shop.orderDetail',compact('order'));
    }
}
