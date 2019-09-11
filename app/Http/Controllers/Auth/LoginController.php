<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $breadcrumbs = [
            self::BREADCRUMBS_HOME,
            [
                'name' => 'Вход',
                'url' => null
            ]
        ];
        return view('front.auth.login', compact('breadcrumbs'));
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'password' => 'required|string',
        // ]);

        // $validator->sometimes('emailOrPhone', 'required|string|email', function ($input) {
        //     return filter_var($input->emailOrPhone, FILTER_VALIDATE_EMAIL);
        // });

        // $validator->sometimes('emailOrPhone', 'required|min:100', function ($input) {
        //     return $input->emailOrPhone == 'foo';
        // });

        // dd($validator);

        // $validator->validate();

        // Validator::make($request->all(), [
        //     'emailOrPhone' => 'required|string|mailorphone',
        //     'body' => 'required',
        // ])->validate();

        $request->validate([
            'emailOrPhone' => 'required|string|mailorphone',
            'password' => 'required|string',
        ]);
    }
}
