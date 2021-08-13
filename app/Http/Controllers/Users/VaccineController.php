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
        
        
        $vaccines = Vaccine::all();
        
        return view('user.vaccine_index', ['display' => $display, 'vaccines' => $vaccines]);
    }
    
    
    
    //予防接種各種の詳細
    public function details(Request $request){
        
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->get();
         
        
        //日付順に並べる必要があるのでは？
        
        
        return view('user.vaccine_details', ['display' => $display, 'vaccine' => $vaccine, 'vaccine_histories' => $vaccineHistories,]);
    }
    
    
    //接種記録の編集
    public function edit(Request $request){
        
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->get();
        
        
        
        return view('user.vaccine_history_edit', ['display' => $display, 'vaccine' => $vaccine, 'vaccine_histories' => $vaccineHistories]);
    }
    
    
    //各予防接種の記録編集、更新
    public function update(Request $request){
        
        //入力のバリデーションは無理がある？2回目以降の入力はないときもあるし、添番号つけているのもあるし
        //保存するときに、日付と医療機関が揃っているものは保存可、の決め事のほうがいいかも
        
        dd($request);
        
        
        //ここで何個あるかわからないけど、ワクチンの記録は取得する必要があるのでは？
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->get();
            
            
            
            
            
            
        
        if(新規登録時 ){
            $history = new VaccineHistory;
            $form = $request->all();
            unset($form['_token']);
            
            
        } elseif(既存データがあるとき) {
            
            
            
        }
        
        
        return redirect('/vaccine/details');
    }
    
    
    
}
