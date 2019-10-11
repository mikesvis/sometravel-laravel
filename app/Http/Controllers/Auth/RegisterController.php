<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Client;
use App\Helpers\PhoneHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Client\ClientRegisterRequest;
use App\Http\Requests\Client\PreCheckPhoneRequest;

class RegisterController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $attributes = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

        $user = (new Client)->create($attributes);

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $breadcrumbs = [
            self::BREADCRUMBS_HOME,
            [
                'name' => 'Регистрация',
                'url' => null
            ]
        ];

        $phoneIsVerified = $this->phoneIsVerified(old('phone', null));

        return view('front.auth.register', compact('breadcrumbs', 'phoneIsVerified'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(ClientRegisterRequest $request)
    {
        // $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Redirect authenticated user to any of admin / cabinet, depending on model
     */
    public function redirectTo()
    {
        return auth()->user()->userable->cabinet_link;
    }

    public function сheckPhone(PreCheckPhoneRequest $request)
    {
        // проверяем на корректность номера
        $data = ['status' => 'incorrect', 'message' => 'Неправильно указан номер.'];
        $phoneIsCorrect = PhoneHelper::preCheckRequestedPhone($request->input('phone'));

        // номер не очень... вываливаемся
        if($phoneIsCorrect == false)
            return $data;

        // проверяем подтвержден ли код
        $data = ['status' => true];
        $phoneIsVerified = PhoneHelper::phoneIsVerified($phoneIsCorrect);

        // номер подтвержден, всё норм, вываливаемся
        if($phoneIsVerified)
            return $data;

        // дальше мы делаем следующее

        $data = [
            'status' => PhoneHelper::phoneIsVerified($phoneIsCorrect)
        ];

        return $data;
    }

    public function phoneIsVerified($phone = null)
    {

        // phone is empty
        if(empty($phone))
            return false;

        // phone is incorrect
        if(PhoneHelper::isCorrectPhoneNumber($phone) == false)
            return false;

        $phone = PhoneHelper::standartizeNumber($phone);



        return true;
    }
}
