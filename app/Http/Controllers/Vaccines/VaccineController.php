<?php

namespace App\Http\Controllers\Vaccines;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VaccineController extends Controller
{
    public function index(){
        return view('user.vaccine.vaccine_index');
    }
}
