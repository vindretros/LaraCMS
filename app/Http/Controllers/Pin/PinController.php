<?php


namespace App\Http\Controllers\Pin;


use App\Http\Controllers\Controller;
use App\Http\Requests\pinStoreRequest;
use App\Notifications\GlobalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinController extends Controller
{


    public function pin() {
        $user = Auth::user();
        if($user->pin === null) {
            return redirect()->route('housekeeping.user.pin.create');
        }

        return view('pages.housekeeping.pin.check');
    }

    public function create() {

        return view('pages.housekeeping.pin.create');
    }

    public function store(pinStoreRequest $request) {
        $user = Auth::user();
        $user->update(['pin' => (int)$request->get('pin')]);

        $user->notify(new GlobalNotification(__('Your pin is set'), 'success'));
        return redirect()->route('housekeeping.user.pin');
    }

    public function check(Request $request) {
        $user = Auth::user();
        if($user->pin === (int)$request->get('pin')) {
            $return_url = $request->session()->get('return_url');
            $request->session()->put('pin', $user->pin);
            $request->session()->remove('return_url');
            return redirect()->to($return_url);
        }

        $user->notify(new GlobalNotification(__('Your pin is not correct'), 'danger'));
        return redirect()->route('housekeeping.user.pin');
    }

}