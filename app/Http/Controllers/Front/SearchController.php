<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Repositories\Search\SearchRepository;
use App\Http\Controllers\Front\BaseController as FrontBaseController;

class SearchController extends FrontBaseController
{

    const MIN_SEARCH_LENGTH = 3;
    const ITEMS_PER_PAGE = 12;

    /**
     * @var SearchRepository
     */
    private $searchRepository;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->searchRepository = app(SearchRepository::class);
    }

    public function results(Request $request)
    {
        $searches = [];
        $searchWord = $request->input('search');
        $searchPhrase = $request->input('search');
        $searchError = null;
        $searchTitle = $request->input('search');

        $searchPhrase = preg_replace('!\s+!', ' ', trim($searchPhrase));

        if(mb_strlen($searchPhrase) < self::MIN_SEARCH_LENGTH){
            $searchError = 'Слишком короткий запрос для поиска. Мининальная длина запроса '.self::MIN_SEARCH_LENGTH.' символа.';
        } else {
            $searches = $this->searchRepository->getAllWithPagination($searchPhrase, self::ITEMS_PER_PAGE)->appends(['search' => $searchPhrase]);
        }

        $searchWord = $request->input('search');

        // return view('front.search.index', compact('searches', ['wwwoo' => $request->input('search')]));
        return view('front.search.index', compact('searchError', 'searchWord', 'searches'));
    }
}
