<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        // $head
        return view('back.dashboard');
    }
}
