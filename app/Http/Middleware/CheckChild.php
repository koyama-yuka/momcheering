<?php

namespace App\Http\Middleware;

use Closure;
use App\Child;
use Illuminate\Support\Facades\Auth; //Authを使用するために導入

class CheckChild
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $display = Child::find($request->id);
        
        //SoftDeleteの場合はnullになっている
        if($display == null){
            abort(404);
        }
        
        //親のこどもでないなら表示できないようにするルール
        if($display->user_id != Auth::id()){
            abort(404);
        }
        
        return $next($request);
    }
}
