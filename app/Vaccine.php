<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = 'm_vaccines'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    
    //ワクチンの接種記録と関連付け 不要？
    //public function vaccineHistories(){
    //    return $this->hasMany('App\VaccineHistory');
    //}
    
    
    //チェックと関連付け
    public function check(){
        return $this->hasMany('App\Check');
    }
    
    public function vaccineSchedule(){
        return $this->hasMany('App\VaccineSchedule');
    }
}
