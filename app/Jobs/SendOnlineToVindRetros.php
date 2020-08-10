<?php

namespace App\Jobs;

use App\Models\Player\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOnlineToVindRetros implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $users_online;
    private $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users_online = User::where('online','=',2)->count();
        $this->token = env('VINDRETROS_TOKEN',null);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->token == null) {
            return;
        }

        $client = new Client();
        $body = [
            'token' => $this->token,
            'online', $this->users_online,
        ];

        try {
            $client->post('https://vindretros.nl/api/online', ['body' => $body]);
        } catch (GuzzleException $e) {

        }
    }
}
