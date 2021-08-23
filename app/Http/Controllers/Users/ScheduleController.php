<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;
use App\Vaccine;
use App\Schedule;
use App\Medical;
use App\VaccineSchedule;




class ScheduleController extends Controller
{
    
    //マンスリーカレンダー表示
    public function index(Request $request){
        
        $display = Child::find($request->id);
        
        //今日の日付取得
        $today = date("Y-m-d");
        
        //前月と翌月
        $lastMonth = date('Y-m-d', strtotime($today." -1 month"));
        $nextMonth = date('Y-m-d', strtotime($today." +1 month"));
        
        //前月と翌月の間のスケジュールを取得
        $schedules = Schedule::where('child_id',$request['id'])
                            ->whereBetween('date',[$lastMonth, $nextMonth])
                            ->get();
                            
                            
        return view('user.calendar_main', ['display' => $display, "schedules" => $schedules]);
    }
    
    
    //日付詳細　日付クリック時
    public function day(Request $request){
        
        $display = Child::find($request->id);
        
        $daySchedules = Schedule::where([
                ['child_id', $request['id']],
                ['date', $request['date']],
                ])->orderBy('date')->get();
        
        //dd($daySchedules[0]->vaccineSchedule);
        //各スケジュールに対しての予防接種の種類はviewで取る モデルの中に書いている紐付け使う
        
        return view('user.day', ['display' => $display, 'daySchedules' => $daySchedules, "date" => $request['date']]);
    }
    
    
    //新規作成画面
    public function add(Request $request){
        
        $display = Child::find($request->id);
        
        
        
        
        return view('user.schedule_add', ['display' => $display, ]);
    }
    
    
    
    //新規登録
    public function addDone(Request $request){
        
        $display = Child::find($request->id);
        $vaccine_kind = $request->vaccine_kind;
            
            $schedule = new Schedule;
                    
            $schedule->child_id = $request->id;
            $schedule['date']= $request->schedule_date;
            $schedule->vaccine_flag = $request->vaccine_flag;
            $schedule->medical_flag = $request->medical_flag;
            $schedule->medical_id = $request->medical_kind;
            $schedule->start_time = $request->start_time;
            $schedule->schedule_memo = $request->schedule_memo;
            
            dd($schedule);
            $schedule->save();
            
            //予防接種の種類分の保存
            $schedule_id = $schedule->id;
            $vaccine_schedule = new VaccineSchedule;
            
            $vaccine_schedule->schedule_id = $schedule_id;
            $vaccine_schedule->vaccine_id = $vaccine_kind;
            
            $vaccine_schedule->save();
        
        
        
        return redirect('user.schedule_details', ['display' => $display, 'details' => $schedule]);
    }
    
    
    
    //予定詳細　各予定クリック時
    public function details(Request $request){
        
        $display = Child::find($request->id);
        $schedule = Schedule::find($request['schedule_id']);
        
        return view('user.schedule_details', ['display' => $display, 'schedule' => $schedule]);
    }
    
    
    
    //予定詳細の編集画面表示
    public function edit(Request $request){
        
        $display = Child::find($request['id']);
        
        $schedule = Schedule::where('id',$request['schedule_id'])->first();
        
        
        return view('user.schedule_details_edit', ['display' => $display, 'schedule' => $schedule]);
    }
    
    
    
    //スケジュールの登録と更新
    public function update(Request $request){
        
        
        $display = Child::find($request['id']);
        $vaccine_kind = $request->vaccine_kind;
        
        
        //新規保存
        if($request['insert_flag'] == 1){
            
            $schedule = new Schedule;
                    
            $schedule->child_id = $request->id;
            $schedule['date']= $request->schedule_date;
            $schedule->vaccine_flag = $request->vaccine_flag;
            $schedule->medical_flag = $request->medical_flag;
            $schedule->medical_id = $request->medical_kind;
            $schedule->start_time = $request->start_time;
            $schedule->schedule_memo = $request->schedule_memo;
            
            dd($schedule);
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
