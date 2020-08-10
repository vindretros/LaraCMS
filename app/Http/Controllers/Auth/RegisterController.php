<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Player\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/me';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('pages.guest.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
			'username' => ['required', 'string', 'max:255', 'unique:users'],
            'mail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
			'motto' => ['required', 'string', 'max:255'],
            'ref' => ['nullable', 'string', 'exists:users,username'],
            'gender' => ['required', Rule::in(['M','F'])]
        ]);
    }

    protected function create(array $data)
    {
        $look = 'ch-215-1301.lg-270-63.hr-893-45.sh-906-92.wa-987462910-92.hd-180-2';
        if($data['gender'] === 'F') {
            $look = 'hd-600-1.hr-828-61.ha-1012-110.ch-255-66.lg-280-110.sh-305-62';
        }


        $user = User::create([
            'mail' => $data['mail'],
			'username' => $data['username'],
            'password' => Hash::make($data['password']),
			'motto' => $data['motto'],
			'gender' => $data['gender'],
			'look' => $look,
			'ip_register' => request()->ip(),
			'ip_current' => request()->ip(),
			'last_login' => Carbon::now()->timestamp,
            'account_created' => Carbon::now()->timestamp,
        ]);
        if(isset($data['ref'])) {
            $user->referral()->associate(User::firstWhere('username', $data['ref'])->id)->save();
        }

        return $user;
    }
    const created_at = null;
}
