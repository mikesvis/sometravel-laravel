<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{

    const ITEMS_PER_PAGE = 20;
    const TIMEZONE = "Europe/Moscow";

    const BREADCRUMBS_HOME = ['name' => 'Администрирование', 'url' => '/admin'];

    public $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = [
            self::BREADCRUMBS_HOME
        ];
    }

    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }

    public function setBreadcrumbs($breads = []){

        if(!empty($breads))
            $this->breadcrumbs = array_merge($this->breadcrumbs, $breads);

    }

}
?>
