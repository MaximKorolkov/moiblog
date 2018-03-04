<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\novost;
use App\SinglePage;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
        Route::model('article' , Article::class);
        Route::model('category' , Category::class);
        Route::model('novost' , novost::class);
        Route::model('SinglePage' , SinglePage::class);
        Route::bind('articleBySlug' , function($slug){

            return Article::where('slug' , $slug)->first();
        });
        Route::bind('categoryBySlug' , function($slug){

            return Category::where('slug' , $slug)->first();
        });

        Route::bind('newsBySlug' , function($url){

            return Category::where('url' , $url)->first();
        });

        Route::bind('pageBySlug' , function($url){

            return SinglePage::where('url' , $url)->first();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
