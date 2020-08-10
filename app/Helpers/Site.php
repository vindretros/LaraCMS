<?php

namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonInterval;

class Site
{
    public static function timeToHuman($seconds)
    {
        $now = Carbon::now();
        $days = $now->diffInDays($now->copy()->addSeconds($seconds));
        $hours = $now->diffInHours($now->copy()->addSeconds($seconds)->subDays($days));
        $minutes = $now->diffInMinutes($now->copy()->addSeconds($seconds)->subDays($days)->subHours($hours));

        return CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
    }
}
