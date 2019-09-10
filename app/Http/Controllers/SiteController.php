<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class SiteController extends BaseController
{
    public function index()
    {
        return view('front.mainpage');
    }
}
