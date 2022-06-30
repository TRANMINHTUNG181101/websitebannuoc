<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type_account)
    {
        //type_account
        /*
        1 =>admin
        2 =>pha_che
        3 =>thu_ngan
        */

        // if (Auth::user() &&  Auth::user()->is_admin == 1) {
        //     return $next($request);
        // }

        // if(Auth::check())
        // return true;
        // }
        
        abort(403, 'Bạn không có quyền thêm cập');
    }
}
