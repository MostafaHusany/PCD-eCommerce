<?php

namespace App\Http\Requests\shop;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $checkbox = $this->input('checkbox');
        if ($checkbox && auth()->user()) {
            $email = [
                'required_if:address_id,0', 'string', 'email', 'max:255',
                "unique:users,email," . Auth()->user()->id
            ];
            $password = ['required_with:checkbox,on', 'string', 'min:8'];
        } else  if ($checkbox) {
            $email = [
                'required_if:address_id,0', 'string', 'email', 'max:255',
                "unique:users,email"
            ];
            $password = ['required_with:checkbox,on', 'string', 'min:8'];
        } else {
            $email = ['nullable'];
            $password = ['nullable'];
        }
        $check = $this->input('check');
        if ($check || !auth()->user()) {
            $phone = [
                'required_if:address_id,0', 'string', 'max:255',
                'unique:users,phone'
            ];
        } else if (auth()->user()) {
            $phone = [
                'required_if:address_id,0', 'max:255',
                'unique:users,phone,' . Auth()->user()->id
            ];
        } else {
            $phone = ['nullable'];
        }

        return [
            'address_id' => 'nullable',
            'first_name' => 'required_if:address_id,0',
            'last_name' => 'required_if:address_id,0',
            'address'   => 'required_if:address_id,0',
            'city'      => 'required_if:address_id,0',
            'state'     => 'required_if:address_id,0',
            'checkbox'  => 'sometimes',
            'email'     => $email,
            'password'  => $password,
            'zipcode'   => 'required_if:address_id,0',
            'phone'     =>  $phone,
            'shipping_id_field' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required_if' => trans('frontend.first_name_required'),
            'last_name.required_if' => trans('frontend.last_name_required'),
            'address.required_if' => trans('frontend.address_required'),
            'city.required_if' => trans('frontend.city_required'),
            'state.required_if' => trans('frontend.state_required'),
            'zipcode.required_if' => trans('frontend.zipcode_required'),
            'phone.required_if' => trans('frontend.phone_required'),
            // 'payment_file.required' => trans('frontend.payment_file_required'),
            'shipping_id_field.required' => trans('frontend.shipping_id_field'),
            'email.required_with' => trans('frontend.email_required'),
            'password.required_with' => trans('frontend.password_required'),
            'email.string' => trans('frontend.password_string'),
            'email.unique' => trans('frontend.email_unique'),
            'email.email' => trans('frontend.email_formate'),
            'password.string' => trans('frontend.password_string'),
            'promoCode.required_with' => trans('frontend.promo_required_with'),
        ];
    }
}
