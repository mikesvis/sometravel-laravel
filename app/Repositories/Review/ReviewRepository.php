<?php

namespace App\Repositories\Review;

use App\Models\Review as Model;
use App\Repositories\CoreRepository;

class ReviewRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get model for editing by Id
     * @param  integer $id Id of record to be retrieved
     * @return Model
     */
    public function getForEditById($id)
    {
        $result = $this->startConditions()
            ->with('images')
            ->find($id);
        return $result;
    }

    /**
     * Get all models with paginator
     * @param  int|mixed|null $perPage
     * @return \Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPagination($perPage = null)
    {
        $columns = [
            'id',
            'name',
            'content',
            'date',
            'ordering',
            'status',
            'updated_at'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->withCount('images')
            ->orderBy('date', 'DESC')
            ->paginate($perPage);

        return $result;

    }

    /**
     * Get all models with paginator
     * @param  int $limit How many models to get
     * @return \Illuminate\Support\Collection
     */
    public function getRandomWithFirstImageForModule($limit = 3)
    {
        $columns = [
            'id',
            'country',
            'title',
            'slug',
            'excerpt',
            'date',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('status', 1)
            ->with('firstEnabledImage')
            ->orderBy('date', 'DESC')
            ->take($limit)
            ->get();

        return $result;

    }

}
?>
