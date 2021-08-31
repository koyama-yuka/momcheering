<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 't_schedules'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'date' => 'required|date',
        'vaccine_flag' => 'required|integer',
        'medical_flag' => 'required|integer',
        'medical_id' => 'nullable|integer',
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
