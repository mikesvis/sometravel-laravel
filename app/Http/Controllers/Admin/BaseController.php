<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{

    const ITEMS_PER_PAGE = 20;

    public $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = [
            [
                'name' => 'Администрирование',
                'url' => route('admin.dashboard')
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
