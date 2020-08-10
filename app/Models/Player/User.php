<?php

namespace App\Models\Player;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = ['mail', 'password', 'username','gender', 'look', 'ip_register', 'ip_current', 'motto', 'last_login', 'account_created', 'auth_ticket', 'pin','theme'];
    protected $hidden = ['password', 'remember_token'];

    public function currency()
    {
        return $this->hasMany(Currency::class, 'user_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'level');
    }

    public function rank()
    {
        return $this->belongsTo(Permission::class, 'rank');
    }

    public function settings() {
        return $this->belongsTo(Settings::class, 'id','user_id');
    }

    public function ban()
    {
        return $this->hasMany(Ban::class);
    }

    public function duckets() {
        return $this->hasOne(Currency::class, 'user_id', 'id')->where('type', 0);
    }

    public function diamonds() {
        return $this->hasOne(Currency::class, 'user_id', 'id')->where('type', 5);
    }

    public function referral() {
        return $this->belongsTo(__CLASS__,'referral_user_id');
    }

    public function referrals() {
        return $this->hasMany(__CLASS__,'referral_user_id','id');
    }

}
