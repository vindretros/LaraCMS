<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class NotificationController
{
    public function ajax()
    {
        $user = Auth::user();
        $data = $user->unreadNotifications;


        return response()->json($data);
    }

    public function read($id)
    {
        Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
    }

}