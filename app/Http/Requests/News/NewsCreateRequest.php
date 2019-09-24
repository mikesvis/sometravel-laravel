<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
            'country' => ['required', 'string', 'min:3'],
            'title' => ['required', 'string', 'min:3'],
            'slug' => ['string', 'nullable'],
            'excerpt' => ['required', 'min:8'],
            'date' => [],
            'ordering' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }
}
