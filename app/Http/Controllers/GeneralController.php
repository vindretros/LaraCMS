<?php

namespace App\Http\Controllers;

use App\Helpers\Rcon;
use App\Models\Player\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function followUser(Request $request)
    {
        $user = User::find($request->get('user_id'));
        if ($user->online === '1') {
            Rcon::followUser($user->id);
            return 'OK';
        }

        return 'FAILED';
    }

    public function joinRoom(Request $request)
    {
        $room = DB::table('rooms')->find($request->get('room_id'));
        if ($room && Rcon::joinRoom($room->id)) {
            return 'OK';
        }

        return 'FAILED';
    }

    public function changeTheme(Request $request)
    {
        $theme = 'light';
        if ($request->get('theme') === 'dark') {
            $theme = 'dark';
        }

        Auth::user()->update([
            'theme' => $theme
        ]);

        return 'OK';
    }


}
