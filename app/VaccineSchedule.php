<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccineSchedule extends Model
{
    protected $table = 't_vaccine_schedules'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'vaccine_id' => 'nullable',
        );
    
    
    public function vaccine(){
        return $this->hasOne('App\Vaccine','id','vaccine_id');
    }
    
}
