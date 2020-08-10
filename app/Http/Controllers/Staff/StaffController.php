<?php


namespace App\Http\Controllers\Staff;


use App\Http\Controllers\Controller;
use App\Models\Player\Permission;

class StaffController extends Controller
{

    public function index() {
        $view = view('pages.user.staff.index');
        $view->ranks = Permission::where('level', '>=', 3)->orderBy('level','DESC')->get();

        return $view;
    }

}
