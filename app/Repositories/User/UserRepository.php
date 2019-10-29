<?php

namespace App\Repositories\User;

use App\Models\User as Model;
use App\Repositories\CoreRepository;

class UserRepository extends CoreRepository
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
            'surname',
            'name',
            'patronymic',
            'email',
            'phone',
            'updated_at',
            'created_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('surname', 'asc')
            ->orderBy('name', 'asc')
            ->orderBy('patronymic', 'asc')
            ->paginate($perPage);

        return $result;

    }

}
?>
