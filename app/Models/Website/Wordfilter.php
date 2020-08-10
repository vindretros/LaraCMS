<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class Wordfilter extends Model
{
    protected $table = 'wordfilter';
    protected $primaryKey = 'key';
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = ['key','replacement','hide','report','mute'];
}
