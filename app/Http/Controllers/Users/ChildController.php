<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

use App\Child;
use App\User;

class ChildController extends Controller
{
    /**
     * 子どものプロフィール情報画面
     * 
     * @param Request $request
     * @return 
     */
    public function index(Request $request){
        $childId = $request['id'];
        if(empty($childId)){
            $childId = 1;
        }
        return view('user.child_profile',['id'=>$childId]);
    }

    /**
     * 子どものプロフィール情報編集画面
     * 
     * @param Request $request
     * @return '/child/edit'
     */
    public function edit(Request $request){
        $childId = $request['id'];
        if(empty($childId)){
            return false;
        }
        $child = new Child;
        $childData = $child->getChildDataAll($childId);
        $childBirthday = $childData['birthday'];
        $childBirthdayYear = date('Y', strtotime($childBirthday));
        $childBirthdayMonth = date('n', strtotime($childBirthday));
        $childBirthdayDay = date('j', strtotime($childBirthday));

        return view(
            'user.child_profile_edit',
            ['childData' => $childData,
             'birthdayYear' => $childBirthdayYear,
             'birthdayMonth' => $childBirthdayMonth,
             'birthdayDay' => $childBirthdayDay
            ]
        );
    }
    
    
    public function add(){
        return view('user.child_add');
    }
    
    
    // ＋で追加のこども情報の登録
    public function addDone(Request $request){
        $this->validate($request, Child::$rules);
        $form = $request->all();
        unset($form['_token']);
        $child_data = new Child;
        $child_data->user_id = Auth::id();
        $child_data->fill($form);
        $child_data->save();
        return redirect('/home');
    }

}
