<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;

class ChildController extends Controller
{
    public function edit(){
        return view('user.child_profile_edit');
    }
    
    public function index(){
        
        
        return view('user.child_profile');
    }
    
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
