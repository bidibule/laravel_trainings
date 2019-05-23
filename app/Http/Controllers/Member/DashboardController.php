<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Training;
use App\Group;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         // Compliance for each user
         $users = User::all();
         $collection_users = collect();

         foreach ($users as $user) {
            $compliance = $user->getCompliance();
            
            $collection_users->push([
                'name' => $user->name,
                'id' => $user->id,
                'completion_percentage' => $compliance
            ]);            
           
         }

         $average_users = round($collection_users->avg('completion_percentage'), 2);
         $collection_users = $collection_users->sortByDesc('completion_percentage');
 
         //Compliance for each Group
         $groups = Group::with('users')->get();
         $g = $average_group = 0;
         $collection_groups = collect();
 
         foreach ($groups as $group) {
             
             $collection_groups->push([
                'name' => $group->name,
                'id' => $user->id,
                'completion_percentage' => $compliance
            ]); 
             $average = 0 ;
             foreach ($group->users as $user) {
                 $average += $user->getCompliance();
             }
             
             if($group->users()->count() > 0){
                 $data_groups[$g]['completion_percentage'] = round($average/$group->users()->count(),2);
                 $average_group += $data_groups[$g]['completion_percentage'];
             } 
             
             $g++;
         }
 
         $average_groups = round(($average_group / $g), 2);

         //ordering arrays
 
         return view('member.dashboard', [
             'data_users' => $collection_users->values()->toJson(),
             'average_completion_users' => $average_users,
             'data_groups' => json_encode($data_groups),
             'average_completion_groups' => $average_groups
         ]);
        
    }
}
