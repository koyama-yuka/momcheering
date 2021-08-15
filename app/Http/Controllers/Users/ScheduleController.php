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
            
        
        
        return view('user.schedule_details', ['display' => $display, 'details' => $details]);
    }
}
