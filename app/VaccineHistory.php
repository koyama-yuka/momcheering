<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccineHistory extends Model
{
    protected $table = 't_vaccine_histories'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'child_id' => 'required',
        'vaccine_id' => 'required',
        'inoculation_date' => 'required',
        'hospital' => 'required',
        );
}
