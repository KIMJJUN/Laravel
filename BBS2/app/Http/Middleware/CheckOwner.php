<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Info;

class CheckOwner
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
        

        $user = Auth::user();

        $id = $request->route('info');

        $b = Board::find($id);

        if(!$b || $user->id != $b->user_id){
            flash('너는 권한이 없어!')->error();
            return back();

        }

        return $next($request);
    }
}
