<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
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
            'slug' => ['sometimes', 'nullable', 'unique:pages,slug,'.$this->route('page')],
            'ordering' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }
}
