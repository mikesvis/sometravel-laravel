<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use App\Helpers\PhoneHelper;
use App\Models\PhoneVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Client\CheckCodeRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Client\ResendCodeRequest;
use App\Http\Requests\Client\PreCheckPhoneRequest;
use App\Notifications\Client\VerificationCodeSent;
use App\Http\Requests\Client\ClientRegisterRequest;

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
            'phone' => $data['phone'],
            'email' => $data['email'],
            'surname' => $data['surname'],
            'name' => $data['name'],
            'patronymic' => $data['patronymic'],
            'password' => Hash::make($data['password']),
            'subscribe' => $data['subscribe'],
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

        return view('front.auth.register', compact('breadcrumbs'));
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

        if($request->has('proceed'))
            return redirect(route('front.order.step-2'));

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
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

        // номер был подтвержден за последний PhoneHelper::whiteVerificationPeriod(), последний код смс из сессии корректный, всё норм, вываливаемся
        if($phoneIsVerified)
            return $data;

        /**
         * Смотрим, не спамер ли это:
         * Если не проходим проверку PhoneHelper::isSmsSpender(), то выводим сообщение об ошибке
         * что с данного адреса или с этим номером телефона превышен лимит запросов кодов
         */
        $data = ['status' => 'is_blocked', 'message' => 'Превышен лимит запросов кодов. Попробуйте позже.'];
        $guestIsSmsSpender = PhoneHelper::isSmsSpender($phoneIsCorrect);

        // Это спамер, посылаем его лесом и вываливаемся с ошибкой
        if($guestIsSmsSpender)
            return $data;

        /**
         * Генерируем код, отправляем смс, записываем в базу с токеном, показываем модальку и ждем ввода кода
         */
        $data = [
            'status' => false,
            'phone' => PhoneHelper::beautifyPhone($phoneIsCorrect),
        ];

        $this->sendNewCode($phoneIsCorrect);

        return $data;
    }

    public function checkCode(CheckCodeRequest $request)
    {

        $verifyPhone = PhoneVerification::whereNull('verified_at')
            ->where('token', PhoneHelper::generateToken($request->input('phone'), $request->input('smsCode')))
            ->where('code_sent_at', '>=', PhoneHelper::whiteVerificationPeriod())
            ->orderBy('code_sent_at', 'desc')
            ->first();

        $verifyPhone->verified_at = \Carbon\Carbon::now()->format("Y-m-d H:i:s");

        $verifyPhone->save();

        return ['status'=>$verifyPhone->save()];
    }

    public function resendCode(ResendCodeRequest $request)
    {

        $phone = PhoneHelper::standartizeNumber($request->input('phone'));

        /**
         * Смотрим, не спамер ли это:
         * Если не проходим проверку PhoneHelper::isSmsSpender(), то выводим сообщение об ошибке
         * что с данного адреса или с этим номером телефона превышен лимит запросов кодов
         */
        $data = ['status' => 'is_blocked', 'message' => 'Превышен лимит запросов кодов. Попробуйте позже.'];
        $guestIsSmsSpender = PhoneHelper::isSmsSpender($phone);

        // Это спамер, посылаем его лесом и вываливаемся с ошибкой
        if($guestIsSmsSpender)
            return $data;

        $result = $this->sendNewCode($phone);

        $data = ['status' => false, 'message' => 'Отправить новый код можно только по истечению таймера.'];
        if($result == false)
            return $data;

        $data = ['status' => true, 'message' => 'Новый СМС код был отправлен на ваш номер телефона. Пожалуйста введите его в поле ниже.'];

        return $data;

    }

    public function sendNewCode($phone)
    {

        $codeHasBeenJustSent = PhoneHelper::codeHasBeenJustSent($phone);

        if($codeHasBeenJustSent == true)
            return false;

        $code = PhoneHelper::generateCode();
        session(['sms_code' => $code]);

        $phoneVerification = PhoneVerification::create([
            'phone' => $phone,
            'code' => $code,
            'code_sent_at' => \Carbon\Carbon::now()->format("Y-m-d H:i:s"),
            'verified_at'=> null,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'token' => PhoneHelper::generateToken($phone, $code)
        ]);

        // $phoneVerification->notify(new VerificationCodeSent($phoneVerification->code));

        return true;

    }
}
