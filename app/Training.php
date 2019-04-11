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
        'attachment'
    ];

    // Defining default values for column fields
    protected $attributes = [
        'status' => 0,
        'attachment' => ''
    ];

    //Format effective date for input/ouput
    public function setEffectiveDateAttribute($input)
    {
        $this->attributes['effective_date'] = Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d');
    }

    public function getEffectiveDateAttribute($input)
    {
        return Carbon::createFromFormat('Y-m-d', $input)->format('d-m-Y');
    } 
    
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('status','completion_date')->orderBy('name','ASC');
    }

    public function groups(){
        return $this->belongsToMany(Group::class)->orderBy('name','ASC');
    }

    public function assignTrainings($group_ids){
        
        // On récupère les users par rapport aux groupes choisis
        $user_ids = User::whereHas('groups', function($query) use($group_ids){
            $query->whereIn('group_id',$group_ids);
        })->get();

        // On sycnhronise les tables Trainings-Users
        $this->users()->sync($user_ids);
       

    }

  /*  public function statusCount() {
        return $this->belongsToMany(User::class)
            ->selectRaw('count(training_user.status_id) as percentage_completed')
            ->groupBy('status');
    }*/
}
