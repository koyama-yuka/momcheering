<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;
use App\VaccineHistory;
use App\Vaccine;
use App\Check;

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
            ])->orderBy('inoculation_date')->get();
         
        
        return view('user.vaccine_details', ['display' => $display, 'vaccine' => $vaccine, 'vaccine_histories' => $vaccineHistories,]);
    }
    
    
    //接種記録の編集画面表示
    public function edit(Request $request){
        
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->orderBy('inoculation_date')->get();
        
        
        $check = Check::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->get();
            
           
            
            if(empty($check[0])) {
                $done_check = 0;
            }else {
                $done_check = $check->done_check;
            }
            
        
        
        return view('user.vaccine_history_edit', ['display' => $display, 'vaccine' => $vaccine, 'vaccine_histories' => $vaccineHistories, 'done_check' => $done_check,]);
    }
    
    
    //各予防接種の記録編集、更新
    public function update(Request $request){
        
        /*
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->orderBy('inoculation_date')->get();
            
        */
        
        

        //最高４回接種
        for($i = 1; $i <= 4; $i++){
            //新規保存
            if($request['insert_flag'.$i] == 1){
                
                
                //何も入力がなければ飛ばして次へ
                if($request['inoculation_date'.$i] == null && $request['hospital'.$i] == null && $request['vaccine_memo'.$i] == null ){
                    continue;    
                }
                    
                $history = new VaccineHistory;
                    
                $history->child_id = $request->id;
                $history->vaccine_id = $request->vaccine_id;
                $history->inoculation_date = $request['inoculation_date'.$i];
                $history->hospital = $request['hospital'.$i];
                $history->vaccine_memo = $request['vaccine_memo'.$i];
                
                $history->save();
            
            }
            
            //更新保存
            if($request['update_flag'.$i] == 1){
                
                $update_history_id = $request['update_history'.$i];
                $history = VaccineHistory::find($update_history_id);
                
                $history->child_id = $request->id;
                $history->vaccine_id = $request->vaccine_id;
                $history->inoculation_date = $request['inoculation_date'.$i];
                $history->hospital = $request['hospital'.$i];
                $history->vaccine_memo = $request['vaccine_memo'.$i];
                
                $history->save();
            }
            
            
        }
        
        
        //完了チェックについて
        if(empty($request->done_check)) {
            $done_check = 0;
        }else {
            $done_check = $request->done_check;
        }
        
        
        $check = Check::where([
        ['child_id', $request['id']],
        ['vaccine_id', $request['vaccine_id']],
        ])->get();
        
        //もしテーブルがなければ追加するし、もしテーブルあったら０か１かで更新する
        
        if(empty($check[0])){
            $check = new Check;
            $check->child_id = $request->id;
            $check->vaccine_id = $request->vaccine_id;
            $check->done_check = $done_check;
            
            $check->save();
            
        } else {
            $check->done_check = $done_check;
            
            $check->save();
        }
        
        
        return redirect('/vaccine/details?id='.$request->id."&vaccine_id=".$request->vaccine_id);
    }
    
    
    
}
