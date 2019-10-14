<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/**
 * Deal with ordering
 */
trait Orderable
{

    // protected $nodable = false;
    // protected $morphable = 'imagable_type';
    // protected $orderWithinAttribute = 'parent_id';

    public function getOrderingAttribute($value)
    {

        if($this->nodable) {
            $value = $this->where('parent_id', $this->parent_id)
                ->where('_lft', '<=', $this->_lft)
                ->count();
        }

        return $value;
    }

    public function setOrderingAttribute($value)
    {

        $this->attributes['ordering'] = $value;

        if(!$this->nodable) {

            if((int)$value == 0)
                $this->attributes['ordering'] = 1;

        }

    }

    public function dealWithOrder($ordering = null)
    {
        if((int)$ordering == 0)
            $ordering = 1;

        if($this->nodable){

            $insertBeforeNode = $this->where('parent_id', $this->parent_id ?? null)
                ->where('id', '<>', $this->id)
                ->defaultOrder()
                ->offset($ordering-1)
                ->first();

            if($insertBeforeNode)
                $this->insertBeforeNode($insertBeforeNode);
        }

        if(!$this->nodable) {


            \DB::statement(\DB::raw('set @counter = 0'));

            $saveNewOrder = \DB::table($this->table);

            if($this->morphable)
                $saveNewOrder = $saveNewOrder->where($this->morphable, $this->{$this->morphable});

            if($this->orderWithinAttribute)
                $saveNewOrder = $saveNewOrder->where($this->orderWithinAttribute, $this->{$this->orderWithinAttribute});

            $saveNewOrder = $saveNewOrder->orderBy('ordering', 'asc')
                ->orderBy('updated_at', 'desc')
                ->update(['ordering' => DB::raw("@counter := @counter + 1")]);

        }

    }
}

?>
