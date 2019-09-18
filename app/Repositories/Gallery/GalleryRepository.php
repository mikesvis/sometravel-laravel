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
            'parent_id',
            'title',
            'ordering',
            'created_at',
            'updated_at'
        ];
        // $result = $this->startConditions()
        //     ->select($columns)
        //     ->where('parent_id', '<>', 'NULL')
        //     ->leftJoin('galleries', 'galleries.parent_id', '=', 'galleries.id')
        //     ->with('parentRecursive')
        //     // ->withCount('images')
        //     // ->sortable(['created_at' => 'desc'])
        //     ->paginate($perPage);

        // // dd($result->all());
        $RESULT =

        return $result;
    }

    /**
     * Gets categories listing for select
     *
     * @return array categories
     */
    public function getForSelect()
    {
        $columns = ['id', DB::raw('CONCAT(id, ". ", title) as id_title')];

        // $result = DB::statement('WITH RECURSIVE category_path (id, title, parent_id) AS
        // (
        //   SELECT id, title, parent_id
        //     FROM galleries
        //     WHERE id = 10
        //   UNION ALL
        //   SELECT c.id, c.title, c.parent_id
        //     FROM category_path AS cp JOIN galleries AS c
        //       ON cp.parent_id = c.id
        // )
        // SELECT * FROM category_path');

        // dd($result);

        $result = $this
            ->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }

}
?>
