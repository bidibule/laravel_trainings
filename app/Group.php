<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Group extends Model
{
    protected $fillable = [
        'name'
    ];

    // Useful to order Groups by default on each query
    protected static function boot()
    {
        parent::boot();
    
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name', 'asc');
        });
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function trainings(){
        return $this->belongsToMany(Training::class);
    }

    public function getTrainings($id){
        return self::with('trainings');
    }
}
