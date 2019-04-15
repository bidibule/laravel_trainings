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
        return $this->belongsToMany(User::class)->orderBy('name','asc');
    }

    public function trainings(){
        return $this->belongsToMany(Training::class)->orderBy('name','asc');
    }

    public function syncUserAndTrainings($id){
               
        $users = User::whereHas('groups', function($q) use($id){$q->where('id',$id);})->get();

        $trainings = Training::whereHas('groups', function($query) use($id){
            $query->where('group_id',$id);
        })->get();

        foreach($trainings as $training){
            $training->users()->sync($users);
        }
    }

}
