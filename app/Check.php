<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //SoftDeleteを使用するために導入

class Check extends Model
{
    protected $table = 't_check'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    public static $rules = array(
        'done_check' => 'nullable',
        );
    
}
