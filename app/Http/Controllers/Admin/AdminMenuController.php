<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Category;
use Illuminate\Support\Facades\DB;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();

        return view('admin.menu.index' , ['menu' => $menu]);

    }

    public function create(Category $category)
    {
        return view('admin.menu.create' , [
            'categories' => $category->select(array('slug' , 'name'))->where('published' , 1)->get(),
            'menu' => Menu::all(),
        ]);

    }
    public function edit( Request $request ,  Menu $menu , Category $category)
    {
        return view('admin.menu.edit' ,
            [
                'categories' => $category->select(array('slug' , 'name'))->where('published' , 1)->get(),
                'menu' => $menu
            ]
            );
    }
    public function store(Request $request)
{

            $menu = new Menu($request->only(
                [
                    'title',
                    'url',
                    'you_url',
                    'parent_id',
                    'published',
                    'position'

                ]
            ));

            $menu->published = !empty($request->input('published'));
            $menu->save();

            return redirect()->action('Admin\AdminMenuController@index');

        }

    public function update( Request $request , Menu $menu)
    {
            $menu->fill($request->only(
                [
                    'title',
                    'url',
                    'you_url',
                    'parent_id',
                    'published',
                    'position' ,

                ]
            ));

            $menu->published = !empty($request->input('published'));
            $menu->save();

            return redirect()->action('Admin\AdminMenuController@index');
    }

    public function destroy(Request $request , Menu $menu)
    {
        $menu->delete();
        return redirect()->action('Admin\AdminMenuController@index');

    }



}
