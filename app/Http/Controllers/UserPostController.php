<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\Web\RequestUserPostCreate;
use App\Http\Requests\Web\RequestUserPostEdit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function index(User $user )
    {
        return view('web.users.post.index' , [
            'articles' => auth()->user()->articles()->orderBy('id' , 'desc')->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param RequestUserPostCreate $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function create(RequestUserPostCreate $request, User $user)
    {
        return view('web.users.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param Article $article
     */
    public function store(Request $request, User $user)
    {
        DB::beginTransaction();

        try {

            $article = new Article($request->only([
                'title',
                'header_h1',
                'short_description',
                'description',
                'general_image',
            ]));

            $article->user_id = auth()->user()->id;
            $article->short_description = trim(strip_tags($request->short_description));
            $article->slug = str_slug($request->input('title'));
            $article->published = !empty($request->input('published'));

            $article->save();

            DB::commit();

            return redirect()->action('UserPostController@index', auth()->user()->id);

        } catch (\Exception $exception) {
            DB::rollback();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RequestUserPostEdit $request
     * @param Article $article
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit( RequestUserPostEdit $request, User $user, Article $article)
    {
        return view('web.users.post.edit' , [
            'article' => $article
        ]);
    }

    public function show(User $user)
    {

        return view('web.users.post.show' ,
            [
                'articles' => Article::whereHas('user.roles', function($query) {
                    $query->where('name', 'user');
                })->get(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, User $user, Article $article)
    {
        DB::beginTransaction();

        try {

            $article->fill($request->only([
                'title',
                'header_h1',
                'short_description',
                'description',
                'general_image',
            ]));

            $article->user_id = auth()->user()->id;
            $article->short_description = trim(strip_tags($request->short_description));
            $article->slug = str_slug($request->input('title'));
            $article->published = !empty($request->input('published'));

            $article->save();

            DB::commit();

            return redirect()->action('UserPostController@index', auth()->user()->id);

        } catch (\Exception $exception) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Article $article)
    {
        /*unlink(public_path($article->general_image));*/
        $article->delete();
        return redirect()->action('UserPostController@index');
    }
}
