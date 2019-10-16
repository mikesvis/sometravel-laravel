<?php

namespace App\Http\Controllers\Front;

use App\Helpers\MenuHelper;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class ClientController extends FrontBaseController
{

    const NAME = 'Личный кабинет';

    public function index()
    {

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        $menuItems = (new MenuHelper)->getProfileItems();

        return view('front.profile.index', compact('breadcrumbs', 'menuItems'));

    }

    public function orders()
    {

    }

    public function edit()
    {
        $user = \Auth::user();

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME, 'url' => route('front.profile.index')],
            ['name' => 'Персональные данные', 'url' => null]
        ])->breadcrumbs;

        $menuItems = (new MenuHelper)->getProfileItems();

        return view('front.profile.edit', compact('user', 'breadcrumbs', 'menuItems'));

    }

    public function update(UserUpdateRequest $request)
    {


        dd(1);

    }
}
