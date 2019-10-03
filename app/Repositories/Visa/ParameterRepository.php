<?php

namespace App\Repositories\Visa;

use App\Models\Visa\Parameter as Model;
use App\Repositories\CoreRepository;

class ParameterRepository extends CoreRepository
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

}
?>
