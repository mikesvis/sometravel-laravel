<?php

namespace App\Http\Controllers\Front;

use App\Helpers\MenuHelper;
use Illuminate\Support\Facades\Hash;
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

        $viewFile = 'front.profile.edit-client';

        if($user->isAdmin())
            $viewFile = 'front.profile.edit-admin';

        return view($viewFile, compact('user', 'breadcrumbs', 'menuItems'));

    }

    public function update(UserUpdateRequest $request)
    {

        $user = \Auth::user();

        $data = $request->all();

        if($data['password'] != null){
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        $user->userable->update($data);

        // $user->userable->touch();

        return redirect(route('front.profile.edit'))->with('success', 'Персональные данные обновлены');

    }
}
