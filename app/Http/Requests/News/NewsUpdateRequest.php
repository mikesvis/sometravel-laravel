<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'slug' => ['sometimes', 'nullable', 'unique:news,slug,'.$this->route('news')],
            'excerpt' => ['required', 'min:5'],
            'date' => ['required', 'date_format:"Y-m-d H:i:s"'],
            'ordering' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
        ];
    }
}
