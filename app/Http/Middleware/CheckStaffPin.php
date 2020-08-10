<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStaffPin
{

    public function handle(Request $request, Closure $next) {
        $user = Auth::user();

        if($user->rank < 3) {
            return $next($request);
        }

        if($request->session()->get('pin','ongeldig') === $user->pin) {
            return $next($request);
        }
        $request->session()->put('return_url', $request->path());
        if($user->pin === null) {
            return redirect()->route('housekeeping.user.pin.create');
        }

        $request->session()->remove('pin');
        return redirect()->route('housekeeping.user.pin');


    }

}