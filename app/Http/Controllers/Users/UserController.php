<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

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
    
    
    
    
    
    public function homeDisplay(Request $request){ //ホーム画面の表示
    
        $id = $request['id'];
    
        if(empty($id)){
            $users_child = Auth::user()->children;
            $id = $users_child[0]->id;
            
            return redirect('/home?id='.$id);
        }
    
        $display = Child::find($id);
    
        //親のこどもでないなら表示できないようにするルール
        if($display->user_id != Auth::id()){
            abort(404);
        }
    
        return view('user.home', ['display'=>$display] );
        }
    
}
