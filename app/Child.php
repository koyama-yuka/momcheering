<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 't_children'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'child_name' => 'required',
        'gender_id' => 'required',
        'birthday' => 'required',
        'blood_type_id' => 'required',
        'blood_rh_id' => 'required',
        'birth_weight' => 'required',
        'birth_height' => 'required',
        );

    public function getParentId($childId){
        $item = Child::find($childId);
        return $item;
    }

    public function getChildDataAll($childId){
        $data = Child::find($childId);
        return $data;
    }

}
