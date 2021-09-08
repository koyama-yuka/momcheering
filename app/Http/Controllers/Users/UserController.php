<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;
use App\Schedule;


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
        
        $user = Auth::user();
        
        return view('user.user_profile', ["user" => $user]);
    }
    
    
    /**
     * 
     * プロフィール編集画面
     * @param Request $request
     * 
     */
    public function profileEdit(Request $request){
        
        $user = Auth::user();
        
        return view('user.user_profile_edit', ['user' => $user]);
    }
    
    
    /**
     * 
     * プロフィールの更新
     * @param Request $request
     * 
     */
    public function profileUpdate(Request $request){
        
        $user = Auth::user();
        
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
        //間違っていた際はエラーメッセージ表示で入力画面へ返す
        if(!password_verify($request->current_password, $user->password)){
            
            return back()->withInput()->withErrors(array('current_password' => 'パスワードが違います'));
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
        
        return redirect('/user');
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
        
        ////親のこどもでないなら表示できないようにするルール
        //SoftDeleteの場合はnullになっている
        if($display == null){
            abort(404);
        }
        if($display->user_id != Auth::id()){
            abort(404);
        }
        
        //今日の予定に関して
        $today = date("Y-m-d");
        $todaySchedule = Schedule::where([
            ['child_id', $display['id']],
            ['date', $today],
            ])->get();
            
        
        return view('user.home', ['display' => $display, 'todaySchedule' => $todaySchedule, "today" => $today] );
        }
    
}
