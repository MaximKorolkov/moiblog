<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Rubric;


class ArticleController extends Controller
{
    public function show(Article $articleBySlug , Rubric $rubricBySlug )
    {
        /*auth()->user()->can('create', Article::class);*/
            return view('web.articles' ,
                [
                    'article' => $articleBySlug,
                    'date' =>$articleBySlug->created_at,
                    'comments' => $articleBySlug->comments,
                    'rubrics' => $articleBySlug->rubrics,

            ]  );

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
