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
        $isUserFlg = false;
        $requestChildId = $request['id'];
        $userId = Auth::id();
        $child = new Child;
        $isUserFlg = $this->isHaveChildId($requestChildId);
        $childRecord = $child->getParentId($requestChildId);
        $isUserId = $childRecord['user_id'];
//        $isUserFlg = $this->isUserId($userId,$isUserId);

        if($isUserFlg){
            $childName = $childRecord['child_name']; 
            return view('user.home', ['item'=>$childName] );    
        } 
        /** TODO エラーページに飛ばしたい */
//        return view('user.home', ['id'=>$form, 'item'=>$childName] );

    }

    public function isUserId($userId, $isUserId){
        if($userId === $isUserId){
            return true;
        } 
        return false;
    }

    public function isHaveChildId($childId){
        if(empty($childId)){
            return false;
        }
        return true;
    }

}
