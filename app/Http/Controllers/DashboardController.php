<?php

namespace App\Http\Controllers;

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
        
        $groups = Group::wit()
        
        return view('dashboard');
    }
}
