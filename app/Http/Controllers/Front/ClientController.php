<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class ClientController extends FrontBaseController
{

    const NAME = 'Личный кабинет';

    public function index()
    {

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('front.profile.index', compact('breadcrumbs'));

    }
}
