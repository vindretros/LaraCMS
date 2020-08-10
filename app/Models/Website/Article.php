<?php

namespace App\Models\Website;

use App\Models\Player\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'cms_news';

    protected $fillable = ['title','image','description','content'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reactions() {
        return $this->hasMany(ArticleReactions::class);
    }

}
