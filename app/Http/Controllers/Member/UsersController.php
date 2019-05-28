<?php
namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Validation\Rule;

use App\User;

class UsersController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function profile(){

        $user = User::findOrFail(auth()->user()->id);

        return view('member.profile',compact('user'));
    }
}
