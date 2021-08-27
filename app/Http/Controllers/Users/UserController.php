<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;


class UserController extends Controller
{
    
    //ログイン画面の表示
    public function loginTop(){
        return view('auth.login');
    }
    
    //新規登録画面の表示
    public function register(){
        return view('auth.register');
    }
    
    /**
     * 
     * プロフィール表示
     * 
     * 
     */
    public function userProfieIndex(Request $request){
        
        $display = Child::find($request['id']);
        $user = Auth::user();
        
        return view('user.user_profile', ['display' => $display, "user" => $user]);
    }
    
    
    /**
     * 
     * プロフィール編集画面
     * 
     * 
     */
    public function profileEdit(Request $request){
        
        $display = Child::find($request['id']);
        $user = Auth::user();
        
        return view('user.user_profile_edit', ['display' => $display, 'user' => $user]);
    }
    
    
    /**
     * 
     * プロフィールの更新
     * 
     * 
     */
    public function profileUpdate(Request $request){
        $display = Child::find($request['id']);
        $user = Auth::user();
        
        dd($request);
        
        
        
        return redirect('/user?id='.$display->id);
    }
    
    
    //ホーム画面の表示
    public function homeDisplay(Request $request){
    
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
