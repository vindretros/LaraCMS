<?php

namespace App\Http\Controllers\Housekeeping;

use App\Helpers\Rcon;
use App\Helpers\Site;
use App\Http\Controllers\Controller;
use App\Http\Requests\userStoreRequest;
use App\Models\Player\User;
use App\Notifications\GlobalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PlayerController extends Controller
{

    public function index()
    {
        return view('pages.housekeeping.player.index');
    }


    public function edit(User $player)
    {
        $view = view('pages.housekeeping.player.edit');
        $view->player = $player;

        return $view;

    }

    public function update(userStoreRequest $request, User $player)
    {
        if ((int)$player->id === Auth::user()->id || Auth::user()->rank <= $player->rank || Auth::user()->rank <= $request->get('rank')) {
            Auth::user()->notify(new GlobalNotification(__('You are not allowed to modify this user!'), 'danger'));
            return redirect()->route('housekeeping.player.index');
        }
        $player->update($request->all());
        $player->diamonds()->update(['amount' => $request->get('diamonds')]);
        $player->duckets()->update(['amount' => $request->get('duckets')]);

        $player->rank()->associate($request->get('rank'))->save();
        Auth::user()->notify(new GlobalNotification(__('User successfull saved!'), 'success'));

        return redirect()->route('housekeeping.player.edit', [$player]);
    }

    public function indexAjax(Datatables $datatables)
    {
        $builder = User::query()->select('id', 'username', 'rank', 'credits');

        return $datatables->eloquent($builder)
            ->addColumn('duckets', function ($player) {
                return $player->duckets->amount;
            })
            ->addColumn('diamonds', function ($player) {
                return $player->diamonds->amount ?? 0;
            })
            ->addColumn('action', function ($player) {
                return '<a href="' . route('housekeeping.player.edit', [$player->id]) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>' . __('Edit') .'</a>';
            })->rawColumns(['action'])->make(true);
    }

    public function disconnectUserAjax(Request $request) {
        Rcon::disconectUser($request->get('user_id'));

        return 'Ok';
    }

}
