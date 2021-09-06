<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //SoftDeleteを使用するために導入

class Vaccine extends Model
{
    protected $table = 'm_vaccines'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    
    //ワクチンの接種記録と関連付け
    public function vaccineHistories(){
        return $this->hasMany('App\VaccineHistory');
    }
    
    
    //チェックと関連付け
    public function checkV(){
        return $this->hasMany('App\Check');
    }
    
}
