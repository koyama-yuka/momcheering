<?php

namespace App\Http\Controllers\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入
use App\Child;
use App\User;
use App\Schedule;

class CalendarController extends Controller
{
    /**
     * カレンダー表示画面
     * 
     * @param Request &request
     */
    public function index(Request $request){
        $childId = $request['id'];
        return view('user.calendar',['id'=>$childId]);
    }

    /**
     * 予定詳細画面
     * 
     * @param Request &request
     */
    public function detail(Request $request){
        $schedule = new Schedule;
        $weekArry = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];
        $childId = $request['id'];
        $date = $request['date'];
        $dateFormart = date('Y/m/d', strtotime($date));
        $week = $weekArry[date('w',strtotime($date))];
        $scheduleDatas = $schedule->getScheduleDatasByDate($childId, $dateFormart);
        $scheduleEmptyFlg = 0;
        if(empty($scheduleDatas[0])){
            $scheduleEmptyFlg = 1;
        }
        // echo $scheduleData[0]['date'];
        return view('user.calendar_detail',
                    ['id' => $childId,
                     'date' => $dateFormart,
                     'week' => $week,
                     'scheduleDatas' => $scheduleDatas,
                     'scheduleEmptyFlg' => $scheduleEmptyFlg
                    ]
                );
    }
}
?>