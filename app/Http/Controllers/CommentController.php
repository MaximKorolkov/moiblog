<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;

class CommentController extends Controller
{

    public function createComment(Request $request, Article $article)
    {
        $comment = new Comment($request->only(
            'name',
            'body'
        ));

        $this->validate($request, [

                'name' => 'required|max:20',
                'body' => 'required'

            ]
            );

        $comment->article_id = $article->id;

        $comment->save();
        return back();
    }


}