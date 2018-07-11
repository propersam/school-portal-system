<?php

namespace App\Http\Middleware;
use Closure;

class CheckIfActiveSession
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
        /*
        $active_session = Session::where('is_active', '=', 1)->first();
        if (!$active_session) {
            // return redirect('/dashboard/sessions');
        return redirect("/dashboard/sessions")->with('warning', "Please set a session as active.");
        }
        */

        return $next($request);
    }
}
