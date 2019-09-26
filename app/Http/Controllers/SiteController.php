<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\News\NewsRepository;
use App\Repositories\Gallery\GalleryRepository;

class SiteController extends BaseController
{

    /**
     * @var GalleryRepository
     */
    private $galleryRepository;

    /**
     * @var NewsRepository
     */
    private $newsRepository;


    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->galleryRepository = app(GalleryRepository::class);
        $this->newsRepository = app(NewsRepository::class);
    }

    public function index()
    {

        $data = [];

        $data['sliders'] = [
            'mainSplash' => $this->galleryRepository->getForViewById($galleryId = 1)
        ];

        $data['news'] = $this->newsRepository->getWithFirstImageForModule($limit = 3);

        return view('front.mainpage', compact('data'));
    }
}
