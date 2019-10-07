<?php

namespace App\Http\Requests\Visa;

use Illuminate\Foundation\Http\FormRequest;

class ValueCreateRequest extends FormRequest
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
            'parameter_id' => ['required', 'integer', 'exists:parameters,id'],
            'title' => ['required', 'string', 'min:3'],
            'calculator_title' => ['string', 'nullable'],
            'price' => ['required', 'integer'],
            'is_default' => ['required', 'boolean'],
            'ordering' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }
}
