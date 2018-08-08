<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Comment;
use App\Article;

class CommentController extends Controller
{

    public function index()
    {
        return view('web.pieces.comment' ,
            [
                $comment = [],
                $comments = Comment::with('children')->with('parent_id' , 0)->get()
            ]);
    }

    public function createComment(Request $request, Article $article)
    {
        $comment = new Comment($request->only([
            'body',
            'parent_id',
        ]));
        $comment->name = auth()->user()->name;
        $comment->user_id = auth()->user()->id;
        $comment->article_id = $article->id;

        $comment->save();

        return response()->json($comment->present()->card());
    }


}
