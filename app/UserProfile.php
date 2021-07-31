<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
