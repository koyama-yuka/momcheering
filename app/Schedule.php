<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //SoftDeleteを使用するために導入

class Schedule extends Model
{
    protected $table = 't_schedules'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'date' => 'required|date',
        'vaccine_flag' => 'required|digits_between:0,1',
        'medical_flag' => 'required|digits_between:0,1',
        'medical_id' => 'nullable|digits_between:1,12',
        'start_time' => 'required|date_format:H:i',
        'schedule_memo' => 'nullable|string|max:255',
        );
        
        
    public function vaccineSchedule(){
        return $this->hasOne('App\VaccineSchedule');
    }
    
    
    //Medicalと関連付け
    public function medical(){
        return $this->hasOne('App\Medical', 'id', 'medical_id');
    }
}
