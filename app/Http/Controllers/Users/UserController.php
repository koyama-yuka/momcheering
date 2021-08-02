<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Child;
use App\User;


class UserController extends Controller
{
    public function loginTop(){  //ログイン画面の表示
        return view('auth.login');
    }
    
    public function register(){ //新規登録画面の表示
        return view('auth.register');
    }
    
    
    
    public function profileEdit(){
        return view('user.user_profile_edit');
    }
    
    public function userProfieIndex(){
        return view('user.user_profile');
    }
    
    
    
    
    
    public function homeDisplay(){
        return view('user.home');
    }
    
}
