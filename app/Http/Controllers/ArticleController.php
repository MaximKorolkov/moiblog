<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show()
    {
        $article = Article::where('published' , true)->first();
        $date = date('d-m-Y', strtotime($article->created_at));


            return view('web.articles' , [ 'article' =>$article, 'date' =>$date ]  );





    }

    public function general_articles(Article $article)
    {
        return view('web.pieces.general_article' ,
            [
                'article' => $article,
            ]
        )->where('article' , $article->general_article);
    }

}
