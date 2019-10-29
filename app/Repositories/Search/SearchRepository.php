<?php

namespace App\Repositories\Search;

use App\Models\Search as Model;
use App\Repositories\CoreRepository;

class SearchRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }


    /**
     * Get all models with paginator
     * @param  int|mixed|null $perPage
     * @return \Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPagination($searchPhrase = '', $perPage = null)
    {

        $searchArray = array_map('trim', explode(' ', $searchPhrase));

        $columns = [
            'id',
            'model',
            'route',
            'title',
            'slug',
            'excerpt',
            'content',
            'status',
            'score',
        ];


        $result = $this->startConditions()
            ->select($columns)
            ->where('status', 1);

        foreach ($searchArray as $word) {
            $result = $result->where(function ($query) use($word) {
                $query->where('title', 'like', '%'.$word.'%')
                      ->orWhere('content', 'like', '%'.$word.'%');
            });
        }

        $result = $result->orderBy('score', 'desc')
            ->paginate($perPage);

        return $result;
    }

}
?>
