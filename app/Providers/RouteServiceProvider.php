<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\novost;
use App\Rubric;
use App\SinglePage;
use App\Thread;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Silber\Bouncer\Database\Role;

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
        Route::model('rubrics' , Rubric::class);
        Route::model('SinglePage' , SinglePage::class);
        Route::model('role', Role::class);
        Route::model('thread', Thread::class);

        Route::bind('articleBySlug' , function($slug){
            return Article::where('slug' , $slug)->first();
        });

        Route::bind('categoryBySlug' , function($slug){
            return Category::where('slug' , $slug)->first();
        });

        Route::bind('rubricBySlug' , function($url){
            return Rubric::where('url' , $url)->where('published' , true)->first();
        });

        Route::bind('newsBySlug' , function($url){
            return novost::where('url' , $url)->first();
        });

        Route::bind('pageBySlug' , function($url){
            return SinglePage::where('url' , $url)->where('published' , true)->first();
        });



       ;
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapAdminRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }
}
