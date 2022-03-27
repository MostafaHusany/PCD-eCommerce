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
        if ($checkbox) {
            $email = ['required_if:address_id,0', 'string', 'email', 'max:255', 'unique:users'];
            $password = ['required_with:checkbox,on', 'string', 'min:8'];
        } else {
            $email = ['required_if:address_id,0', 'string', 'email', 'max:255', 'unique:users'];
            $password = ['nullable'];
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
            'phone'     => 'required_if:address_id,0',
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
            'email.unique' => trans('frontend.password_unique'),
            'email.email' => trans('frontend.password_email'),
            'password.string' => trans('frontend.password_string'),
            'promoCode.required_with' => trans('frontend.promo_required_with'),
        ];
    }
}
