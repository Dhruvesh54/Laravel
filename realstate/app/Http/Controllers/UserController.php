<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserDshboard(){
        return view('user.user_dashboard');
    }
    //
}
