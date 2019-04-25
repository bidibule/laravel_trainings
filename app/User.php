<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups(){
        return $this->belongsToMany(Group::class)->withTimestamps()->orderBy('name','ASC');
    }

    public function trainings(){
        return $this->belongsToMany(Training::class)->withTimestamps()->withPivot('status','completion_date')->orderBy('name','ASC');
    }

    public function syncTrainingsByGroups($groups_ids){
               
        // On récupère les trainings par rapport aux groupes choisis
        $trainings_ids = Training::whereHas('groups', function($query) use($groups_ids){
            $query->whereIn('group_id',$groups_ids);
        })->get();

        // On sycnhronise les tables Trainings-Users
        $this->trainings()->sync($trainings_ids);
       
    }

    /**
     * Return the Compliance percentage for the trainings
     */
    public function getCompliance(){

        $total_trainings = $this->trainings()->count();
        $completed_trainings = $this->trainings()->wherePivot('status', 1)->count();

        return ($total_trainings <= 0)  ? 0 : round(($completed_trainings/$total_trainings)*100,2);
    }

    

    public function role($role) {
        $role = (array)$role;
        return in_array($this->role, $role);
    }

   
}
