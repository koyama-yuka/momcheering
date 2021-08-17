<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccineHistory extends Model
{
    protected $table = 't_vaccine_histories'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'check_id' => 'required',
        );
}
