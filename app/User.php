<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','relationship_id','notice_flag',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * 
     * ユーザー情報更新時に使用するバリデート用
     * 
     * 
     */
    //public static $rules = array(
    //    'user_name' => 'required|string|max:255',
    //    'email' => 'required|string|email|max:255',
    //    'password' => 'required',
    //    'relationship_id' => 'required',
    //    'notice_flag' => 'required',
    //    
    //    );
    
    
    
    //t_childrenとの関連
    public function children()
    {
        return $this->hasMany('App\Child');
    }
    
    
    public function userProfile(){
        return $this->hasMany('App\UserProfole');
    }
    
    
}
