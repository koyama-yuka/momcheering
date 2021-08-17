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
        'vaccine_id' => 'required',
        'medical_flag' => 'required',
        'medical_id' => 'required',
        'start_time' => 'required',
        );
        
        
    public function vaccineSchedule(){
        return $this->hasMany('App\VaccineSchedule');
    }
        
}
