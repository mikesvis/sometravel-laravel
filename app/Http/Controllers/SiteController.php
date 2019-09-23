<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class SiteController extends BaseController
{
    public function index()
    {

        $sliders = [
            'mainSplash' => Gallery::where('id', 1)->where('status', 1)->with('enabledImages')->first()
        ];

        return view('front.mainpage', compact('sliders'));
    }
}
