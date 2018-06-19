<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rubric.index' ,
            [
                'rubrics' => Rubric::orderBy('id' , 'desc')->paginate(15)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rubric.create' ,
            [
                'rubrics' => Rubric::all()
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

        try
        {
            $rubrics = new Rubric($request->only(

                [
                'name',
                'sort_id',
                'url',
                'title',
                'meta_description',
                'meta_keywords',
                'image',
                'show_image',
                'description',
                'published',

                 ]
            ));

            $rubrics->show_image = !empty($request->input('show_image'));
            $rubrics->published = !empty($request->input('published'));

            $rubrics->save();

            DB::commit();

            return redirect()->action('Admin\RubricController@index');

        }catch (\Exception $exception)
        {
            DB::rollback();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rubric $rubrics
     * @return \Illuminate\Http\Response
     * @internal param Rubric $rubric
     */
    public function edit(Rubric $rubrics)
    {
        return view('admin.rubric.edit' ,
            [
                'rubrics' => $rubrics
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Rubric $rubrics
     * @return \Illuminate\Http\Response
     * @internal param Rubric $rubrics
     */
    public function update(Request $request, Rubric $rubrics)
    {
        DB::beginTransaction();
        try
        {
            $rubrics->fill($request->only(

              [
                'name',
                'url',
                'sort_id',
                'title',
                'meta_description',
                'meta_keywords',
                'image',
                'show_image',
                'description',
                'published',
              ]
            ));

            $rubrics->show_image = !empty($request->input('show_image'));
            $rubrics->published = !empty($request->input('published'));

            $rubrics->save();

            DB::commit();

            return redirect()->action('Admin\RubricController@index');

        }catch (\Exception $exception)
        {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rubric $rubrics
     * @return \Illuminate\Http\Response
     * @internal param Rubric $rubric
     */
    public function destroy(Rubric $rubrics)
    {
        $rubrics->delete();
        return redirect()->action('Admin\RubricController@index');
    }
}
