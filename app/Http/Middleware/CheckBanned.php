<?php

namespace App\Http\Middleware;

use App\Models\Player\Ban;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->ban()->where('ban_expire', '>=', time())->count() !== 0) {
            return redirect('banned');
        }

        $types = ['ip', 'super', 'machine'];
        if (Ban::where('ban_expire', '>=', time())->whereIn('type', $types)->where('ip', '=', $request->ip())->count() !== 0) {
            return redirect('banned');
        }

        return $next($request);
    }
}
