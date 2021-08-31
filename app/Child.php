<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 't_children'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    /**
     * 
     * バリデーション用ルール
     * 
     * 
     */
    public static $rules = array(
        'child_name' => 'required|string|max:255',
        'gender_id' => 'required|integer',
        'birthday' => 'required|date',
        'blood_type_id' => 'required|integer',
        'blood_rh_id' => 'required|integer',
        'birth_weight' => 'required|numeric',
        'birth_height' => 'required|numeric',
    );
    
    
    //ワクチンの接種記録と関連付け
    public function vaccineHistories(){
        return $this->hasMany('App\VaccineHistory');
    }
    
    public function checkC(){
        return $this->hasMany('App\Check');
    }
    
    public function schedule(){
        return $this->hasMany('App\Schedule');
    }
    
}
