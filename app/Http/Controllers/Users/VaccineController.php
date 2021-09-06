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
    /**
     * 
     * 予防接種一覧画面
     * @param Request $request
     * 
     * 
     */
    public function index(Request $request){
        
        //もし$requestのidがなかったときは最初の子どもの予防接種一覧へ
        if(empty($request['id'])){
            $users_child = Auth::user()->children;
            $id = $users_child[0]->id;
            
            return redirect('/vaccine?id='.$id);
        }
        
        $display = Child::find($request->id);
        
        //親のこどもでないなら表示できないようにするルール
        //SoftDeleteの場合はnullになっている
        if($display == null){
            abort(404);
        }
        if($display->user_id != Auth::id()){
            abort(404);
        }
        
        //マスターテーブルの情報取得
        $vaccines = Vaccine::all();
        
        //完了チェックの情報取得
        $checkStatus = $display->checkC;
        //完了になった予防接種のIDを配列で取得する
        $check_vaccineNumber = array();
        foreach($checkStatus as $arr){
            array_push($check_vaccineNumber, $arr->vaccine_id);
        }
        
        return view('user.vaccine_index', ['display' => $display, 'vaccines' => $vaccines, 'check_vaccineNumber'=>$check_vaccineNumber]);
    }
    
    
    /**
     * 
     * 予防接種各種の詳細
     * @param Request $request
     * 
     */
    public function details(Request $request){
        
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->orderBy('inoculation_date')->get();
         
        
        return view('user.vaccine_details', ['display' => $display, 'vaccine' => $vaccine, 'vaccine_histories' => $vaccineHistories,]);
    }
    
    /**
     * 
     * 接種記録の編集画面表示
     * @param Request $request
     * 
     */
    public function edit(Request $request){
        
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->orderBy('inoculation_date')->get();
        
        //完了チェック
        $check = Check::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->first();
            
           
            
            if(empty($check)) {
                $done_check = 0;
            }else {
                $done_check = $check->done_check;
            }
            
        
        
        return view('user.vaccine_history_edit', ['display' => $display, 'vaccine' => $vaccine, 'vaccine_histories' => $vaccineHistories, 'done_check' => $done_check,]);
    }
    
    /**
     * 
     * 各予防接種の記録　登録、編集、更新
     * @param Request $request
     * 
     * 
     */
    public function update(Request $request){
        
        /*
        $display = Child::find($request['id']);
        $vaccine = Vaccine::find($request['vaccine_id']);
        
        
        $vaccineHistories = VaccineHistory::where([
            ['child_id', $request['id']],
            ['vaccine_id', $request['vaccine_id']],
            ])->orderBy('inoculation_date')->get();
            
        */
        
        //バリデーション
        $this->validate($request, VaccineHistory::$rules);
        $this->validate($request, Check::$rules);

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
                
                $history->update();
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
        ])->first();
        
        
        //もしテーブルがなければ追加するし、テーブルあったらdone_checkカラムを０か１かで更新する
        
        if(empty($check)){
            $check = new Check;
            $check->child_id = $request->id;
            $check->vaccine_id = $request->vaccine_id;
            $check->done_check = $done_check;
            
            $check->save();
            
        } else {
            $check->done_check = $done_check;
            
            $check->update();
        }
        
        
        unset($request['_token']);
        
        return redirect('/vaccine/details?id='.$request->id."&vaccine_id=".$request->vaccine_id);
    }
    
    
    
}
