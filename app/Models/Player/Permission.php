<?php


namespace App\Models\Player;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function users() {
        return $this->hasMany(User::class,'rank');
    }


}