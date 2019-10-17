<?php

namespace App\Models;

use App\Models\User;
use App\Models\UserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model implements UserInterface
{

    protected $fillable = [''];

    public $cabinet_link = '/admin/';
    /**
     * Relation to user
     *
     * @return relation
     */
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
    /**
     * Create administrator and bind it to user
     * @param mixed $attributes
     * @return User model?
     */
    public function create($attributes)
    {
        $result = null;
        DB::beginTransaction();
        try {
            $this->save();
            $result = $this->user()->create($attributes);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return $result;
    }

}
