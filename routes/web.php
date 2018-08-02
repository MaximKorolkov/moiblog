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
    Route::post('/articles/{article}/comment' , 'CommentController@createComment' );
    /* Route::post('/articles/{articleBySlug}' , 'CommentController@showComment' );*/
    Route::get('/category/{categoryBySlug}' , 'CategoryController@show');
    Route::get('/news' , 'NovostController@NewsPage');
    Route::get('/news/{newsBySlug}' , 'NovostController@showNews');
    Route::get('/page/{pageBySlug}' , 'SinglePageController@show');
    Route::get('/rubric/{rubricBySlug}' , 'RubricController@show');
    Route::get('/pab' ,'UserPostController@show');

    Route::get('/' , 'PageController@home');


    Auth::routes();


