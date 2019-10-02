<?php

namespace App\Repositories\Image;

use App\Models\Image as Model;
use App\Repositories\CoreRepository;

class ImageRepository extends CoreRepository
{

    const DOCUMENTS_GALLERY_ID = 2;

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
     * Gets instance of the polymorph model by name & id
     *
     * @param string $model
     * @param int $id
     * @return Model
     */
    public function polymorphModel($modelName, $id)
    {
        $polymorphModel = app('App\Models\\'.$modelName)->withCount('images')->find($id);

        return $polymorphModel;
    }

    /**
     * Get models for select
     *
     * @return void
     */
    public function getDocumentsForSelect()
    {
        $columns = ['id', 'title'];
        $result = $this
            ->startConditions()
            ->where('status', 1)
            ->where('imagable_type', 'App\Models\Gallery')
            ->where('imagable_id', self::DOCUMENTS_GALLERY_ID)
            ->orderBy('ordering', 'asc')
            ->orderBy('id', 'asc')
            ->select($columns)
            ->toBase()
            ->get();
        return $result;
    }

}
?>
