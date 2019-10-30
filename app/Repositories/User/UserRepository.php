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
            \DB::raw('CONCAT(IFNULL(surname,""), " ", IFNULL(name,""), " ", IFNULL(patronymic, "")) as fio'),
            'name',
            'email',
            'phone',
            'userable_type',
            'updated_at',
            'created_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->withCount('orders')
            ->sortable('fio')
            ->paginate($perPage);

        return $result;

    }

}
?>
