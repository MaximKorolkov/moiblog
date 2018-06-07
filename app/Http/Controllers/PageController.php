<?php

namespace App\Http\Controllers;

use App\novost;
use Illuminate\Http\Request;
use App\Article;
use App\Slider;

class PageController extends Controller
{
    public function home()
    {
        $general = head(Article::$types);
        $second  = Article::$types[1];
        $third  = Article::$types[2];
        $grid    = last(Article::$types);




        return view('web.home', [
            'generals' => Article::where('published' , true)->where('show_post', true)->where('type', $general)->limit(1)->orderBy('id' , 'desc')->get(),
            'seconds' => Article::where('published' , true)->where('show_post', true)->where('type' , $second)->limit(1)->orderBy('id' , 'desc')->get(),
            'thirds' => Article::where('published' , true)->where('show_post', true)->where('type' , $third)->limit(1)->orderBy('id' , 'desc')->get(),
            'grids'    => Article::where('published' , true)->where('show_post' , true)->where('type' , $grid)->limit(6)->orderBy('id' , 'desc')->get(),
            'sliders'  => Slider::where('published' , true)->get(),
            'novosti'  => novost::where('show_news' , true)->get(),

        ]);


    }



}
