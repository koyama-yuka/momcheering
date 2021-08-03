<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    
    public function addDone(Request $request){
    
        $child_data = new Child;
        
        $child_data->user_id = Auth::id();
        
        
    }
    
    
}
