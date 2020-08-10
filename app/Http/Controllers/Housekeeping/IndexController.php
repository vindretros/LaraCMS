<?php
namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Player\User;

class IndexController extends Controller
{

    public function index()
    {
        $view = view('pages.housekeeping.index');
        $view->last_version = $this->getVersion();
        $view->last_players = User::orderBy('account_created', 'DESC')->get()->take(5);

        return $view;
    }

    function getVersion() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://vindretros.nl/braincms.txt');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'LaraCMS version checker: '. config('hotel.lara_cms_version'));
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

}
