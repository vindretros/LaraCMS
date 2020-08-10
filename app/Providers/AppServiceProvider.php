<?php

namespace App\Providers;

use App\Models\Player\User;
use App\Models\Website\Article;
use App\Models\Website\CmsSettings;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        view()->composer('components.news', function () {
            $news = Article::orderBy('id', 'DESC')->get();
            view()->share('news', $news);
        });

        view()->composer('components.rooms', function () {
            $rooms = DB::table('rooms')->orderBy('users', 'DESC')->limit(10)->get();
            view()->share('rooms', $rooms);
        });

        view()->composer('components.last_created_users', function () {
            $last_created_users = User::orderByDESC('account_created')->limit(10)->get();
            view()->share('lastCreatedUsers', $last_created_users);
        });

        User::observe(UserObserver::class);
        if (!App::runningInConsole() && DB::connection()->getDatabaseName()) {
            CmsSettings::checkSettings();
            config([
                'hotel' => CmsSettings::all([
                    'key', 'value'
                ])
                    ->keyBy('key')
                    ->transform(function ($setting) {
                        return $setting->value;
                    })
                    ->toArray()
            ]);

            view()->share('online_count', User::where('online','=', '1')->count());
        }


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
