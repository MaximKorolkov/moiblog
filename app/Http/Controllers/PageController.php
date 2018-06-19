<?php

namespace App\Http\Controllers;

use App\novost;
use Illuminate\Http\Request;
use App\Rubric;
use App\Article;
use App\Slider;
use Silber\Bouncer\Database\Role;

class PageController extends Controller
{
    public function home()
    {
        $general = head(Article::$types);
        $second  = Article::$types[1];
        $third  = Article::$types[2];
        $grid    = last(Article::$types);



        return view('web.home', [
            'generals' => $this->getArticlesByType($general , 1 , 'desc'),
            'seconds'  => $this->getArticlesByType($second ,  1 , 'desc'),
            'thirds'   => $this->getArticlesByType($third , 1 , 'desc'),
            'grids'    => $this->getArticlesByType($grid, 6, 'desc')->map(function(Article $article) {
                return $article->present()->main();
            }),
            'sliders'  => Slider::where('published' , true)->get(),
            'novosti'  => novost::where('show_news' , true)->get(),
        ]);


    }

    private function getArticlesByType($type, $count, $sort)
    {
        return Article::where('published' , true)
            ->where('show_post', true)
            ->where('type', $type)
            ->limit($count)
            ->orderBy('id' , $sort)
            ->get();
    }

}
