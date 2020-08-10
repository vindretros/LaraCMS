<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Player\Currency;
use App\Models\Player\Settings;
use App\Models\Player\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TopPlayersController extends Controller
{
    public function index()
    {
        $view = view('pages.user.community.top_players');
        $data = Cache::remember('top_players', 3600, function () {

            $duckets = Currency::whereHas('user', function ($q) {
                $q->where('rank', '<', '3');
            })->where('type', 0)->orderBy('amount', 'DESC')->take(5)->get();
            $diamonds = Currency::whereHas('user', function ($q) {
                $q->where('rank', '<', '3');
            })->where('type', 5)->orderBy('amount', 'DESC')->take(5)->get();
            $credits = User::where('rank', '<', 3)->orderBy('credits', 'DESC')->take(5)->get();
            $respect_received = Settings::whereHas('user', function ($q) {
                $q->where('rank', '<', '3');
            })->orderBy('respects_received', 'DESC')->take(5)->get();
            $respect_given = Settings::whereHas('user', function ($q) {
                $q->where('rank', '<', '3');
            })->orderBy('respects_given', 'DESC')->take(5)->get();
            $online_time = Settings::whereHas('user', function ($q) {
                $q->where('rank', '<', '3');
            })->orderBy('online_time', 'DESC')->take(5)->get();

            return [
                'duckets' => $duckets,
                'diamonds' => $diamonds,
                'credits' => $credits,
                'respect_received' => $respect_received,
                'respect_given' => $respect_given,
                'online_time' => $online_time
            ];
        });

        $view->duckets = $data['duckets'];
        $view->diamonds = $data['diamonds'];
        $view->credits = $data['credits'];
        $view->respect_received = $data['respect_received'];
        $view->respect_given = $data['respect_given'];
        $view->online_time = $data['online_time'];

        return $view;
    }
}
