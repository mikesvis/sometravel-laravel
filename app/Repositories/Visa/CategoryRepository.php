<?php

namespace App\Repositories\Visa;

use App\Models\Visa\Category as Model;
use App\Repositories\CoreRepository;

class CategoryRepository extends CoreRepository
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
            'title',
            'menuname',
            'slug',
            'ordering',
            'status',
            'updated_at'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('ordering', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return $result;
    }

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
            ->first();

        return $result;
    }

}
?>
