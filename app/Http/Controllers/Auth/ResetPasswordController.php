<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {

        $breadcrumbs = [
            self::BREADCRUMBS_HOME,
            [
                'name' => __('Reset Password'),
                'url' => null
            ]
        ];

        return view('front.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email, 'breadcrumbs' => $breadcrumbs]
        );
    }

    /**
     * Redirect authenticated user to any of admin / cabinet, depending on model
     */
    public function redirectTo()
    {
        return auth()->user()->userable->cabinet_link;
    }
}
