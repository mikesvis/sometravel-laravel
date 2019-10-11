<?php

namespace App\Http\Requests\Client;

use App\Helpers\PhoneHelper;
use Illuminate\Foundation\Http\FormRequest;

class PreCheckPhoneRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'phone' => PhoneHelper::standartizeNumber($this->phone)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => ['unique:users', 'max:255', 'nullable'],
        ];
    }
}
