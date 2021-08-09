<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;
use App\VaccineHistory;
use App\Vaccine;

class VaccineController extends Controller
{
    //予防接種一覧画面
    public function index(Request $request){
        $display = Child::find($request->id);
        
        //親のこどもでないなら表示できないようにするルール
        if($display->user_id != Auth::id()){
            abort(404);
        }
        
        $vaccines = Vaccine::all();
        
        return view('user.vaccine_index', ['display' => $display, 'vaccines' => $vaccines]);
    }
    
    
    
    //予防接種各種の詳細
    public function details(Request $request){
        
        
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        //親のこどもでないなら表示できないようにするルール
        if($display->user_id != Auth::id()){
            abort(404);
        }
        
        
        return view('user.vaccine_details', ['display' => $display, 'vaccine' => $vaccine]);
    }
    
    public function edit(){
        return view('user.vaccine_history_edit');
    }
}
