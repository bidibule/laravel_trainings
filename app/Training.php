<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Training extends Model
{
    protected $fillable = [
        'name', 
        'effective_date',
        'status',
        'attachment'
    ];

    // Defining default values for column fields
    protected $attributes = [
        'status' => 0,
        'attachment' => ''
    ];

    public function setEffectiveDateAttribute($input)
    {
        $this->attributes['effective_date'] = Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d');
    }

    public function getEffectiveDateAttribute($input)
    {
        return Carbon::createFromFormat('Y-m-d', $input)->format('d-m-Y');
    }   
}
