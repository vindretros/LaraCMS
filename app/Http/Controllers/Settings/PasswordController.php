<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\updatePasswordRequest;
use App\Notifications\GlobalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index() {
        $view = view('pages.user.settings.password');


        return $view;
    }

    public function store(updatePasswordRequest $request) {
        Auth::user()->update([
            'password' => Hash::make($request->get('password')),
        ]);
        Auth::user()->notify(new GlobalNotification(__('Password updated'), 'success'));

        return redirect()->route('me');
    }

}
