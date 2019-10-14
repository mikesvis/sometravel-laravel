<?php

namespace App\Rules\Client;

use App\Helpers\PhoneHelper;
use App\Models\PhoneVerification;
use Illuminate\Contracts\Validation\Rule;

class VerifyCodeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $phone;

    public function __construct($phone)
    {
        $this->phone = $phone;
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

        $codeIsVerified = PhoneVerification::whereNull('verified_at')
            ->where('token', PhoneHelper::generateToken($this->phone, $value))
            ->where('code_sent_at', '>=', PhoneHelper::whiteVerificationPeriod())
            ->orderBy('code_sent_at', 'desc')
            ->take(1)
            ->count();

        return $codeIsVerified;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Неправильный код';
    }
}
