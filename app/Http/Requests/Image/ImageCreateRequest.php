<?php

namespace App\Http\Requests\Image;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageCreateRequest extends FormRequest
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
            'image' => [
                'required',
                'image',
                'mimes:'.(Image::ALLOWED_MIMES),
                'dimensions:max_width='.(Image::IMAGE_MAX_UPLOAD_DIMENSIONS['width']).',max_height='.(Image::IMAGE_MAX_UPLOAD_DIMENSIONS['height'])
            ]
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Необходимо выбрать файл для загрузки',
            'image.image' => 'Выбранный файл должен быть изображением.',
            'image.mimes' => 'Допустимый тип изображения: '.(Image::ALLOWED_MIMES),
            'image.dimensions' => 'Допустимый размер изображения: макс. ширина - '.(Image::IMAGE_MAX_UPLOAD_DIMENSIONS['width']).', макс. высота - '.(Image::IMAGE_MAX_UPLOAD_DIMENSIONS['height']),
        ];
    }
}
