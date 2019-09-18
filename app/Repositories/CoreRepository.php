<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Repository to work with entities
 * Can return data
 * Can't create/update entities
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }
}
?>
