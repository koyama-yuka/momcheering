<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Child; //追加した
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'relationship_id' => ['required', 'integer'],
            'notice_flag' => ['required', 'integer'],
            
            'child_name' => ['required', 'string', 'max:255'],
            'gender_id' => ['required', 'integer'],
            'birthday' => ['required', 'date'],
            'blood_type_id' => ['required', 'integer'],
            'blood_rh_id' => ['required', 'integer'],
            'birth_weight' => ['required', 'numeric'],
            'birth_height' => ['required', 'numeric'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        //トランザクション　2つのテーブルどっちもOKだったら保存する
        
        return DB::transaction(function() use($data) {
            
            $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'relationship_id' => $data['relationship_id'],
            'notice_flag' => $data['notice_flag'],
            ]);
            
            
            
            $child = Child::create([
            'user_id' => $user->id,
            'child_name' => $data['child_name'],
            'gender_id' => $data['gender_id'],
            'birthday' => $data['birthday'],
            'blood_type_id' => $data['blood_type_id'],
            'blood_rh_id' => $data['blood_rh_id'],
            'birth_weight' => $data['birth_weight'],
            'birth_height' => $data['birth_height'],
            ]);
            
            
            return $user;
       
        });
    
    }
}
