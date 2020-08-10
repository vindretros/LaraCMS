<?php
Auth::routes();

Route::post('auth/admin-login', 'Auth\LoginController@adminLogin')->name('auth.admin.login');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'Redirect@render')->name('index');
});

Route::group(['middleware' => ['user', \App\Http\Middleware\CheckBanned::class]], function () {

    Route::get('notifications/ajax/get', 'NotificationController@ajax')->name('notifications.ajax');
    Route::post('notifications/ajax/read/{id}', 'NotificationController@read')->name('notifications.read');

    Route::post('rcon/follow-user','GeneralController@followUser')->name('rcon.follow.user');
    Route::post('rcon/join-room','GeneralController@joinRoom')->name('rcon.join.room');
    Route::post('change-theme','GeneralController@changeTheme')->name('change.theme');

    Route::group(['namespace' => 'Home'], function () {
        Route::get('me', 'Me@render')->name('me');

        Route::group(['middleware' => [\App\Http\Middleware\CheckStaffPin::class]],function () {
            Route::get('client', 'Client@render')->name('client');
        });

        Route::get('logout', 'Logout@render')->name('logout');
    });

    Route::group(['namespace' => 'Article'], function () {
        Route::get('news', 'NewsController@render')->name('NewsController');
        Route::get('news/{articles}', 'NewsController@show')->name('article.show');
        Route::post('news/{article}/reaction', 'ReactionController@store')->name('article.reaction.create');
        Route::post('reaction/{reaction}/delete', 'ReactionController@destroy')->name('article.reaction.delete');
    });

    Route::group(['namespace' => 'Settings'], function () {
        Route::get('settings/password', 'PasswordController@index')->name('settings.password.index');
        Route::post('settings/password', 'PasswordController@store')->name('settings.password.store');
    });

    Route::group(['namespace' => 'Staff'], function () {
        Route::get('staff', 'StaffController@index')->name('Staff');
    });

    Route::group(['namespace' => 'Community', 'prefix' => 'community'], function () {
        Route::get('top_players', 'TopPlayersController@index')->name('top_players');
    });

    Route::group(['namespace' => 'Pin', 'prefix' => 'housekeeping', 'as' => 'housekeeping.'], function () {
        Route::get('user/pin/', 'PinController@pin')->name('user.pin');
        Route::post('user/pin/', 'PinController@check')->name('user.pin.check');
        Route::get('user/pin/create', 'PinController@create')->name('user.pin.create');
        Route::post('user/pin/create', 'PinController@store')->name('user.pin.store');
    });

    Route::group(['middleware' => [\App\Http\Middleware\CheckStaff::class,\App\Http\Middleware\CheckStaffPin::class], 'namespace' => 'Housekeeping', 'prefix' => 'housekeeping', 'as' => 'housekeeping.'], function () {
        Route::get('index', 'IndexController@index')->name('index');

        //News
        Route::resource('news', 'NewsController');
        Route::get('get/news/', 'NewsController@indexAjax')->name('news.indexAjax');

        //worldfilter
        Route::resource('wordfilter', 'WordfilterController');
        Route::get('get/wordfilter/', 'WordfilterController@indexAjax')->name('wordfilter.indexAjax');

        //Cms settings
        Route::resource('cms_settings', 'CmsSettingsController');
        Route::get('get/cms_settings/', 'CmsSettingsController@indexAjax')->name('cms_settings.indexAjax');

        //Players
        Route::resource('player', 'PlayerController');
        Route::get('get/player/', 'PlayerController@indexAjax')->name('player.indexAjax');
        Route::post('player/disconnect', 'PlayerController@disconnectUserAjax')->name('player.disconnectUserAjax');

    });


});


