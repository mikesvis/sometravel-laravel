<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{

    const BREADCRUMBS_HOME = ['name' => 'Главная', 'url' => '/'];

    public function __construct()
    {

    }
}
