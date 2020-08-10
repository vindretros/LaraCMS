<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/me';

    public function username()
    {
        return 'mail';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('pages.guest.login');
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'mail' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->get('mail'), FILTER_VALIDATE_EMAIL) ? 'mail' : 'username';
        if (auth()->attempt([$fieldType => $data['mail'], 'password' => $data['password']])) {
            return redirect($this->redirectTo);
        }

        return redirect()->back()->withErrors(['login' => __('Email/Username and password are wrong')]);
    }

    public function adminlogin(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'mail' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->get('mail'), FILTER_VALIDATE_EMAIL) ? 'mail' : 'username';
        if (auth()->attempt([$fieldType => $data['mail'], 'password' => $data['password']])) {
            if (auth()->user()->rank < 3) {
                auth()->logout();
                return redirect()->back()->with('login', __('Only staff can login'));
            }

            return redirect($this->redirectTo);
        }

        return redirect()->back()->with('login', __('Email/Username and password are wrong'));
    }

}
