<?php


namespace App\Models\Player;


use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = 'bans';

    protected $fillable = ['ip','machine_id','user_staff_id','timestamp','ban_expire','ban_reason','type'];

}