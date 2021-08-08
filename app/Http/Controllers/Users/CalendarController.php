<?php
namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;

class CalendarController extends Controller
{
    public function index(Request $request){
        return view('user.calendar');
    }

}
?>