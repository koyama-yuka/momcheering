<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $table = 'm_medical'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    
    
}
