<?php

    Route::group(['middleware' => 'auth'], function() {
        Route::group(['prefix' => 'profile/{user}'], function() {
            Route::get('/' , 'UserController@index');
            Route::get('/settings', 'UserController@edit');
            Route::post('/update', 'UserController@update');
            Route::post('subscribe', 'UserController@addSubscribe');
            Route::post('unsubscribe', 'UserController@deleteSubscribe');
            Route::get('/my-post'     , 'UserPostController@index');
            Route::get('/create-post' , 'UserPostController@create');
            Route::post('/store-post' , 'UserPostController@store');
            Route::get('/edit-post/{article}' , 'UserPostController@edit');
            Route::post('/update-post/{article}' , 'UserPostController@update');

            Route::group(['prefix' => 'thread'], function() {
            Route::get('/', 'ThreadController@index');
            Route::get('create', 'ThreadController@create');
        });
        });

        Route::post('message/create/{thread}', 'MessageController@create');
        });

        Route::group(['middleware' => 'auth', 'prefix' => 'thread'], function () {
            Route::get('/{thread}', 'ThreadController@show');
    });