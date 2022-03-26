<?php

namespace App\Http\Requests\shop;

use Illuminate\Foundation\Http\FormRequest;

class PromoRequest extends FormRequest
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
        return [
            'promoCode' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'promoCode.required' => trans('frontend.promo_required_with'),
        ];
    }
}
