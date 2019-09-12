<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        return view('back.dashboard');
    }
}
