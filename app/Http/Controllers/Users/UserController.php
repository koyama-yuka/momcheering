<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;


class UserController extends Controller
{
    
    /**
     * 
     * ログイン画面の表示
     * 
     * 
     * 
     */
    public function loginTop(){
        return view('auth.login');
    }
    
    /**
     * 
     * 新規登録画面の表示
     * 
     * 
     * 
     */
    public function register(){
        return view('auth.register');
    }
    
    /**
     * 
     * プロフィール表示
     * @param Request $request
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
     * @param Request $request
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
     * @param Request $request
     * 
     */
    public function profileUpdate(Request $request){
        
        $user = Auth::user();
        $display = Child::find($request['id']);
        
        
        //$this->validate($request, User::$rules);
        
        //バリデーション
        $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'current_password' => 'required',
            'relationship_id' => 'required',
            'notice_flag' => 'required',
            ]);
            
        
        //もしメールアドレスが新しいものだったら
        if($request->email != $user->email){
            $request->validate([
                'email' => 'unique:users',
                ]);
        }
        
        //現在のパスワードの確認
        if(!password_verify($request->current_password, $user->password)){
            return redirect('/user/edit?id='.$display->id);
        }
        
        //もし新しいパスワードの入力があったなら
        if(!empty($request->new_password)){
            $request->validate([
                    'new_password' => 'string|min:8|confirmed|different:current_password',
            ]);
            
            $user->password = bcrypt($request->new_password);
        }
        
        //保存
        $user->name = $request->user_name;
        $user->email = $request->email;
        $user->relationship_id = $request->relationship_id;
        $user->notice_flag = $request->notice_flag;
        
        $user->update();
        
        unset($request['_token']);
        
        return redirect('/user?id='.$display->id);
    }
    
    
    /**
     * 
     * ホーム画面の表示
     * @param Request $request
     * 
     * 
     */
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
