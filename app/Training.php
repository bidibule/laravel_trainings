<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use App\User;

class Training extends Model
{
    protected $fillable = [
        'name', 
        'effective_date',
        'status',
        'path'
    ];

    // Defining default values for column fields
    protected $attributes = [
        'status' => 0,
        'path' => ''
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('status','completion_date')->orderBy('name','ASC');
    }

    public function groups(){
        return $this->belongsToMany(Group::class)->orderBy('name','ASC');
    }

    //Format effective date for input/ouput
    public function setEffectiveDateAttribute($input)
    {
        $this->attributes['effective_date'] = Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d');
    }

    public function getEffectiveDateAttribute($input)
    {
        return Carbon::createFromFormat('Y-m-d', $input)->format('d-m-Y');
    } 

    /**
     * Assign trainings and Users
     */
    public function assignTrainings($group_ids){
        
        // On récupère les users par rapport aux groupes choisis
        $user_ids = User::whereHas('groups', function($query) use($group_ids){
            $query->whereIn('group_id',$group_ids);
        })->get();

        // On sycnhronise les tables Trainings-Users
        $this->users()->sync($user_ids);
       

    }

 
}
