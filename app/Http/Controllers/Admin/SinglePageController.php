<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SinglePage;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.singlepage.index' ,
            [
                'singlePage' => SinglePage::paginate(5),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.singlepage.create' ,
            [
                'singlePage' => SinglePage::all(),
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
        $singlePage = new SinglePage($request->only(
            'title',
            'url',
            'meta_description',
            'meta_keyword',
            'tag_h1',
            'content',
            'published',
            'add_menu'
        ));
        $singlePage->published = !empty($request->input('published'));
        $singlePage->add_menu = !empty($request->input('add_menu'));
        $singlePage->save();

        return redirect()->action('Admin\SinglePageController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SinglePage  $singlePage
     * @return \Illuminate\Http\Response
     */
    public function show(SinglePage $singlePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SinglePage  $singlePage
     * @return \Illuminate\Http\Response
     */
    public function edit(SinglePage $singlePage)
    {
        return view('admin.singlepage.edit' ,
            [
              'singlePage' => $singlePage,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SinglePage  $singlePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SinglePage $singlePage)
    {
        $singlePage->fill($request->only(

            'title',
            'url',
            'meta_description',
            'meta_keyword',
            'tag_h1',
            'content',
            'published',
            'add_menu'

        ));
        $singlePage->published = !empty($request->input('published'));
        $singlePage->add_menu = !empty($request->input('add_menu'));
        $singlePage->save();
        return redirect()->action('Admin\SinglePageController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SinglePage  $singlePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SinglePage $singlePage)
    {
        $singlePage->delete();
        return redirect()->action('Admin\SinglePageController@index');

    }
}
