<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $articles , Comment $comments)
    {
        $articles = Article::select(array('id' , 'title' , 'slug'))->first();
        $comments = Comment::orderBy('id' , 'desc')->get();




        return view('admin.comments.index' ,
            [
                'comments' => $comments ,
                'articles' => $articles
            ]);
    }
}
