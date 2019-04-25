<?php

namespace App\Http\Controllers\Admin;
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

        $i = $average = 0;
        foreach ($users as $user) {
            $data_users[$i]['name'] = $user->name;
            $data_users[$i]['completion_percentage'] = $user->getCompliance();
            $average += $data_users[$i]['completion_percentage'];
            $i++;
        }

        $average_users = round(($average / $i), 2);

        //Compliance for each Group
        $groups = Group::with('users')->get();
        $g = $average_group = 0;

        foreach ($groups as $group) {
            $data_groups[$g]['name'] = $group->name;
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

        return view('admin.dashboard', [
            'data_users' => json_encode($data_users),
            'average_completion_users' => $average_users,
            'data_groups' => json_encode($data_groups),
            'average_completion_groups' => $average_groups
        ]);
    }
}
