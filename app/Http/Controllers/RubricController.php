<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Rubric;
use App\Article;

class RubricController
{

    /**
     * @param Rubric $rubricBySlug
     * @param Article $articles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Rubric $rubricBySlug , Article $articles)
    {

        return view('web.rubric.index' ,
            [
                'rubrics' => $rubricBySlug,
                'articles' => $rubricBySlug->articles()->where('published' , true)->get(),
            ]);
    }



}