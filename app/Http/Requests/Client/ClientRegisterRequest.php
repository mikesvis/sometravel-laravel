<?php

namespace App\Http\Requests\Client;

use App\Helpers\PhoneHelper;
use App\Rules\Client\PhoneFormatRule;
use App\Rules\Client\PhoneVerifiedRule;
use Illuminate\Foundation\Http\FormRequest;

class ClientRegisterRequest extends FormRequest
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
            'phone' => [new PhoneFormatRule, 'unique:users', new PhoneVerifiedRule, 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'surname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'subscribe' => ['required', 'boolean'],
            'proceed' => ['sometimes', 'string'],
        ];
    }

}
