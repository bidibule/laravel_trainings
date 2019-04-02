<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'name', 
        'effective_date',
        'status',
        'attachment'
    ];
}
