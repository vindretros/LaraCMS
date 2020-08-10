<?php

namespace App\Jobs;

use App\Models\Player\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckDailyRewardJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('last_online','>=', Carbon::now()->subDay()->timestamp)->where(function ($query) {
            $query->where('new_daily_reward', '!=', 0)
                ->orWhere('new_daily_reward', '<=', Carbon::now()->subDay()->timestamp);
        })->get();

        foreach ($users as $user) {
            $user->update([
               'new_daily_reward' => Carbon::now()->subSeconds('3600')->timestamp
            ]);
            //ToDo Geef hier de reward
            //Iets met kraak de kluis?
            //Diamonds/credits/duckets?


        }

    }
}
