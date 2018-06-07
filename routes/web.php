<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/articles/{articleBySlug}' , 'ArticleController@show');
    Route::post('/articles/{article}' , 'CommentController@createComment' );
    /* Route::post('/articles/{articleBySlug}' , 'CommentController@showComment' );*/
    Route::get('/category/{categoryBySlug}' , 'CategoryController@show');
    Route::get('/news' , 'NovostController@NewsPage');
    Route::get('/news/{newsBySlug}' , 'NovostController@showNews');
    Route::get('/page/{pageBySlug}' , 'SinglePageController@show');
    Route::get('/rubric/{rubricBySlug}' , 'RubricController@show');

    Route::get('/' , 'PageController@home');

    Route::group(['middleware' => 'auth'], function() {
        Route::group(['prefix' => 'profile/{user}'], function() {
            Route::get('/' , 'UserController@index');
            Route::get('/settings', 'UserController@edit');
            Route::post('/update', 'UserController@update');
            Route::post('/subscribe', 'UserController@addSubscribe');
            Route::post('/unsubscribe', 'UserController@deleteSubscribe');
            Route::get('/my-post' , 'UserPostController@index');
            Route::get('/create-post' , 'UserPostController@create');
            Route::post('/store-post' , 'UserPostController@store');

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

    Auth::routes();


