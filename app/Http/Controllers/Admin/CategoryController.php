<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.category.index' , [

            'categories' => Category::orderBy( 'id' ,'desc')->paginate(5),

        ]);

    }


    public function create(Request $request)
    {
        return view('admin.category.create');

    }

    public function edit(Request $request , Category $category)
    {
        return view('admin.category.edit' , ['category' => $category]);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try{
            $category = new Category($request->only(
                [
                    'name',
                    'slug',
                ]
            ));

            $category->published = !empty($request->input('published'));

            $category->save();
            DB::commit();
            return redirect()->action('Admin\CategoryController@index');

        }catch (\Exception $exception)
        {

            DB::rollback();
            var_dump($exception->getMessage());
        }



    }

    public function update(Request $request , Category $category)
    {
        DB::beginTransaction();
        try {
            $category->fill($request->only(
                [
                    'name',
                    'slug' ,
                ]
            ));

            $category->published = !empty($request->input('published'));

            $category->save();
            DB::commit();
            return redirect()->action('Admin\CategoryController@index');

        }catch (\Exception $exception)
        {
            DB::rouback();
        }
    }

    public function destroy(Request $request , Category $category)
    {
        $category->delete();
        return redirect()->action('Admin\CategoryController@index');

    }
}
