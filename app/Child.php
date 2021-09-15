<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //SoftDeleteを使用するために導入

class Child extends Model
{
    protected $table = 't_children'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    use SoftDeletes; //論理削除のために
    
    /**
     * 
     * バリデーション用ルール
     * 
     * 
     */
    public static $rules = array(
        'child_name' => 'required|string|max:255',
        'gender_id' => 'required|digits_between:1,3',
        'birthday' => 'required|date',
        'blood_type_id' => 'required|digits_between:1,5',
        'blood_rh_id' => 'required|digits_between:1,3',
        'birth_weight' => 'required|numeric',
        'birth_height' => 'required|numeric',
        'allergy' => 'nullable|string|max:255',
        'sick' => 'nullable|string|max:255',
        'child_memo' => 'nullable|string|max:255',
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
