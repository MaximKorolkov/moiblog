<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\novost;
use Illuminate\Http\Request;

class NovostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.novosti.index' ,
            [
            'novost' => novost::orderBy( 'id' ,'desc')->paginate(5),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.novosti.create' ,
            [
                'novost' => novost::all() ,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novost = new novost($request->only(

            'title',
            'url',
            'meta_description',
            'meta_description',
            'meta_keyword',
            'tag_h1',
            'general_image',
            'author',
            'show_image',
            'text',
            'img_width',
            'img_height',
            'show_news',
            'published'
        ));
        $novost->show_news = !empty($request->input('show_news'));
        $novost->published  = !empty($request->input('published'));

        $novost->save();
        return redirect()->action('Admin\NovostController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\novost  $novost
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\novost  $novost
     * @return \Illuminate\Http\Response
     */
    public function edit(novost $novost)
    {
        return view('admin.novosti.edit' ,
            [
                'novost' => $novost,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\novost  $novost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, novost $novost)
    {

        $novost->fill($request->only(

            'title',
            'url',
            'meta_description',
            'meta_description',
            'meta_keyword',
            'tag_h1',
            'general_image',
            'author',
            'show_image',
            'text',
            'img_width',
            'img_height',
            'show_news',
            'published'
        ));
        $novost->show_news  = !empty($request->input('show_news'));
        $novost->published  = !empty($request->input('published'));
        $novost->save();
        return redirect()->action('Admin\NovostController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\novost  $novost
     * @return \Illuminate\Http\Response
     */
    public function destroy(novost $novost)
    {
        $novost->delete();
        return redirect()->action('Admin\NovostController@index');
    }
}
