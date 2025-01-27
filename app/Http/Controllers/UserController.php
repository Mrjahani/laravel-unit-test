<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users'=>$users] , 200);
    }


    public function show(User $user)
    {
        return view("users.show" , compact('user'));
    }
}
