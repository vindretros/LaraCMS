<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Client extends Controller
{

    public function render()
    {
        $sso = $this->generateSSO();
        Auth::user()->update(['auth_ticket' => $sso, 'ip_current' => request()->ip()]);
        return view('pages.user.home.client', ['sso' => $sso]);
    }

    private function generateSSO()
    {
        return (string)Str::uuid();
    }

}
