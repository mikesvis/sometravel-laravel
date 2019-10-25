<?php

namespace App\Repositories\Order;

use App\Models\Order as Model;
use App\Repositories\CoreRepository;

class OrderRepository extends CoreRepository
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
     * Get model for viewing by Id
     * @param  integer $id Id of record to be retrieved
     * @return Model
     */
    public function getValidById($id)
    {
        $result = $this->startConditions()
            ->where('status', '>', 0)
            ->find($id);
        return $result;
    }

    public function getByUuid($uuid)
    {
        $result = $this->startConditions()
            ->where('uuid', $uuid)
            ->first();

        return $result;
    }

}
?>
