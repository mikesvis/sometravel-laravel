<?php

namespace App\Repositories\Visa;

use App\Models\Visa\Visa as Model;
use App\Repositories\CoreRepository;

class VisaRepository extends CoreRepository
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
            // 'title',
            // 'menuname',
            // 'slug',
            'ordering',
            'status',
            'updated_at'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->withCount('images')
            ->orderBy('ordering', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return $result;

    }

    /**
     * Get all models with paginator
     * @param  int|mixed|null $perPage
     * @return \Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    // public function getWithFirstImageAndPagination($perPage = null)
    // {
    //     $columns = [
    //         'title',
    //         'slug',
    //         'excerpt',
    //         'date',
    //     ];

    //     $result = $this->startConditions()
    //         ->select($columns)
    //         ->where('status', 1)
    //         ->with('firstEnabledImage')
    //         ->orderBy('date', 'DESC')
    //         ->paginate($perPage);

    //     return $result;

    // }

    /**
     * Get all models with paginator
     * @param  int $limit How many models to get
     * @return \Illuminate\Support\Collection
     */
    // public function getWithFirstImageForModule($limit = 3, $exceptId = null)
    // {
    //     $columns = [
    //         'id',
    //         'country',
    //         'title',
    //         'slug',
    //         'excerpt',
    //         'date',
    //     ];

    //     $result = $this->startConditions()
    //         ->select($columns)
    //         ->where('status', 1)
    //         ->where('id', '<>', $exceptId)
    //         ->with('firstEnabledImage')
    //         ->orderBy('date', 'DESC')
    //         ->take($limit)
    //         ->get();

    //     return $result;

    // }

    /**
     * Get model for view by slug
     * @param  string $slug Slug of record to be retrieved
     * @return Model
     */
    public function getForViewBySlug($slug)
    {
        $result = $this->startConditions()
            ->where('status', 1)
            ->where('slug', $slug)
            ->with('firstEnabledImage')
            ->first();

        return $result;
    }

}
?>
