<?php

namespace App\Observers;


use App\Models\Player\User;

class UserObserver
{

    public function created(User $user)
    {
        $user->currency()->create(['type' => 5, 'amount' => config('hotel.starting_diamonds', 0)]);
        $user->currency()->create(['type' => 0, 'amount' => config('hotel.starting_duckets', 0)]);
        $user->update(['credits' => config('hotel.starting_credits', 0)]);

    }


}
