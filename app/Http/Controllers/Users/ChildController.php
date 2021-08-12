<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;
use Carbon\Carbon;


class ChildController extends Controller
{
    
    //こどもの情報編集ページ表示
    public function edit(Request $request){
        $display = Child::find($request->id);
        
        return view('user.child_profile_edit',['child_form' => $display]);
    }
    
    
    //こどもの情報編集して更新
    public function update(Request $request){
        $this->validate($request, Child::$rules);
        
        $child_update = Child::find($request->id);
        $child_update->user_id = Auth::id();
        
        $form = $request->all();
        unset($form['_token']);
        
        $child_update->fill($form);
        $child_update->updated_at = Carbon::now();
        
        $child_update->save();
        
        
        //更新後の表示について
        
        //性別
        if($child_update->gender_id == 1){
            $child_update->gender_id = "男の子";
        }elseif($child_update->gender_id == 2){
            $child_update->gender_id = "女の子";
        }elseif($child_update->gender_id == 3){
            $child_update->gender_id = "その他";
        }
        
        //血液型
        if($child_update->blood_type_id == 1){
            $child_update->blood_type_id = "A型";
        }elseif($child_update->blood_type_id == 2){
            $child_update->blood_type_id = "B型";
        }elseif($child_update->blood_type_id == 3){
            $child_update->blood_type_id = "O型";
        }elseif($child_update->blood_type_id == 4){
            $child_update->blood_type_id = "AB型";
        }elseif($child_update->blood_type_id == 5){
            $child_update->blood_type_id = "不明";
        }
        
        //Rh
        if($child_update->blood_rh_id == 1){
            $child_update->blood_rh_id = "＋";
        }elseif($child_update->blood_rh_id == 2){
            $child_update->blood_rh_id = "－";
        }elseif($child_update->blood_rh_id == 3){
            $child_update->blood_rh_id = "不明";
        }
        
        
        return redirect('/child?id='.$child_update->id);
    }
    
    
    //こどもの詳細ページ
    public function index(Request $request){
        
        $form = $request['id'];
        $display = Child::find($form);
        
        //性別
        if($display->gender_id == 1){
            $display->gender_id = "男の子";
        }elseif($display->gender_id == 2){
            $display->gender_id = "女の子";
        }elseif($display->gender_id == 3){
            $display->gender_id = "その他";
        }

        //血液型
        if($display->blood_type_id == 1){
            $display->blood_type_id = "A型";
        }elseif($display->blood_type_id == 2){
            $display->blood_type_id = "B型";
        }elseif($display->blood_type_id == 3){
            $display->blood_type_id = "O型";
        }elseif($display->blood_type_id == 4){
            $display->blood_type_id = "AB型";
        }elseif($display->blood_type_id == 5){
            $display->blood_type_id = "不明";
        }
        
        //Rh
        if($display->blood_rh_id == 1){
            $display->blood_rh_id = "＋";
        }elseif($display->blood_rh_id == 2){
            $display->blood_rh_id = "－";
        }elseif($display->blood_rh_id == 3){
            $display->blood_rh_id = "不明";
        }
        
        return view('user.child_profile', ['display'=>$display]);
    }
    
    //こどもの追加ページ表示
    public function add(){
        return view('user.child_add');
    }
    
    
    // ＋で追加のこども情報の登録
    public function addDone(Request $request){
        
        $this->validate($request, Child::$rules);
        
        
        $form = $request->all();
        unset($form['_token']);
        
        $child_data = new Child;
        $child_data->user_id = Auth::id();
        
        $child_data->fill($form);
        
        
        $child_data->save();
        
        return redirect('/home');
    }
    
    
    
    
    
    
}
