<?php

namespace App\Repositories\Visa;

use App\Models\Visa\Value;
use App\Models\Visa\Visa as Model;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Builder;

class VisaRepository extends CoreRepository
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
     * Get all models with paginator
     * @param  int|mixed|null $perPage
     * @return \Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPagination($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'menuname',
            'slug',
            'base_price',
            'ordering',
            'status',
            'updated_at'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->withCount('images')
            ->with('categories')
            ->orderBy('ordering', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return $result;

    }

    /**
     * Get all models with paginator
     * @param  int|mixed|null $perPage
     * @return \Illuminate\Contacts\Pagination\LengthAwarePaginator
     */
    public function getWithFirstImageAndPagination($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'menuname',
            'slug',
            'excerpt',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('status', 1)
            ->with('firstEnabledImage')
            ->orderBy('ordering', 'ASC')
            ->orderBy('id', 'ASC')
            ->paginate($perPage);

        return $result;

    }

    /**
     * Get all models with paginator
     * @param  int $limit How many models to get
     * @return \Illuminate\Support\Collection
     */
    public function getWithFirstImageForModule($limit = 4, $exceptIds = [])
    {
        $columns = [
            'id',
            'title',
            'menuname',
            'slug',
            'excerpt',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('status', 1)
            ->whereNotIn('id', $exceptIds)
            ->with('firstEnabledImage')
            ->orderByRaw('RAND()')
            ->take($limit)
            ->get();

        return $result;

    }

    /**
     * Get all models with paginator
     * @param  int $limit How many models to get
     * @return \Illuminate\Support\Collection
     */
    public function getPopularWithFirstImageForModule($limit = 3)
    {
        $columns = [
            'id',
            'title',
            'menuname',
            'slug',
            'excerpt',
            'base_price',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('status', 1)
            ->where('is_popular', 1)
            ->with('firstEnabledImage')
            ->with('visaPageCalculatorParameters')
            ->with('visaPageCalculatorParameters.enabledValues')
            ->orderBy('updated_at', 'DESC')
            ->take($limit)
            ->get();

        return $result;

    }

    /**
     * Get model for view by slug
     * @param  string $slug Slug of record to be retrieved
     * @return Model
     */
    public function getForViewBySlug($slug)
    {
        $result = $this->startConditions()
            ->where('status', 1)
            ->where('slug', $slug)
            ->with('firstEnabledImage')
            ->with('visaPageCalculatorParameters')
            ->with('visaPageCalculatorParameters.enabledValues')
            ->first();

        return $result;
    }

    /**
     * Get model for calculation by id
     * @param  int $id
     * @return Model
     */
    public function getForCalculationWithParametersById($id, $parametersValues)
    {
        $result = $this->startConditions()
            ->where('status', 1);

        if(!empty($parametersValues)){
            $result = $result->with(['values' => function($query) use ($parametersValues) {
                $query->whereIn('values.id', $parametersValues);
            }]);
        }

        $result = $result->find($id);

        return $result;

    }

    /**
     * Get enabled model by id
     * @param  int $id
     * @return Model
     */
    public function getEnabledById($id)
    {

        $result = $this->startConditions()
            ->where('status', 1)
            ->find($id);

        return $result;

    }

}
?>
