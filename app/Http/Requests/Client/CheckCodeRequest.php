<?php

namespace App\Http\Requests\Client;

use App\Helpers\PhoneHelper;
use App\Rules\Client\VerifyCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckCodeRequest extends FormRequest
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
            'phone' => ['required', 'unique:users', 'max:255'],
            'smsCode' => ['required', 'string', 'min:0', 'max:255', new VerifyCodeRule($this->phone)],
        ];
    }
}
