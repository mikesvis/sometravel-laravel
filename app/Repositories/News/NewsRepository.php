<?php

namespace App\Repositories\News;

use App\Models\News as Model;
use Illuminate\Support\Facades\DB;
use App\Repositories\CoreRepository;

class NewsRepository extends CoreRepository
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
     * Get all Galleryies with paginator
     * @param  int|mixed|null $perPage
     * @return \Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPagination($perPage = null)
    {
        $columns = [
            'id',
            'country',
            'title',
            'slug',
            'excerpt',
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

}
?>
