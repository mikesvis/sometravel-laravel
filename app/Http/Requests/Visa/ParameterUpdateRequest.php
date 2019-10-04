<?php

namespace App\Http\Requests\Visa;

use Illuminate\Foundation\Http\FormRequest;

class ParameterUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3'],
            'calculator_title' => ['string', 'nullable'],
            'is_on_calculator_page' => ['required', 'boolean'],
            'order_title' => ['string', 'nullable'],
            'is_on_order_page' => ['required', 'boolean'],
            'ordering' => ['required', 'integer', 'min:0'],
            'required' => ['required', 'boolean'],
        ];
    }
}
