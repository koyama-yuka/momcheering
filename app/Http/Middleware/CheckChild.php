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
        //dd($display);
        
        //親のこどもでないなら表示できないようにするルール
        if($display->user_id != Auth::id()){
            abort(404);
        }
        
        //結局使わない方向で↓
        //session(['selected' => $request->id]);
        
        return $next($request);
    }
}
