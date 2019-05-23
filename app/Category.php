<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function trainings(){
        return $this->hasMany(Training::class);
    }
}
