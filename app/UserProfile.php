<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //SoftDeleteを使用するために導入

class UserProfile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'user_id' => 'required',
        'user_name' => 'required',
        'relationship_id' => 'required',
        'notice_flag' => 'required',
        );
}
