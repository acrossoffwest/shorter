<?php

Route::group([
    'namespace' => 'Acrossoffwest\Shorter\Http\Controllers',
    'middleware' => ['web']
], function () {
    Route::group([
        'prefix' => config('shorter.route.url_prefix')
    ], function () {
        $namePrefix = config('shorter.route.name_prefix').'.';

        Route::get('/', [
            'as' => $namePrefix.'index',
            'uses' => 'ShorterController@index'
        ]);
    });

    Route::group([
        'prefix' => 'api/'.config('shorter.route.url_prefix'),
        'namespace' => 'Api',
    ], function () {
        $apiNamePrefix = 'api.'.config('shorter.route.name_prefix').'.';

        Route::post('/generate', [
            'as' => $apiNamePrefix.'generate',
            'uses' => 'ShorterController@generate'
        ]);
    });

    Route::get('/{short_url?}', [
        'as' => config('shorter.route.name_prefix').'.redirect',
        'uses' => 'ShorterController@redirect'
    ]);
});