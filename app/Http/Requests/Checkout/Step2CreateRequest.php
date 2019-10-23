<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class Step2CreateRequest extends FormRequest
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
            'date_start' => ['required', 'date_format:"d.m.Y"'],
            'date_end' => ['required', 'date_format:"d.m.Y"', 'after_or_equal:date_start'],
            'tickets' => ['required', 'boolean'],
            'hotel' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'date_start.date_format' => 'Неверно указана дата (д.м.г).',
            'date_end.date_format' => 'Неверно указана дата (д.м.г).',
            'date_end.after_or_equal' => 'Дата окончания поездки не может быть раньше даты начала.',
            'tickets.required' => 'Укажите наличие билетов.',
            'hotel.required' => 'Укажите наличие брони гостиницы.',
        ];
    }
}
