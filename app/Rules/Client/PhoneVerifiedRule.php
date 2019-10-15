<?php

namespace App\Rules\Client;

use App\Helpers\PhoneHelper;
use Illuminate\Contracts\Validation\Rule;

class PhoneVerifiedRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return PhoneHelper::phoneIsVerified(PhoneHelper::standartizeNumber($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Подтвердите номер телефона';
    }
}
