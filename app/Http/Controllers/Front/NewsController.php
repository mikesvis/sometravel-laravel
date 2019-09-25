<?php

namespace App\Http\Controllers\Front;

use App\Models\News;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class NewsController extends FrontBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
        dd(__METHOD__);
        // dd($news);
    }
}
