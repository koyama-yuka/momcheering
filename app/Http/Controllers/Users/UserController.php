<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile_edit(){
        return view('user.profile.user_profile_edit');
    }
    
    public function login_top(){
        return view('auth.login');
    }
    
    public function register(){
        return view('auth.register');
    }
    
    public function home_display(){
        return view('home.home');
    }
    
}
