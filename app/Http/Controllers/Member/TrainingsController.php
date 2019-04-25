<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;

class TrainingsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = User::findOrFail(auth()->id())->trainings()->orderBy('training_user.status','DESC')->get();


        return view('member.trainings.index', compact('trainings'));
    }

     /**
     * Display the specified resource with the users and completion status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){  
        $training = Training::find($id);

        return view('member.trainings.show',compact('training'));
    }
}
