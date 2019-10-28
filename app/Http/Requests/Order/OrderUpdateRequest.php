<?php

namespace App\Http\Requests\Order;

use App\Helpers\OrderHelper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'status' => ['required', 'integer', Rule::in(array_keys(OrderHelper::statusesWhiteList()))],
            'appliance_date' => ['nullable', 'date_format:"Y-m-d H:i:s"'],
            'delivery_date' => ['nullable', 'date_format:"Y-m-d H:i:s"'],
        ];
    }
}
