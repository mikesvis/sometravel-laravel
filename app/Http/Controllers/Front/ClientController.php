<?php

namespace App\Http\Controllers\Front;

use App\Helpers\MenuHelper;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Http\Controllers\Front\BaseController as FrontBaseController;
use App\Repositories\Order\OrderRepository;

class ClientController extends FrontBaseController
{

    const NAME = 'Личный кабинет';

    public function index()
    {

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        $menuItems = (new MenuHelper)->getProfileItems();

        $orders = \Auth::user()->getLastOrders()->take(3)->get();

        return view('front.profile.index', compact('orders', 'breadcrumbs', 'menuItems'));

    }

    public function orders()
    {
        $user = \Auth::user();

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME, 'url' => route('front.profile.index')],
            ['name' => 'Мои заказы', 'url' => null]
        ])->breadcrumbs;

        $orders['active'] = \Auth::user()->orders()->active()->orderBy('created_at', 'DESC')->take(12)->get();
        $orders['archive'] = \Auth::user()->orders()->archive()->orderBy('created_at', 'DESC')->take(12)->get();

        $menuItems = (new MenuHelper)->getProfileItems();

        return view('front.profile.order.index', compact('user', 'orders', 'breadcrumbs', 'menuItems'));
    }

    public function order($orderId)
    {
        $user = \Auth::user();

        $order = (new OrderRepository)->getValidById($orderId);

        if(empty($order)){
            abort(404);
        }

        if($order->user->isNot($user)){
            abort(403);
        }

        $breadcrumbs = $this->setBreadcrumbs([
            ['name' => self::NAME, 'url' => route('front.profile.index')],
            ['name' => 'Мои заказы', 'url' => route('front.profile.order.index')],
            ['name' => 'Информация по заказу', 'url' => null]
        ])->breadcrumbs;

        $menuItems = (new MenuHelper)->getProfileItems();

        return view('front.profile.order.show', compact('user', 'order', 'breadcrumbs', 'menuItems'));
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
