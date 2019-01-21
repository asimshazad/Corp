<?php

namespace App\Http\Middleware;

use App\Staff;
use Closure;
use Illuminate\Support\Facades\Auth;

class StaffCheckMiddleware
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
        $staff = Staff::findOrFail(Auth::user()->id);
        if ($staff->status == 0){
            Auth::guard()->logout();
            session()->flash('message','Your Account Is Block Now. Contact To Admin.');
            session()->flash('type','success');
            return redirect('/staff');
        }

        return $next($request);
    }
}
