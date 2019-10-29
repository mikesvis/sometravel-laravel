<?php

namespace App\Http\Controllers\Front;

use App\Models\Visa\Visa;
use App\Helpers\VisaHelper;
use Illuminate\Http\Request;
use App\Mail\Forms\PopupForm;
use App\Mail\Forms\InlineForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Form\PopupFormRequest;
use App\Http\Requests\Form\InlineMainFormRequest;
use App\Http\Requests\Form\InlineUsualFormRequest;

class FormsController extends Controller
{
    public function popupForm(PopupFormRequest $request)
    {
        $data = [
            'formTitle' => [
                'name' => 'Форма',
                'value' => $request->input('formTitle'),
            ],
            'formUrl' => [
                'name' => 'Url страницы',
                'value' => $request->input('formUrl'),
            ],
            'name' => [
                'name' => 'Имя',
                'value' => $request->input('name'),
            ],
            'phone' => [
                'name' => 'Телефон',
                'value' => $request->input('phone'),
            ],
            'email' => [
                'name' => 'E-mail',
                'value' => $request->input('email'),
            ],
        ];

        if($request->has('isVisaPage')){

            $visa = Visa::find((int)$request->input('visa_id'));

            $data['visa'] = [
                'name' => 'Виза для страны',
                'value' => $visa->title,
            ];

            $data['persons'] = [
                'name' => 'Кол-во персон',
                'value' => $request->input('persons'),
            ];

            $data['parameter'] = [];

            if(is_array($request->input('parameter'))){

                $data['parameter'] = VisaHelper::composeParameters($request->input('parameter'));

            }

            $data['parameter_regular'] = [];

            if(is_array($request->input('parameter_regular'))){

                $well = $request->all();

                $data['parameter_regular'] = VisaHelper::composeParametersRegular($visa, $well);

            }

        }

        if($request->has('isFranchisePage')){
            $data['format'] = [
                'name' => 'Формат сотрудничества',
                'value' => $request->input('format'),
            ];
        }

        Mail::to(config('mail.from.address'))->send(new PopupForm($data));

        return [
            'message' => '<p class="text-success">
                Ваше сообщение успешно отправлено! Наши менеджеры свяжутся с Вами в ближайшее время!
            </p>'
        ];

    }

    public function inlineForm(InlineUsualFormRequest $request)
    {
        $data = [
            'formTitle' => [
                'name' => 'Форма',
                'value' => $request->input('formTitle'),
            ],
            'formUrl' => [
                'name' => 'Url страницы',
                'value' => $request->input('formUrl'),
            ],
            'phone' => [
                'name' => 'Телефон',
                'value' => $request->input('phone'),
            ],
        ];

        Mail::to(config('mail.from.address'))->send(new InlineForm($data));

        return [
            'message' => '<p class="h4 text-success text-center font-weight-normal">Ваше сообщение успешно отправлено! Наши менеджеры свяжутся с Вами в ближайшее время!</p>'
        ];
    }

    public function mainpageForm(InlineMainFormRequest $request)
    {
        $data = [
            'formTitle' => [
                'name' => 'Форма',
                'value' => $request->input('formTitle'),
            ],
            'formUrl' => [
                'name' => 'Url страницы',
                'value' => $request->input('formUrl'),
            ],
            'name' => [
                'name' => 'Имя',
                'value' => $request->input('name'),
            ],
            'phone' => [
                'name' => 'Телефон',
                'value' => $request->input('phone'),
            ],
        ];

        Mail::to(config('mail.from.address'))->send(new InlineForm($data));

        return [
            'message' => '<p class="h4 text-success text-center font-weight-normal">Ваше сообщение успешно отправлено! Наши менеджеры свяжутся с Вами в ближайшее время!</p>'
        ];
    }

}
