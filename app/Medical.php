<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //SoftDeleteを使用するために導入

class Medical extends Model
{
    protected $table = 'm_medical'; //モデルとテーブルの紐付け
    protected $guarded = array('id');
    
    
    
}
