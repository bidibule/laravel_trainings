<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name'
    ];

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
