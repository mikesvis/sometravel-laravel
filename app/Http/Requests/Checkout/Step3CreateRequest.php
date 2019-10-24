<?php

namespace App\Http\Requests\Checkout;

use App\Helpers\PaymentHelper;
use App\Helpers\WizardHelper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Checkout\RequiredParametersRule;

class Step3CreateRequest extends FormRequest
{

    public $parameters;
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

        $rules = [
            'persons' => ['required', 'integer', 'min:1', 'max:100'],
            'payment_method' => ['required', 'integer', Rule::in(PaymentHelper::PAYMENT_METHODS_WHITE_LIST)],
        ];

        $this->wizard = new WizardHelper;

        $this->parameters = \App\Models\Visa\Parameter::where('visa_id', $this->wizard->visa)
            ->where('is_on_order_page', 1)
            ->where('required', 1)
            ->get();

        foreach ($this->parameters as $parameter) {
            $rules['parameter.'.$parameter->id] = ['required'];
        }

        return $rules;
    }

    public function messages()
    {
        $result = [];
        foreach ($this->parameters as $parameter) {
            $result['parameter.'.$parameter->id.'.required'] = 'Параметр '.$parameter->title.' обязателен для заказа.';
        }
        return $result;
    }

}
