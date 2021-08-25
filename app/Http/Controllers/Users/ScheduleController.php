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
        //各スケジュールに対しての予防接種の種類と健診の種類はviewで取る モデルの中に書いている紐付け使う
        
        return view('user.day', ['display' => $display, 'daySchedules' => $daySchedules, "date" => $request['date']]);
    }
    
    
    //新規作成画面 TODO:8/25
    public function add(Request $request){
        
        $display = Child::find($request->id);
        
        
        
        
        return view('user.schedule_add', ['display' => $display, ]);
    }
    
    
    
    //新規登録 TODO:8/25
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
    
    
    
    //予定詳細の編集画面表示 TODO:8/25 jsの分をviewのやつ、ユキちゃんに聞く
    public function edit(Request $request){
        
        $display = Child::find($request['id']);
        
        $schedule = Schedule::find($request['schedule_id']);
        
        //マスターテーブル
        $vaccines = Vaccine::all();
        $medicals = Medical::all();
        
        //この予定のワクチンと健診の情報
        $vac_array =$schedule->vaccineSchedule;
        $vac_arr = array();
        foreach($vac_array as $v_id){
            array_push($vac_arr, $v_id->vaccine_id);
        }
        
        $med =$schedule->medical;
        
        return view('user.schedule_details_edit', ['display' => $display, 'schedule' => $schedule, 'vaccines' => $vaccines, 'medicals' => $medicals, 'vac_arr' => $vac_arr, 'med' => $med]);
    }
    
    
    
    //スケジュールの登録と更新
    public function update(Request $request){
        
        $display = Child::find($request['id']);
        $update_schedule = Schedule::find($request['schedule_id']);
        
        $update_schedule['date'] = $request['date'];
        $update_schedule->vaccine_flag = $request->vaccine_flag;
        $update_schedule->medical_flag = $request->medical_flag;
        $update_schedule->medical_id = $request->medical_kind;
        $update_schedule->start_time = $request->start_time;
        $update_schedule->schedule_memo = $request->schedule_memo;
            
        //$update_schedule->update();
            
            
        //予防接種の種類分の保存、更新
        $update_vaccine_schedule = VaccineSchedule::where('schedule_id',$request['schedule_id'])->get();
        
        //requestで送られてきた予防接種のID配列
        $request_vaccine_id = $request->vaccine_id;
        
        
        //レコード数の差分
        $difference = count($update_vaccine_schedule) - count($request_vaccine_id);
        
        if($difference == 0){
            //該当するt_vaccine_schedulesのレコード数とリクエストの数が一致するとき
            for($i = 0; $i < count($request_vaccine_id); $i++){
                $update_vaccine_schedule[$i]->vaccine_id = $request_vaccine_id[$i];
                if($update_vaccine_schedule[$i]->delete_flag != null){
                    $update_vaccine_schedule[$i]->delete_flag = null;
                }
                $update_vaccine_schedule[$i]->update();
            }
        }elseif ($difference < 0) {
            //t_vaccine_schedulesのレコード数のほうが少ないとき　新しいレコード追加して保存
            for($i = 1; $i <= abs($difference); $i++){
                $empty_array = new VaccineSchedule;
                $empty_array->schedule_id = $request['schedule_id'];
                
                $update_vaccine_schedule = array_merge($update_vaccine_schedule,$empty_array);
                dd($update_vaccine_schedule);
                $update_vaccine_schedule = array_values($update_vaccine_schedule);
            }
            
            for($i = 0; $i < count($request_vaccine_id); $i++){
                if($update_vaccine_schedule[$i] == []){
                    $update_vaccine_schedule[$i] = new VaccineSchedule;
                    $update_vaccine_schedule[$i]->schedule_id = $request['schedule_id'];
                    $update_vaccine_schedule[$i]->vaccine_id = $request_vaccine_id[$i];
                    $update_vaccine_schedule[$i]->save();
                } else {
                    $update_vaccine_schedule[$i]->vaccine_id = $request_vaccine_id[$i];
                    $update_vaccine_schedule[$i]->update();
                }
            }
        }elseif (0 < $difference) {
            //使わないt_vaccine_schedulesのレコードが存在するとき
            for($i = 0; $i < count($update_vaccine_schedule); $i++){
                if(empty($request_vaccine_id[$i])){
                    $update_vaccine_schedule[$i]->delete();
                    $update_vaccine_schedule[$i]->update();
                } else {
                    $update_vaccine_schedule[$i]->vaccine_id = $request_vaccine_id[$i];
                    $update_vaccine_schedule[$i]->update();
                }
            }
        }
        
        
        return redirect('/calendar/details?id='.$request->id."&schedule_id=".$request['schedule_id']);
    }
    
    
    
    
}
