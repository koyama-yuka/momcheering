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
    /**
     * 
     * マンスリーカレンダー表示
     * @param Request $request
     * 
     */
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
    
    /**
     * 
     * 日付詳細　日付クリック時
     * @param Request $request
     * 
     */
    public function day(Request $request){
        
        $display = Child::find($request->id);
        
        $daySchedules = Schedule::where([
                ['child_id', $request['id']],
                ['date', $request['date']],
                ])->orderBy('date')->get();
                
        //マスターテーブル
        $vaccines = Vaccine::all();
        //dd($daySchedules[0]->vaccineSchedule);
        //各スケジュールに対しての予防接種の種類と健診の種類はviewで取る モデルの中に書いている紐付け使う
        
        return view('user.day', ['display' => $display, 'daySchedules' => $daySchedules, "date" => $request['date'], "vaccines" => $vaccines]);
    }
    
    /**
     * 
     * 新規作成画面
     * @param Request $request
     * 
     */
    public function add(Request $request){
        
        $display = Child::find($request->id);
        $date = $request['date'];
        
        //マスターテーブル
        $vaccines = Vaccine::all();
        $medicals = Medical::all();
        
        return view('user.schedule_add', ['display' => $display, 'date' => $date, 'vaccines' => $vaccines, 'medicals' => $medicals]);
    }
    
    
    /**
     * 
     * 新規登録
     * @param Request $request
     * 
     */
    public function addDone(Request $request){
        
        //バリデーション
        $this->validate($request, Schedule::$rules);
        $this->validate($request,VaccineSchedule::$rules);
        
        $display = Child::find($request->id);
        
        if(!empty($request->vaccine_id)){
            $vaccine_array = $request->vaccine_id;
            
            if(count($vaccine_array) == 1){
                $vaccine_str = $vaccine_array[0];
            }else {
                $vaccine_str = implode(",", $vaccine_array);
            }
        } else{
            $vaccine_str = null;
        }
        
        unset($request['_token']);
        
        //スケジュールの保存
        $schedule = new Schedule;
        
        $schedule->child_id = $request->id;
        $schedule['date']= $request['date'];
        $schedule->vaccine_flag = $request->vaccine_flag;
        $schedule->medical_flag = $request->medical_flag;
        $schedule->medical_id = $request->medical_kind;
        $schedule->start_time = $request->start_time;
        $schedule->schedule_memo = $request->schedule_memo;
        
        $schedule->save();
        
        //予防接種の種類を保存
        $schedule_id = $schedule->id;
        $vaccine_schedule = new VaccineSchedule;
        
        $vaccine_schedule->schedule_id = $schedule_id;
        $vaccine_schedule->vaccine_id = $vaccine_str;
        
        $vaccine_schedule->save();
        
        
        
        return redirect('/calendar/details?id='.$request->id."&schedule_id=".$schedule_id);
    }
    
    
    /**
     * 
     * 予定詳細　各予定クリック時、新規保存後のリダイレクト
     * @param Request $request
     * 
     */
    public function details(Request $request){
        
        $display = Child::find($request->id);
        $schedule = Schedule::find($request['schedule_id']);
        
        //予定詳細でこどものボタンを押されたとき用、同じ日付の詳細へ飛ばす
        if($schedule->child_id != $display->id){
            return redirect('/calendar/day?id='.$display->id."&date=".$schedule['date']);
        }
        
        //予防接種の予定の情報を取ってきて、配列にする
        $vaccine_kind = $schedule->vaccineSchedule->vaccine_id;
        $vaccine_kind = explode(",", $vaccine_kind);
        
        //マスターテーブルのデータ
        $vaccines = Vaccine::all();
        
        return view('user.schedule_details', ['display' => $display, 'schedule' => $schedule, 'vaccine_kind' => $vaccine_kind, 'vaccines' => $vaccines]);
    }
    
    
    /**
     * 
     * 予定詳細の編集画面表示
     * @param Request $request
     * 
     */
    public function edit(Request $request){
        
        $display = Child::find($request['id']);
        $schedule = Schedule::find($request['schedule_id']);
        
        //予定編集画面でこどものボタンを押されたとき用、404エラーで
        if($display->id != $schedule->child_id){
            abort(404);
        }
        
        //マスターテーブル
        $vaccines = Vaccine::all();
        $medicals = Medical::all();
        
        //この予定のワクチンと健診の情報
        $vac_array = $schedule->vaccineSchedule;
        $vac_array = $vac_array->vaccine_id;
        $vac_arr = explode(",", $vac_array);
        
        $med = $schedule->medical;
        
        
        return view('user.schedule_details_edit', ['display' => $display, 'schedule' => $schedule, 'vaccines' => $vaccines, 'medicals' => $medicals, 'vac_arr' => $vac_arr, 'med' => $med]);
    }
    
    
    /**
     * 
     * スケジュールの登録と更新
     * @param Request $request
     * 
     */
    public function update(Request $request){
        
        //バリデーション
        $this->validate($request, Schedule::$rules);
        $this->validate($request, VaccineSchedule::$rules);
        
        $display = Child::find($request['id']);
        $update_schedule = Schedule::find($request['schedule_id']);
        
        //更新する予定と、その予定のこどもが一致することを確認する →→→ここ後で考える？、一旦404エラー
        if($display->id != $update_schedule->child_id){
            abort(404);
        }
        
        
        $vaccine_str = 0;
        
        //スケジュールの更新
        $update_schedule['date'] = $request['date'];
        $update_schedule->vaccine_flag = $request->vaccine_flag;
        $update_schedule->medical_flag = $request->medical_flag;
        $update_schedule->medical_id = $request->medical_kind;
        if($update_schedule->medical_flag == 0){
            $update_schedule->medical_id = null;
        }
        $update_schedule->start_time = $request->start_time;
        $update_schedule->schedule_memo = $request->schedule_memo;
        
        $update_schedule->update();
        
        
        //予防接種の種類を保存、更新
        $schedule_id = $update_schedule->id;
        $vaccine_schedule = VaccineSchedule::find($schedule_id);
        
        if($update_schedule->vaccine_flag == 0){
            $vaccine_str = null;
        }else {
            $vaccine_str = $request->vaccine_id;
            if(count($vaccine_str) == 1){
                $vaccine_str = $vaccine_str[0];
            }else {
                $vaccine_str = implode(",", $vaccine_str);
            }
        }
        
        $vaccine_schedule->vaccine_id = $vaccine_str;
        $vaccine_schedule->update();
        
        unset($request['_token']);
        
        return redirect('/calendar/details?id='.$request->id."&schedule_id=".$request['schedule_id']);
    }
    
    
    /**
     * 
     * スケジュールの削除
     * @param Request $request
     * 
     */
    public function detailDelete(Request $request){
        
        $display = Child::find($request['id']);
        $delete_schedule = Schedule::find($request['schedule_id']);
        
        $delete_schedule_id = $delete_schedule->id;
        $redirect_day = $delete_schedule['date'];
        
        //一応そのスケジュールのこどもがあっているか確認？ →→→ここ後で考える？、一旦404エラー
        if($display->id != $delete_schedule->child_id){
            abort(404);
        }
        
        Schedule::where('id', $delete_schedule_id)->delete();
        VaccineSchedule::where('id', $delete_schedule_id)->delete();
        
        unset($request['_token']);
        
        //同じ日の詳細へリダイレクトする
        return redirect('/calendar/day?id='.$display->id."&date=".$redirect_day);
        
    }
    
    
    
    
    
}
