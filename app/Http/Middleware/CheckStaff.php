<?php

namespace App\Http\Middleware;

use App\Notifications\GlobalNotification;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStaff
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
        if($user->rank < 3) {
            $user->notify(new GlobalNotification(__('You are not allowed here!'), 'danger'));
            return  redirect('/me');
        }

        return $next($request);
    }
}
