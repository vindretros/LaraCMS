<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Rcon
{

    public static function rcon($data)
    {
        $service_port = (int) config('hotel.rcon_port', 3001);
        $address = config('hotel.rcon_host', '127.0.0.1');

        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            return false;
        }
        try {
            $result = socket_connect($socket, $address, $service_port);
            if ($result === false) {
                return false;
            }
        } catch (\Exception $exception) {
            return false;
        }


        $data = json_encode($data);

        if (socket_write($socket, $data, strlen($data)) === false) {
            Log::debug(socket_strerror(socket_last_error($socket)));
        }

        return socket_read($socket, 2048);
    }

    public static function hotelAlert($text, $user = 'System')
    {

        $data = [
           'key' => 'hotelalert',
            'data' => [
                'message' => $text,
                'username' => $user,
            ]
        ];

        return self::rcon($data);
    }

    public static function disconectUser($user)
    {
        $data = [
            'key' => 'disconnect',
            'data' => [
                'user_id' => $user,
            ]
        ];

        return self::rcon($data);
    }

    public static function sendGift($user, $item_id, $message = '') {
        $data = [
            'key' => 'sendgift',
            'data' => [
                'user_id' => $user,
                'itemid' => $item_id,
                'message' => $message,
            ]
        ];

        return self::rcon($data);
    }

    public static function followUser($user_id) {
        $data = [
            'key' => 'stalkuser',
            'data' => [
                'user_id' => Auth::id(),
                'follow_id' => $user_id,
            ]
        ];

        return self::rcon($data);
    }

    public static function joinRoom($room_id) {
        if(Auth::user()->online == 0) {
            return false;
        }

        $data = [
            'key' => 'forwarduser',
            'data' => [
                'user_id' => Auth::id(),
                'room_id' => $room_id,
            ]
        ];

        return self::rcon($data);
    }

    public static function reloadWordFilter() {
        $data = [
            'key' => 'updatewordfilter',
            'data' => [
                'update' => 'en snel'
            ]
        ];

        return self::rcon($data);
    }

}
