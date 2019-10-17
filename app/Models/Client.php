<?php

namespace App\Models;

use App\Models\User;
use App\Models\UserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements UserInterface
{

    protected $fillable = [
        'birthday',
        'subscribe',
    ];

    public $cabinet_link = '/profile';
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
     * Create gamer and bind it to user
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

    public function setBirthdayAttribute($value)
    {

        $this->attributes['birthday'] = $value;

        if(!empty($value))
            $this->attributes['birthday'] = \Carbon\Carbon::createFromFormat('d.m.Y', $value)->format("Y-m-d");

    }

}
