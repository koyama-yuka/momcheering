<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table = 'm_vaccines'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    
    //ここなのか・・・？historyのほうに入れるのか？？
    public function vaccine(){
        return $this->hasMany('App\VaccineHistory');
    }
}
