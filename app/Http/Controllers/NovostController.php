<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\novost;

class NovostController extends Controller
{



    public function NewsPage(novost $novost)
    {

        return view('web.news.newspage' ,
            [
                'novosti'     => $novost->where('published' , 1)->get(),
            ]);
    }

    public function showNews(novost $newsBySlug)
    {
        $date = date('d-m-Y', strtotime($newsBySlug->created_at));
        return view('web.news.news' ,[
            'novost' => $newsBySlug,
            'date'   => $date,
        ] );
    }
}
