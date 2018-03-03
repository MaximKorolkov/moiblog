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

        return view('web.home', [
            'generals' => Article::where('show_post', true)->where('type', $general)->get(),
            'articles' => Article::where('show_post', true)->where('type', '!=', $general)->orderBy('type')->get(),
            'sliders' => Slider::where('published' , true)->get(),

        ]);


    }

}