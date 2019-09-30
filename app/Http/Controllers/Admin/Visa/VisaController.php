<?php

namespace App\Http\Controllers\Admin\Visa;

use App\Models\Visa\Visa;
use Illuminate\Http\Request;
use App\Repositories\Visa\VisaRepository;
use App\Http\Controllers\Admin\BaseController as AdminBaseController;

class VisaController extends AdminBaseController
{
    const NAME = 'Визы';

    /**
     * @var VisaRepository
     */
    private $visaRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->visaRepository = app(VisaRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->visaRepository->getAllWithPagination(self::ITEMS_PER_PAGE);

        $breadcrumbs = $this->setBreadcrumbs([['name' => self::NAME, 'url' => null]])->breadcrumbs;

        return view('back.visa.visa.index', compact('paginator', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function show(Visa $visa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function edit(Visa $visa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visa $visa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visa\Visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visa $visa)
    {
        //
    }
}
