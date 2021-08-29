<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 't_schedules'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'date' => 'required',
        'vaccine_flag' => 'required',
        'medical_flag' => 'required',
        'start_time' => 'required',
        );
        
        
    public function vaccineSchedule(){
        return $this->hasOne('App\VaccineSchedule');
    }
    
    
    //Medicalと関連付け
    public function medical(){
        return $this->hasOne('App\Medical', 'id', 'medical_id');
    }
}
