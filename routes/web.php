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




Route::group(['prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware'=> ['auth']] , function ()
{
    Route::get('/' , 'DashboardController@dashboard')->name('admin.index');

    Route::group(['prefix' => 'articles'] , function(){

        Route::get('/index' , 'ArticleController@index');
        Route::get('/create' , 'ArticleController@create');
        Route::post('/store' , 'ArticleController@store');
        Route::get('/edit/{article}' , 'ArticleController@edit');
        Route::post('/update/{article}' , 'ArticleController@update');
        Route::delete('/destroy/{article}' , 'ArticleController@destroy');
    });

    Route::group(['prefix' => 'rubric'] , function() {

        Route::get('/index', 'RubricController@index');
        Route::get('/create', 'RubricController@create');
        Route::post('/store', 'RubricController@store');
        Route::get('/edit/{rubrics}', 'RubricController@edit');
        Route::post('/update/{rubrics}', 'RubricController@update');
        Route::delete('/destroy/{rubrics}' , 'RubricController@destroy');
    });
    Route::group(['prefix' => 'categories'] , function(){

        Route::get('/index' , 'CategoryController@index');
        Route::get('/create' , 'CategoryController@create');
        Route::post('/store' , 'CategoryController@store');
        Route::get('/edit/{category}' , 'CategoryController@edit');
        Route::post('/update/{category}' , 'CategoryController@update');
        Route::delete('/destroy/{category}' , 'CategoryController@destroy');
    });
    Route::group(['prefix' => 'menu'] , function(){

        Route::get('/index' , 'AdminMenuController@index');
        Route::get('/create' , 'AdminMenuController@create');
        Route::post('/store' , 'AdminMenuController@store');
        Route::get('/edit/{menu}' , 'AdminMenuController@edit');
        Route::post('/update/{menu}' , 'AdminMenuController@update');
        Route::delete('/destroy/{menu}' , 'AdminMenuController@destroy');
    });
    Route::group(['prefix' => 'slider'] , function(){

        Route::get('/index' , 'SliderController@index');
        Route::get('/create' , 'SliderController@create');
        Route::post('/store' , 'SliderController@store');
        Route::get('/edit/{sliders}' , 'SliderController@edit');
        Route::post('/update/{sliders}' , 'SliderController@update');
        Route::delete('/destroy/{sliders}' , 'SliderController@destroy');
    });
    Route::group(['prefix' => 'novosti'] , function(){

        Route::get('/index' , 'NovostController@index');
        Route::get('/create' , 'NovostController@create');
        Route::post('/store' , 'NovostController@store');
        Route::get('/edit/{novost}' , 'NovostController@edit');
        Route::post('/update/{novost}' , 'NovostController@update');
        Route::delete('/destroy/{novost}' , 'NovostController@destroy');
    });
    Route::group(['prefix' => 'singpage'] , function(){

        Route::get('/index' , 'SinglePageController@index');
        Route::get('/create' , 'SinglePageController@create');
        Route::post('/store' , 'SinglePageController@store');
        Route::get('/edit/{singlePage}' , 'SinglePageController@edit');
        Route::post('/update/{singlePage}' , 'SinglePageController@update');
        Route::delete('/destroy/{singlePage}' , 'SinglePageController@destroy');
    });

    Route::group(['prefix' => 'comment'] , function(){

        Route::get('/index' , 'CommentController@index');
       /* Route::get('/create' , 'SinglePageController@create');
        Route::post('/store' , 'SinglePageController@store');
        Route::get('/edit/{singlePage}' , 'SinglePageController@edit');
        Route::post('/update/{singlePage}' , 'SinglePageController@update');
        Route::delete('/destroy/{singlePage}' , 'SinglePageController@destroy');*/
    });


    Route::group(['prefix' => 'abilities'], function() {
        Route::get('index', 'AbilityController@index');
        Route::post('update', 'AbilityController@update');
    });

});



        Route::get('/articles/{articleBySlug}' , 'ArticleController@show');
        Route::post('/articles/{article}' , 'CommentController@createComment' );
        /* Route::post('/articles/{articleBySlug}' , 'CommentController@showComment' );*/
        Route::get('/category/{categoryBySlug}' , 'CategoryController@show');
        Route::get('/news' , 'NovostController@NewsPage');
        Route::get('/news/{newsBySlug}' , 'NovostController@showNews');
        Route::get('/page/{pageBySlug}' , 'SinglePageController@show');
        Route::get('/rubric/{rubricBySlug}' , 'RubricController@show');



        Route::get('/' , 'PageController@home');





        Auth::routes();


