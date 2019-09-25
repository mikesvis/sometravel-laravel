<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{

    const ITEMS_PER_PAGE = 12;

    public $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = [
            [
                'name' => 'Главная',
                'url' => '/'
            ]
        ];
    }

    public function setBreadcrumbs($breads = []){

        if(!empty($breads))
            $this->breadcrumbs = array_merge($this->breadcrumbs, $breads);
        return $this;

    }

}
?>
