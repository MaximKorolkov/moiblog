<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\novost;

class NovostController extends Controller
{

    public function NewsPage(novost $novost)
    {
        $simpl_text = substr($novost->text ,0 , 250);
        $simpl_text = $simpl_text . '....';
        return view('web.news.newspage' ,
            [
                'novosti'     => $novost->where('published' , 1)->get(),
            ]);
    }

    public function showNews(novost $novost)
    {
        $date = date('d-m-Y', strtotime($novost->created_at));
        return view('web.news.news' ,[
            'novost' => $novost,
            'date'   => $date,
        ] );
    }
}
