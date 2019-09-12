<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{

    const ITEMS_PER_PAGE = 20;
    const TIMEZONE = "Europe/Moscow";

    public function __construct()
    {

    }

}
?>
