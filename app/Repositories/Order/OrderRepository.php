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
     * Get all models with paginator
     * @param  int|mixed|null $perPage
     * @return \Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPagination($perPage = null)
    {
        $columns = [
            'id',
            'uuid',
            'visa_id',
            'user_id',
            'steps_completed',
            'status',
            'total',
            'order_params',
            'payment_method',
            'payment_params',
            'email_sent_at',
            'appliance_date',
            'delivery_date',
            'created_at',
            'updated_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->with(['visa', 'user'])
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

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
