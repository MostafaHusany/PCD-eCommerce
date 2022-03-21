<?php

namespace App\Http\Requests\shop;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
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
            'payment_file' => 'required|max:10000',
        ];
    }
    public function messages()
    {
        return [
            'payment_file.required' => trans('frontend.payment_file_required'),
        ];
    }
}
