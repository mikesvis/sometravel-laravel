<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class FilesController extends AdminBaseController
{
    public function index(){

        $breadcrumbs = $this->setBreadcrumbs([['name'=>'Файловый менеджер', 'url'=>null]])->breadcrumbs;

        return view('back.files.index', compact('breadcrumbs'));

    }
}
