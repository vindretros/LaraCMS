<?php

namespace App\Models\Website;

use App\Models\Player\User;
use Illuminate\Database\Eloquent\Model;

class ArticleReactions extends Model
{
    protected $fillable = ['text'];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
