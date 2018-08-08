<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\homeslider;
use App\novost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomesliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.homeslider.index', [
            'sliders' => homeslider::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeslider.create' , [
            'articles' => Article::all(),
            'news' => novost::all(),
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
        DB::beginTransaction();
        try{
            $slider = new Article($request->only(
                [
                    'article_id',

                ]
            ));

            $slider->save();

            $slider->article()->sync($request->input('article'));

            DB::commit();
            return redirect()->action('Admin\HomesliderController@index');

        }catch (\Exception $exception)
        {
            DB::rollback();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\homeslider  $homeslider
     * @return \Illuminate\Http\Response
     */
    public function show(homeslider $homeslider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\homeslider  $homeslider
     * @return \Illuminate\Http\Response
     */
    public function edit(homeslider $homeslider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\homeslider  $homeslider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homeslider $homeslider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\homeslider  $homeslider
     * @return \Illuminate\Http\Response
     */
    public function destroy(homeslider $homeslider)
    {
        //
    }
}
