<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;
use App\Vaccine;
use App\Schedule;
use App\VaccineSchedule;


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
    
    
    
    //スケジュールの登録と更新
    public function update(Request $request){
        
        
        $display = Child::find($request['id']);
        $vaccine_kind = $request->vaccine_kind;
        
        
        //新規保存
        if($request['insert_flag'] == 1){
            
            $schedule = new Schedule;
                    
            $schedule->child_id = $request->id;
            $schedule['date']= $request['date'];
            $schedule->vaccine_flag = $request->vaccine_flag;
            $schedule->medical_flag = $request->medical_flag;
            $schedule->medical_id = $request->medical_kind;
            $schedule->start_time = $request->start_time;
            $schedule->schedule_memo = $request->schedule_memo;
            
            $schedule->save();
            
            //予防接種の種類分の保存
            $schedule_id = $schedule->id;
            $vaccine_schedule = new VaccineSchedule;
            
            $vaccine_schedule->schedule_id = $schedule_id;
            $vaccine_schedule->vaccine_id = $vaccine_kind;
            
            $vaccine_schedule->save();
            
            
        }
        
        
        //更新保存
        if($request['update_flag'] == 1){
            
            $update_schedule_id = $request->update_schedule;
            
            $schedule = Schedule::find($update_schedule_id);
            //こどものIDはいらない？該当するこどもの予定を変更するのだから・・・
            //$schedule->child_id = $request->id;
            $schedule->vaccine_flag = $request->vaccine_flag;
            $schedule->medical_flag = $request->medical_flag;
            $schedule->medical_id = $request->medical_kind;
            $schedule->start_time = $request->start_time;
            $schedule->schedule_memo = $request->schedule_memo;
            
            $schedule->update();
            
            
            //予防接種の種類分の保存、更新
            
        }
        
        
        
        
        
        
        return redirect('/calendar/details?id='.$request->id."&date=".$request['date']);
    }
    
    
    
    
}
