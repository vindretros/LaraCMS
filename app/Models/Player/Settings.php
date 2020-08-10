<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;
    protected $table = 'users_settings';
    protected $fillable = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
