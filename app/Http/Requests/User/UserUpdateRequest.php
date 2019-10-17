<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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

        // dd(\Auth::user()->email);

        $rules = [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.\Auth::user()->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed', 'nullable'],
        ];

        if(\Auth::user()->isAdmin()) {
            $rules = array_merge($rules, [
                'surname' => ['nullable', 'string', 'min:2', 'max:255'],
                'patronymic' => ['nullable', 'string', 'min:2', 'max:255'],
            ]);
        } else {
            $rules = array_merge($rules, [
                'surname' => ['required', 'string', 'min:2', 'max:255'],
                'patronymic' => ['required', 'string', 'min:2', 'max:255'],
                'birthday' => ['nullable', 'date_format:"d.m.Y"'],
                'subscribe'=>['required', 'boolean'],
            ]);
        }

        return $rules;
    }
}
