<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;
use App\Vaccine;
use App\Schedule;


//マンスリーカレンダー表示
class ScheduleController extends Controller
{
    public function index(Request $request){
        
        $display = Child::find($request->id);
        
        
        return view('user.calendar_main', ['display' => $display]);
    }
    
    
    //日付詳細
    public function details(Request $request){
        
        $display = Child::find($request->id);
        
        $details = Schedule::where([
            ['child_id', $request['id']],
            ['date', $request['date']],
            ])->orderBy('date')->get();
            
        
        
        return view('user.schedule_details', ['display' => $display, 'details' => $details, "date" => $request['date']]);
    }
    
    
    //日付詳細の編集画面表示
    public function edit(Request $request){
        
        $display = Child::find($request['id']);
        
        $schedule = Schedule::where([
            ['child_id', $request['id']],
            ['date', $request['date']],
            ])->get();
        
        
        return view('user.schedule_details_edit', ['display' => $display, 'schedule' => $schedule, "date" => $request['date']]);
    }
    
    
    
    //スケジュールの登録と更新　コピって持ってきただけ↓　編集する
    public function update(Request $request){
        
        
        $display = Child::find($request['id']);
           
        dd($request); 
           
           
           
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
                    //$history->save();
                //}
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
                    //$history->save();
            }
            
            
        }
        
        
        
        //return redirect('/vaccine/details?id='.$request->id."&vaccine_id=".$request->vaccine_id);
    }
    
    
    
    
}
