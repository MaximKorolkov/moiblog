<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Rubric;
use App\Http\Requests\Admin\Articles\ArticleCreateRequest;
use App\Http\Requests\Admin\Articles\ArticleDestroyRequest;
use App\Http\Requests\Admin\Articles\ArticleEditRequest;
use App\Http\Requests\Admin\Articles\ArticleIndexRequest;
use App\Http\Requests\Admin\Articles\ArticleStoreRequest;
use App\Http\Requests\Admin\Articles\ArticleUpdateRequest;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function index(ArticleIndexRequest $request)
    {
        return view('admin.articles.index' , [
            'articles' => Article::orderBy( 'id' ,'desc')->paginate(5),
        ]);

    }


    public function create(ArticleCreateRequest $request)
    {
        return view('admin.articles.create' , [
            'categories' => Category::all(),
            'rubrics' => Rubric::all(),
            'types' => Article::$types,
        ]);

    }

    public function edit(ArticleEditRequest $request , Article $article)
    {
        return view('admin.articles.edit' , [
            'article' => $article ,
            'categories' => Category::all(),
            'rubrics' => Rubric::all(),
            'types' => Article::$types,
        ] );
    }

    public function store(ArticleStoreRequest $request)
    {
        DB::beginTransaction();
        try{
            $article = new Article($request->only(
                [
                    'title',
                    'header_h1',
                    'short_description',
                    'description',
                    'general_article',
                    'second_article',
                    'third_article',
                    'meta_description',
                    'meta_keywords',
                    'published',
                    'author',
                    'general_image',
                    'image',
                    'width_image',
                    'height_image',
                    'show_post',
                    'per_post',
                    'per_post_url',
                    'next_post',
                    'next_post_url',
                    'type',
                ]
            ));

            $article->user = auth()->user()->id;

            $article->slug = str_slug($article->title);
            $article->published = !empty($request->input('published'));
            $article->show_post = !empty($request->input('show_post'));

            $article->save();

            $article->categories()->sync($request->input('category'));
            $article->rubrics()->sync($request->input('rubric'));

            DB::commit();
            return redirect()->action('Admin\ArticleController@index');

        }catch (\Exception $exception)
        {

            DB::rollback();
        }



    }

    public function update(ArticleUpdateRequest $request , Article $article)
    {
        DB::beginTransaction();
        try {
            $article->fill($request->only(
                [
                    'title',
                    'header_h1',
                    'short_description',
                    'description',
                    'meta_description',
                    'meta_keywords',
                    'author',
                    'general_image',
                    'image',
                    'width_image',
                    'height_image',
                    'published',
                    'show_post',
                    'per_post',
                    'per_post_url',
                    'next_post',
                    'next_post_url',
                    'type',
                ]
            ));

            $article->user = auth()->user()->id;
            $article->slug = str_slug($article->title);
            $article->published = !empty($request->input('published'));
            $article->show_post = !empty($request->input('show_post'));

            $article->save();

            $article->categories()->sync($request->input('category'));
            $article->rubrics()->sync($request->input('rubric'));

            DB::commit();

            return redirect()->action('Admin\ArticleController@index');

        }catch (\Exception $exception)
        {
            DB::rollback();
        }
        }

    public function destroy(ArticleDestroyRequest $request , Article $article)
    {
        $article->delete();
        return redirect()->action('Admin\ArticleController@index');

    }
}
