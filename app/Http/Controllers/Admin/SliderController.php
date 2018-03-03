<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index' ,
        [
            'sliders' =>Slider::paginate(5) ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create' ,
            [
                'sliders' => Slider::all(),
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
        $sliders = new Slider($request->only(
            'title',
            'description',
            'img',
            'url',
            'published'
        ));
        $sliders->published = !empty($request->input('published'));
        $sliders->save();
        return redirect()->action('Admin\SliderController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $sliders
     * @return \Illuminate\Http\Response
     * @internal param Slider $slider
     */
    public function edit(Slider $sliders)
    {
        return view('admin.slider.edit' ,
            [
                'sliders' => $sliders,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Slider $sliders
     * @return \Illuminate\Http\Response
     * @internal param Slider $slider
     */
    public function update(Request $request, Slider $sliders)
    {
        $sliders->fill($request->only(
            'title',
            'description',
            'img',
            'url',
            'published'
        ));
        $sliders->published = !empty($request->input('published'));
        $sliders->save();
        return redirect()->action('Admin\SliderController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $sliders
     * @return \Illuminate\Http\Response
     * @internal param Slider $slider
     */
    public function destroy(Slider $sliders)
    {
        $sliders->delete();
        return redirect()->action('Admin\SliderController@index');
    }
}
