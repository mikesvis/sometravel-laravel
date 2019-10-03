<?php

namespace App\Http\Requests\Visa;

use App\Helpers\VisaHelper;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VisaUpdateRequest extends FormRequest
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
            'title_to' => ['required', 'string', 'min:3'],
            'menuname' => ['string', 'nullable'],
            'slug' => ['sometimes', 'nullable', 'unique:visas,slug,'.$this->route('visa')],

            'base_price' => ['required', 'integer'],
            'application_type' => ['required', 'integer', Rule::in(array_keys(VisaHelper::getApplicationTypeNamesForAdmin()))],
            'application_absence_price' => ['required_if:application_type,1', 'integer', 'min:0', 'nullable'],
            'acceptance_type' => ['required', 'integer', Rule::in(array_keys(VisaHelper::getAcceptanceTypeNamesForAdmin()))],
            'acceptance_price' => ['required_if:acceptance_type,1', 'integer', 'min:0', 'nullable'],
            'delivery_type' => ['required', 'integer', Rule::in(array_keys(VisaHelper::getDeliveryTypeNamesForAdmin()))],
            'delivery_price' => ['required_if:delivery_type,1', 'integer', 'min:0', 'nullable'],

            'categories' => ['array'],
            'documents' => ['array'],

            'ordering' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'application_absence_price.required_if' => 'Необходимо указать надбавку при данном типе',
            'acceptance_price.required_if' => 'Необходимо указать надбавку надбавку при данном типе',
            'delivery_price.required_if' => 'Необходимо указать надбавку при данном типе',
        ];
    }
}
