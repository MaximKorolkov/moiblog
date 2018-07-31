<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Rubric;
use App\User;


class ArticleController extends Controller
{
    public function show(Article $articleBySlug , Rubric $rubricBySlug , User $user)
    {
        return view('web.articles' ,
                [
                    'article'       => $articleBySlug,
                    'author'        => $articleBySlug->user->name,
                    'date'          =>$articleBySlug->created_at->Format('d-F-y'),
                    'comments'      => $articleBySlug->comments,
                    'rubrics'       => $articleBySlug->rubrics,
                    'user_articles' => $articleBySlug->user ,
                    'user'          => $user

            ]  );
    }
}
