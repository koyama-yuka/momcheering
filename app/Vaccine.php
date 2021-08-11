<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = 'm_vaccines'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    
    //ワクチンの接種記録と関連付け？
    public function vaccineHistories(){
        return $this->hasMany('App\VaccineHistory');
    }
}
