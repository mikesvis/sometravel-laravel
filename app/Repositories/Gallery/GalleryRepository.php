<?php

namespace App\Repositories\Gallery;

use App\Models\Gallery as Model;
use Illuminate\Support\Facades\DB;
use App\Repositories\CoreRepository;

class GalleryRepository extends CoreRepository
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
            // ->with('game')
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
            'title',
            'notes',
            'status',
            'created_at',
            'updated_at'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->withCount('images')
            ->orderBy('title')
            ->paginate($perPage);

        return $result;

    }

}
?>
