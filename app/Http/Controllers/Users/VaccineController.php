<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VaccineController extends Controller
{
    public function index(){
        return view('user.vaccine_index');
    }
    
    public function details(){
        return view('user.vaccine_details');
    }
    
    public function edit(){
        return view('user.vaccine_history_edit');
    }
}
