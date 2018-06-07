<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;

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
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {

        return view('web.users.post.create' , [
            'articles' => $article
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        DB::beginTransaction();

        try{



            $article = new Article($request->only(
                'title' ,
                'header_h1',
                'short_description',
                'description',
                'published',
                'general_image'
            ));
            $article->slug = str_slug($article->title);
            $article->published = !empty($request->input('published'));

            $article->save();

            DB::commit();

            return redirect()->action('UserPostController@index');

        }catch (\Exception $exception){

            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
